<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Category $ParentCategory
 * @property Product $Product
 */
class Category extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $key = 0;
	public $matched = array();

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
		// 'imgs' => array(
		// 	'notEmpty' => array(
		// 		'rule' => array('notEmpty'),
		// 		//'message' => 'Your custom message here',
		// 		// 'allowEmpty' => true,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'edit', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentCategory' => array(
			'className' => 'Category',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'dependent' => true,
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'created_by',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	public $hasMany = array(
        'ChildCategory' => array(
            'className' => 'Category',
            'foreignKey' => 'parent_id'
        ),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'category_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


	function fetchCategoryTree() {
		$this->recursive = -1;
		$allChildren = $this->find('all', array('fields'=>array('id', 'name', 'desc', 'imgs', 'parent_id')));
		$cat = $this->buildTree($allChildren);
		return $cat;
	}

	function fetchSubCategoryTree($id) {
		$cat = $this->fetchCategoryTree();
		$subcat = $this->multidimensional_array_search($id, $cat);
		return $subcat;
	}

	function multidimensional_array_search($search_value,$array) {
	    if(is_array($array) && count($array) > 0) {
	        foreach($array as $key => $value) {
				if ($value['Category']['id'] == $search_value) {
					$this->matched[] = $value;
				}else{
					if (array_key_exists("childs",$value)) {
						if (!empty($value['childs']) && is_array($value['childs'])) {

		                	$this->multidimensional_array_search($search_value,$value['childs']);
						}
					}
				}
	            
	        }
			return $this->matched;
	    }
	}

	function buildTree($items) {
    	$childs = array();

	    foreach($items as &$item) $childs[$item['Category']['parent_id']][] = &$item;
	    unset($item);

	    foreach($items as &$item) if (isset($childs[$item['Category']['id']]))
	            $item['childs'] = $childs[$item['Category']['id']];
	    if (!empty($childs[0])) {
	    	return $childs[0];
	    }else{
	    	return $childs;
	    }
	}

	function createCategorydropdownList($parent = 0, $spacing = '', $user_tree_array = '') {

	  if (!is_array($user_tree_array))
	    $user_tree_array = array();

	  $sql = "SELECT id,name, parent_id FROM categories WHERE parent_id = $parent ORDER BY id ASC";
	  $data = $this->query($sql);
	  if (count($data) > 0) {
	    foreach ($data as $cat) {
	      $user_tree_array[$cat['categories']['id']] = " ".$spacing ." ". $cat['categories']['name'];
	      $user_tree_array = $this->createCategorydropdownList($cat['categories']['id'], $spacing . ' -- ', $user_tree_array);
	    }
	  }
	  return $user_tree_array;
	}

	function getAllCategoryIds($categories){
		foreach ($categories as $category) {
			print_r($categories);
		}
	}

	function getCategoryProductList($id){
		$cat = $this->fetchSubCategoryTree($id);
		$ids = $this->search($cat, 'id');
		$Product = ClassRegistry::init('Product');
		$Product->recursive = -1;
		// $productlist = $Product->find('all', array('conditions'=>array('category_id'=> $ids),
		// 											'group'=>array('Product.variant_code')
		// 											));
		$query = 'SELECT * FROM products as Product WHERE ';
		$idcount = count($ids);
		$count = 1;
		foreach ($ids as $id) {
			$query .= 'FIND_IN_SET('. $id . ',Product.category_id) ';
			if ($count < $idcount) {
				$query .= 'OR ';
			}
			$count++;
		}
		$query .= 'ORDER BY Product.id DESC';
		$productlist = $this->Product->query($query);
		return $productlist;
	}

	function search($array, $key){
	    $results = array();

	    if (is_array($array)) {
	        if (isset($array[$key])) {
	            $results[] = $array['id'];
	        }

	        foreach ($array as $subarray) {
	            $results = array_merge($results, $this->search($subarray, $key));
	        }
	    }

	    return $results;
	}

	function fetchAllParentCategory($id = NULL){
		$this->recursive = 0;
		$cat = $this->find('first', array('conditions'=>array('Category.id'=> $id)));
		$tree = array();
		$tree[] = array( 'id' => $cat['Category']['id'], 'name' => $cat['Category']['name'] );
		if ($cat['ParentCategory']['id'] != "") {
			$tree[] = array( 'id' => $cat['ParentCategory']['id'], 'name' => $cat['ParentCategory']['name'] );
			if ($cat['ParentCategory']['parent_id'] !=0) {
				$parent = $this->find('first', array('conditions'=>array('Category.id'=> $cat['ParentCategory']['id'])));
				$tree[] = array( 'id' => $parent['ParentCategory']['id'], 'name' => $parent['ParentCategory']['name'] );
				if ($parent['ParentCategory']['parent_id'] !=0) {
					$parent2 = $this->find('first', array('conditions'=>array('Category.id'=> $parent['ParentCategory']['id'])));
					$tree[] = array( 'id' => $parent2['ParentCategory']['id'], 'name' => $parent2['ParentCategory']['name'] );
				}
			}
		}
		return array_reverse($tree);
	}
}
