<div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Discount coupen detail</h2>
            <ol class="breadcrumb">
                <li>
                	<a href="<?php echo $this->webroot; ?>dashboard">Home</a>
                </li>
                <li>
                	<a href="<?php echo $this->webroot; ?>discounts">discounts</a>
                </li>
                <li class="active">
                    <strong>Discount coupen detail</strong>
                </li>
            </ol>
        </div>
    </div>
<div class="row">
    <div class="col-lg-9">
        <div class="wrapper wrapper-content animated fadeInUp">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-md">
                                <a href="<?php echo $this->webroot; ?>discounts/edit/<?php echo $discount['Discount']['id']; ?>" class="btn btn-white btn-xs pull-right">Edit coupen</a>
                                <h2><?php echo ucfirst($discount['Discount']['discount_name']); ?></h2>
                            </div>
                            <dl class="dl-horizontal">
                                <dt>Active:</dt> <dd><span class="label label-primary"><?php echo h($discount['Discount']['active']); ?></span></dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <dl class="dl-horizontal">

                                <dt>type:</dt> <dd>  <?php echo h($discount['Discount']['type']); ?></dd>
                                <dt>Coupen code:</dt> <dd>  <?php echo h($discount['Discount']['discount_code']); ?></dd>
                                <dt>Created by:</dt> <dd><?php echo ucwords($discount['User']['f_name']." " . $discount['User']['l_name']); ?></dd>
                                <dt>Discount Rate:</dt> <dd><?php echo h($currency_symbol . $discount['Discount']['discount_rate']); ?> </dd>
                                <dt>Discount Amount:</dt> <dd> <?php echo h($discount['Discount']['discount_amount']); ?>% </dd>
                                <dt>Discount max user:</dt> <dd> <?php echo h($discount['Discount']['discount_max_user']); ?> </dd>
                                <dt>Discount max usage:</dt> <dd> <?php echo h($discount['Discount']['discount_max_usage']); ?> </dd>
                            </dl>
                        </div>
                        <div class="col-lg-7" id="cluster_info">
                            <dl class="dl-horizontal" >

                                <dt>Discount start date:</dt> <dd><?php echo date('d M Y h:i a',strtotime($discount['Discount']['discount_start_date'])); ?></dd>
                                <dt>Discount end date:</dt> <dd><?php echo date('d M Y h:i a',strtotime($discount['Discount']['discount_end_date'])); ?> </dd>
                                <dt>Created date:</dt>
                                <dd class="project-people"><?php echo date('d M Y h:i a',strtotime($discount['Discount']['date_created'])); ?></dd>
                                <dt>Discount Min Order Value:</dt><dd class="project-people"><?php echo h($discount['Discount']['discount_min_order_value']); ?></dd>
                                <dt>Discount First Order Only:</dt><dd class="project-people"><?php echo h($discount['Discount']['discount_first_order_only']); ?></dd>
                                <dt>Link:</dt><dd class="project-people"><?php echo h($discount['Discount']['link']); ?></dd>
                            </dl>
                        </div>
                    </div>
                    <div class="row m-t-sm">
                        <div class="col-lg-12">
	                        <div class="panel blank-panel">
		                        <div class="panel-heading">
		                            <div class="panel-options">
		                                <ul class="nav nav-tabs">
		                                    <li class="active"><a href="#tab-1" data-toggle="tab">Coupen description</a></li>
		                                    <li class=""><a href="#tab-2" data-toggle="tab">coupen image</a></li>
		                                </ul>
		                            </div>
		                        </div>

		                        <div class="panel-body">
			                        <div class="tab-content">
				                        <div class="tab-pane active" id="tab-1">
											<?php echo $discount['Discount']['discount_desc']; ?>
				                        </div>
				                        <div class="tab-pane" id="tab-2">
                                        <?php
                                            if ($discount['Discount']['discount_img'] !="") { ?>
                                                <img src="<?php echo $this->webroot . $discount['Discount']['discount_img']; ?>" class="img-responsive">
                                        <?php
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
        </div>
    </div>
    <div class="col-lg-3">
        <div class="wrapper wrapper-content project-manager">
            <?php
                if ($discount['Discount']['type'] == 'Ads') { ?>
                <h5>Discount ads in following section</h5>
                <ul class="tag-list ads" style="padding: 0">
                    <li><a sel="home_page_discount" <?php if(in_array('home_page_discount', explode(',', $discount['Discount']['showdisconpage']))){ ?>class="open" <?php }  ?>><i class="fa fa-tag"></i> Home page > discount section</a></li>
                    <li><a sel="discount_sidebar" <?php if(in_array('discount_sidebar', explode(',', $discount['Discount']['showdisconpage']))){ ?>class="open" <?php }  ?>><i class="fa fa-tag"></i> Discount page - sidebar</a></li>
                    <li><a sel="discount_maincontent" <?php if(in_array('discount_maincontent', explode(',', $discount['Discount']['showdisconpage']))){ ?>class="open" <?php }  ?>><i class="fa fa-tag"></i> Discount page - main content</a></li>
                    <li><a sel="discount_sidebar" <?php if(in_array('discount_sidebar', explode(',', $discount['Discount']['showdisconpage']))){ ?>class="open" <?php }  ?> ><i class="fa fa-tag"></i> Pages - sidebar</a></li>
                </ul>
                <button class="btn btn-white btn-xs pull-right" style="margin-top: 2em;" onclick="submitAds();">Update</button>
            <?php
                }else{ ?>
                    <h4>Use coupen code <a><?php echo h($discount['Discount']['discount_code']); ?></a></h4>
                    <p class="small">
                        Use this discount coupen code in frontend to get available for customer or tag this code to following page or section to show ads for this discount.
                    </p>
                    <ul class="tag-list coupens" style="padding: 0">
                        <li><a sel="discount_popup" <?php if(in_array('discount_popup', explode(',', $discount['Discount']['showdisconpage']))){ ?>class="open" <?php }  ?>><i class="fa fa-tag"></i> coupen popup</a></li>
                        <li><a sel="pages_sidebar"  <?php if(in_array('pages_sidebar', explode(',', $discount['Discount']['showdisconpage']))){ ?>class="open" <?php }  ?>><i class="fa fa-tag"></i> Pages - sidebar</a></li>
                    </ul>
                    
                    <button class="btn btn-white btn-xs pull-right" style="margin-top: 2em;"  onclick="submitCoupens();">Update</button>
            <?php
                }
            ?>
        </div>
    </div>
</div>

<?php echo $this->element('backend_footer'); ?>
<script>
    $('.tag-list li a').on('click', function () {
        $(this).toggleClass('open');
    });

    function submitAds(){
        adSections = [];
        $(".ads .open").each(function() {
            adSections.push($(this).attr('sel'));
        });
        data = {
            "sections" : adSections,
            "discount_id" : "<?php echo $discount['Discount']['id']; ?>"
        }
        savedetails(data);
    }
    function submitCoupens(){
        coupensSections = [];
        $(".coupens .open").each(function() {
            coupensSections.push($(this).attr('sel'));
        });
        data = {
            "sections" : coupensSections,
            "discount_id" : "<?php echo $discount['Discount']['id']; ?>"
        }
        savedetails(data);
    }
    function savedetails(){
        var formData = data;
        url = '<?php echo $this->webroot; ?>discounts/savediscountDisplayPage';
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            beforeSend: function() {
            },
            success: function (resp) {
                console.log(resp);
              if (resp != 'fail') {
                alert('updated successfully.');
              }else{
                alert('Could not be updated, Please try again');
              }

            }
        });
    }
</script>