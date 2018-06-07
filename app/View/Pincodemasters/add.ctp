<?php  echo $this->Html->css('../admin/css/plugins/iCheck/custom.css'); ?>
<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>Add pincode</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li>
                <a href="<?php echo $this->webroot; ?>pincodemasters">Pincode master</a>
            </li>
            <li class="active">
                <strong>Add pincode</strong>
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
                    <h5>Add new pincode details</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <?php echo $this->Form->create('Pincodemaster', array('id' => 'profile','type' => 'file')); ?>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Pin code no.<span>*</span></label>
                        <div class="col-sm-9">
                            <?php
                                echo $this->Form->input(
                                    'pin_code_no',
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
                        <label class="col-sm-3 control-label">Minimum order value<span>*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo $currency; ?></span>
                                <?php
                                    echo $this->Form->input(
                                        'delivery_on_amount',
                                        array(
                                            'class' => 'form-control',
                                            'label' => false,
                                        )
                                    );
                                ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Delivery charges<span>*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><?php echo $currency; ?></span>
                                <?php
                                    echo $this->Form->input(
                                        'delivery_charges',
                                        array(
                                            'class' => 'form-control',
                                            'label' => false,
                                        )
                                    );
                                ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <div class="form-group"><label class="col-sm-3 control-label">Delivery period<span>*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <?php
                                    echo $this->Form->input(
                                        'delivery_period',
                                        array(
                                            'class' => 'summernote form-control',
                                            'label' => false
                                        )
                                    );
                                ?>
                            <span class="input-group-addon">Days</span>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">COD availability<span>*</span></label>
                        <div class="col-sm-9">
                            <div class="i-checks">
                                <?php
                                    echo $this->Form->input('is_COD_available', array(
                                        'options' => array('Yes'=>'Yes', 'No'=>'No'),
                                        'type' => 'radio',
                                        'label' => false,
                                        'legend' => false,
                                        'class'=> 'radiobtn',
                                    ));
                                ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
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
<?php echo $this->Html->script('../admin/js/plugins/iCheck/icheck.min.js'); ?>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
