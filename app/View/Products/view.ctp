<?php  echo $this->Html->css('../admin/css/plugins/slick/slick.css'); ?>
<?php  echo $this->Html->css('../admin/css/plugins/slick/slick-theme.css'); ?>
<?php  echo $this->Html->css('../admin/css/animate.css'); ?>
<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>View Product</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li>
                <a href="<?php echo $this->webroot; ?>products">Products</a>
            </li>
            <li class="active">
                <strong>View product</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <div class="row add_btn">
            <a class="btn btn-info btn-circle btn-lg right-flt btn-outline" href="<?php echo $this->webroot; ?>products/edit/<?php echo $product['Product']['id']; ?>" >
                <i class="fa fa-edit"></i>
            </a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">

            <div class="ibox product-detail">
                <div class="ibox-content">

                    <div class="row">
                        <div class="col-md-5">
                            <div class="product-images">
                           	 	<?php
                                    if ($product['Product']['imgs'] !="") {
                                    $file = $product['Product']['imgs'];
                                    $images = explode(',', $file);
		                			foreach ($images as $img) {
                                    ?>
	                                <div>
	                                    <div class="image-imitation" style="background-image: url('<?php echo $this->webroot. $img; ?>')">
	                                       
	                                    </div>
	                                </div>
                                    <?php }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h2 class="font-bold m-b-xs">
                                <?php echo ucfirst($product['Product']['title']); ?>
                            </h2>
                            <small><?php 
                                        foreach ($category as $cat) {
                                            echo $this->Html->link($cat['Category']['name'], array('controller' => 'categories', 'action' => 'view', $cat['Category']['id'])); 
                                            echo ", ";
                                        }
                                    ?>
                            </small>
                            <hr>
                            <div class="m-t-md">
                                <a class="btn btn-primary pull-right" href="<?php echo $this->webroot; ?>products/add_similar_product/<?php echo $product['Product']['id'] ?>">Add similar products</a>
                                <h2 class="product-main-price"><?php echo $currency .' '. h($product['Product']['price']); ?> <small class="text-muted">Exclude Tax</small></h2>
                            </div>
                            <hr>

                            <h4>Product description</h4>

                            <div class="small text-muted">
                                <?php echo $product['Product']['description']; ?>
                            </div>
                            <dl class="dl-horizontal m-t-md small">
                                <dt>Product UID</dt>
                                <dd><?php echo h($product['Product']['product_UID']); ?></dd>
                                
                                <dt>Type</dt>
                                <dd><?php echo h($product['Product']['type']); ?></dd>

                                <dt>Discount</dt>
                                <dd><?php echo h($product['Product']['discount']); ?>%</dd>

                                <dt>Product MOQ</dt>
                                <dd><?php echo h($product['Product']['MOQ']); ?></dd>

                                <dt>Product available</dt>
                                <dd><?php echo h($product['Product']['product_count']); ?></dd>

                                <dt>GST tax rates</dt>
                                <dd><?php echo h($product['Product']['GST_tax']); ?>%</dd>

                                <dt>Variant type</dt>
                                <dd><?php echo h($product['Product']['variant_type']); ?></dd>

                                <dt>Variant value</dt>
                                <dd><?php echo h($product['Product']['product_variant']); ?></dd>

                                <dt>Created Date</dt>
                                <dd><?php echo date('d M Y h:i a',strtotime($product['Product']['created_date'])); ?></dd>

                                <dt>Modified Date</dt>
                                <dd><?php echo date('d M Y h:i a',strtotime($product['Product']['modified_date'])); ?></dd>
                            </dl>
                            <hr>

                            <div>
                                <div class="btn-group">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> <?php echo h($product['Product']['product_count']); ?> Products are remaining</button>
                                    <a class="btn btn-white btn-sm" href="<?php echo $this->webroot; ?>"><i class="fa fa-envelope"></i> Contact Seller
                                    <?php echo ucwords($product['User']['f_name'].' '.$product['User']['l_name']); ?> </a>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
               <!--  <div class="ibox-footer">
                    <span class="pull-right">
                        Full stock - <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
                    </span>
                    The generated Lorem Ipsum is therefore always free
                </div> -->
            </div>

        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Similar products </h5>
                    
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <?php
                            foreach ($similar_product as $prod) {
                                if ($prod['Product']['imgs'] !="") {
                                    $file = $prod['Product']['imgs'];
                                    $images = explode(',', $file);
                        ?>
                            <div class="col-md-3">
                                <div class="ibox">
                                    <div class="ibox-content product-box">
                                        <div class="product-imitation" style="background-image: url('<?php echo $this->webroot. $images[0]; ?>');">
                                            
                                        </div>
                                        <div class="product-desc">
                                            <span class="product-price">
                                                <?php echo $currency .' '. $prod['Product']['price']; ?>
                                            </span>
                                            <small class="text-muted"><?php echo ucfirst($prod['Product']['variant_type']); ?> of <?php echo $prod['Product']['product_variant']; ?></small>
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
<?php echo $this->element('backend_footer'); ?>

<?php echo $this->Html->script('../admin/js/plugins/slick/slick.min.js'); ?>
<script>
    $(document).ready(function(){
        $('.product-images').slick({
            dots: true
        });
    });
</script>