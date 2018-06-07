
<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>View category</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li>
                <a href="<?php echo $this->webroot; ?>categories">Category</a>
            </li>
            <li class="active">
                <strong>View Category</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
            <div class="row add_btn">
            <a class="btn btn-info btn-circle btn-lg right-flt btn-outline" href="<?php echo $this->webroot; ?>categories/edit/<?php echo $category['Category']['id']; ?>" >
                <i class="fa fa-edit"></i>
            </a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1"> Category info</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-4">Category Images</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2"> Products</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                            	<h2 class="font-bold m-b-xs">
                                    <?php echo h($category['Category']['name']); ?>
                                </h2>
                                <hr>
                                <h4>Category description</h4>
                                <div class="small text-muted">
                                    <?php echo h($category['Category']['desc']); ?>
                                </div>
                                <dl class="dl-horizontal m-t-md small">
                                    <dt>GST tax rate</dt>
                                    <dd>
                                    <?php 
                                        if ($category['Category']['GST_tax'] !="") {
                                            echo $category['Category']['GST_tax'].'%'; 
                                        }else{
                                            echo "0%";
                                        }
                                    ?>
                                    </dd>

                                    <dt>Created date</dt>
                                    <dd><?php echo $category['Category']['created_date']; ?></dd>

                                    <dt>Modified date</dt>
                                    <dd><?php echo h($category['Category']['modified_date']); ?></dd>

                                    <dt>Created By</dt>
                                    <dd><?php echo ucwords($category['User']['f_name'] .' '.$category['User']['l_name']); ?></dt>

                                    <dt>Parent category</dt>
                                    <dd><?php echo $this->Html->link($category['ParentCategory']['name'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id'])); ?></dd>
                                </dl>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-stripped">
                                        <thead>
                                        <tr>
                                            <th>
                                                Image preview
                                            </th>
                                            <th>
                                                Image url
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if ($category['Category']['imgs'] !="") {
                                        $file = $category['Category']['imgs'];
                                        $images = explode(',', $file);
			                			foreach ($images as $img) {
                                        ?>
                                        <tr>
                                            <td width="30%">
                                                <img src="<?php echo $this->webroot. $img; ?>">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="<?php echo $this->webroot. $img; ?>">
                                            </td>
                                        </tr>
                                        <?php }
                                        }
                                         ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <div class="row">
                                    <?php
                                        foreach ($product as $prod) {
                                            if ($prod['Product']['imgs'] !="") {
                                                $file = $prod['Product']['imgs'];
                                                $images = explode(',', $file);
                                    ?>
                                        <div class="col-md-3">
                                            <div class="ibox">
                                                <div class="ibox-content product-box">
                                                    <div class="product-imitation" style="background-image: url('<?php echo $this->webroot . $images[0]; ?>');">
                                                        
                                                    </div>
                                                    <div class="product-desc">
                                                        <span class="product-price">
                                                            $<?php echo $prod['Product']['price']; ?>
                                                        </span>
                                                        <small class="text-muted"><?php echo $category['Category']['name']; ?></small>
                                                        <a href="#" class="product-name"><?php echo $prod['Product']['title'] ?></a>
                                                        <div class="small m-t-xs">
                                                            <i class="fa fa-shopping-cart"></i> <?php echo h($prod['Product']['product_count']); ?> Products are remaining
                                                        </div>
                                                        <div class="m-t text-righ">

                                                            <a href="<?php echo $this->webroot; ?>products/view/<?php echo $prod['Product']['id']; ?>" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</div>
<?php echo $this->element('backend_footer'); ?>
