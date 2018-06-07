<?php  echo $this->Html->css('../admin/css/plugins/dataTables/datatables.min.css'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Products</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li class="active">
                <strong>Products list</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <div class="row add_btn">
            <a class="btn btn-info btn-circle btn-lg right-flt btn-outline" href="<?php echo $this->webroot; ?>products/add">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>All products <small>With searching options, export data and view, edit delete your products.</small></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo $this->webroot; ?>products/add">Add new product</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
                <th>Id</th>
				<th width="10">Product UID</th>
				<th width="15%">Title</th>
				<!-- <th width="10%">Cate/gory</th> -->
				<th>Price</th>
				<th>Discount</th>
				<th>Created date</th>
                <?php
                    if ($this->Session->read('Auth.User.group_id') != 4) { ?>
				    <th>Seller</th>
                <?php
                    }
                ?>
				<th>Product</th>
				<th class="actions">Actions</th>
            </tr>
            </thead>
            <tbody>

            	<?php 
                    if ($products) {
                        echo "string";
                        foreach ($products as $product): ?>
        					<tr>
        					<td><?php echo h($product['Product']['id']); ?></td>
        					<td><?php echo h($product['Product']['product_UID']); ?></td>
        					<td><?php echo h($product['Product']['title']); ?></td>
        					<!-- <td>
        						<?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
        					</td> -->
        					<td><?php 
                                    if ($product['Product']['price'] == "") {
                                        echo '0';
                                    }else{
                                        if ($currency == 'Rs') {
                                            echo '<i class="fa fa-inr"></i> '.h($product['Product']['price']); 
                                        }else{
                                            echo $currency .' '.h($product['Product']['price']); 
                                        }
                                    }
                                ?>
                            </td>
        					<td><?php 
                            if ($product['Product']['discount'] == "") {
                                echo '0';
                            }else{
                                echo h($product['Product']['discount']); 
                            }
                                ?>% </td>
        					<td><?php echo date('d M Y',strtotime($product['Product']['created_date'])); ?></td>
                            <?php
                            if ($this->Session->read('Auth.User.group_id') != 4) { ?>
        					<td>
        						<?php echo $this->Html->link($product['User']['f_name'], array('controller' => 'users', 'action' => 'view', $product['User']['id'])); ?>
        					</td>
                            <?php } ?>
        					<td><?php echo h($product['Product']['product_count']); ?></td>
        					<td class="actions">
        						<?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id']), array('class'=>'btn btn-xs btn-white')); ?>
        						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id']), array('class'=>'btn btn-xs btn-white')); ?>
        						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), array('class'=>'btn btn-xs btn-white'), array(), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
        					</td>
        					</tr>
    				<?php endforeach; } ?>
 
            </tbody>
            </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>


<?php echo $this->element('backend_footer'); ?>
<?php echo $this->Html->script('../admin/js/plugins/dataTables/datatables.min.js'); ?>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

</script>