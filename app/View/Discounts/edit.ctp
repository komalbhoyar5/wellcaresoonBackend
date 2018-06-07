<?php  echo $this->Html->css('../admin/css/plugins/summernote/summernote.css'); ?>
<?php  echo $this->Html->css('../admin/css/plugins/summernote/summernote-bs3.css'); ?>
<?php  echo $this->Html->css('../admin/css/plugins/datapicker/datepicker3.css'); ?>
<?php  echo $this->Html->css('../admin/css/plugins/iCheck/custom.css'); ?>

<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>Add discount coupen</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li>
                <a href="<?php echo $this->webroot; ?>discounts">discount coupens</a>
            </li>
            <li class="active">
                <strong>Add discount coupen</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
    
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Add new discount coupens</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?php echo $this->webroot; ?>discounts">discount coupens</a></li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <?php echo $this->Form->create('Discount', array('id' => 'disc','type' => 'file')); ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Type<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'type',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'options' => array('Coupen'=>'Coupen', 'Ads' => 'Ads')
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Discount code<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'discount_code',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Discount name<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input('discount_name', array(
                                											'class' => 'form-control',
                                        									'label' => false,
                                										));
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group"><label class="col-sm-2 control-label">Description<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'discount_desc',
                                    array(
                                        'class' => 'summernote form-control',
                                        'label' => false,
                                        'type' => 'hidden'
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Discount type<span>*</span></label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <?php
                                    echo $this->Form->input(
                                        'discount_rate',
                                        array(
                                            'class' => 'form-control',
                                            'label' => false,
                                            'placeholder' => 'Enter discount rate',
                                            'required' => false
                                        )
                                    );
                                ?>
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <label class="col-sm-2 control-label" style="text-align: center;  margin-top: 7px;">OR</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo $currency_symbol; ?></span>
                                <?php
                                    echo $this->Form->input(
                                        'discount_amount',
                                        array(
                                            'class' => 'form-control',
                                            'label' => false,
                                            'type' => 'number',
                                            'placeholder' => 'Enter discount amount',
                                            'required' => false
                                        )
                                    );
                                ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Discount max users</label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'discount_max_user',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'type' => 'number'
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Discount max usage</label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'discount_max_usage',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'type' => 'number'
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group" id="data_5">
                        <label class="col-sm-2 control-label">Discount validaty date<span>*</span></label>
                        <div class="col-sm-10">
                            <div class="input-daterange input-group" id="datepicker">
                                <?php
                                    echo $this->Form->input(
                                        'discount_start_date',
                                        array(
                                            'class' => 'form-control',
                                            'label' => false,
                                            'type'=>'text'
                                        )
                                    );
                                ?>
                                <span class="input-group-addon">to</span>
                                <?php
                                    echo $this->Form->input(
                                        'discount_end_date',
                                        array(
                                            'class' => 'form-control',
                                            'label' => false,
                                            'type' => 'text'
                                        )
                                    );
                                ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Discount on minimum order value</label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'discount_min_order_value',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'type' => 'number'
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Discount on first order only</label>
                        <div class="col-sm-10">
                            <div class="i-checks">
                                <?php
                                    echo $this->Form->input('discount_first_order_only', array(
                                        'options' => array('Yes'=>'Yes', 'No'=>'No'),
                                        'type' => 'radio',
                                        'label' => false,
                                        'legend' => false,
                                        'class'=> 'radiobtn'
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Active</label>
                        <div class="col-sm-10">
                            <div class="i-checks">
                                <?php
                                    echo $this->Form->input('active', array(
                                        'options' => array('Yes'=>'Yes', 'No'=>'No'),
                                        'type' => 'radio',
                                        'label' => false,
                                        'legend' => false,
                                        'class'=> 'radiobtn'
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Link</label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'link',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Upload images<span>*</span></label>
                        <div class="col-sm-10">
                            <span class="btn btn-primary btn-outline btn-file">
							    <i class="fa fa-upload"></i> Browse images
	                            <?php
								    echo $this->Form->input(
								        'discount_imgs.',
								        array(
								            'label' => false,
								            'type' => 'file',
				            				'div'=>false,
				            				'id'=>'produ_img',
                                            'required' => false
								        )
								    );
								?>
							</span>
	                        <span class="updatedimgs">
	                        	
	                        </span>
                        </div>
                    </div>

                    <div class="hr-line-dashed col-md-12"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo $this->Form->end(array('label' => 'Submit', 'class' => 'btn btn-md pull-right btn-primary m-t-n-xs')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->element('backend_footer'); ?>
<?php echo $this->Html->script('../admin/js/plugins/summernote/summernote.min.js'); ?>
   <!-- Data picker -->
<?php echo $this->Html->script('../admin/js/plugins/datapicker/bootstrap-datepicker.js'); ?>
<?php echo $this->Html->script('../admin/js/plugins/iCheck/icheck.min.js'); ?>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
<script>

    $(document).ready(function(){
        $('.summernote').summernote();

        $( ".note-editable" ).focusout(function() {
        	var desc = $('.note-editable').html();
        	$('.summernote').val(desc);
		});

		$('#produ_img').change(function(){
			if (this.files.length > 1) {
				$('.updatedimgs').html(this.files.length+' files are selected');
			}else{
				$('.updatedimgs').html(this.files.length+' file selected');
			}

		});

        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });
    });
    
</script>
