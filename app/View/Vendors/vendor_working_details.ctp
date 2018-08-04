<?php echo $this->Html->css('../admin/css/plugins/bootstrap-timepicker/bootstrap-timepicker.min'); ?>
<?php  echo $this->Html->css('../admin/css/plugins/datapicker/datepicker3.css'); ?>
<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>Update compliance details</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li class="active">
                <strong>Compliance details</strong>
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
                    <h5>Update your bank information</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <?php echo $this->Form->create('User', array('id' => 'profile', 'class' => 'form-box')); ?>
                 
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Working days<span>*</span></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <?php
                                    $option = array(
                                                'Sunday' => 'Sunday',
                                                'Monday' => 'Monday',
                                                'Tuesday' => 'Tuesday',
                                                'Wednesday' => 'Wednesday',
                                                'Thurday' => 'Thurday',
                                                'Friday' => 'Friday',
                                                'Saturday' => 'Saturday',
                                        );
                                    echo $this->Form->input(
                                        'VendorDetails.working_days_from',
                                        array(
                                            'class' => 'form-control',
                                            'label' => false,
                                            'options' => $option
                                        )
                                    );
                                ?>
                                <span class="input-group-addon">to</span>
                                <?php
                                    echo $this->Form->input(
                                        'VendorDetails.working_days_to',
                                        array(
                                            'class' => 'form-control',
                                            'label' => false,
                                            'default' => 'Saturday',
                                            'options' => $option
                                        )
                                    );
                                ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Working hours<span>*</span></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <?php
                                    echo $this->Form->input(
                                        'VendorDetails.working_hr_from',
                                        array(
                                            'class' => 'form-control',
                                            'label' => false,
                                            'type'=>'text',
                                            'id'=> 'timepicker1',
                                        )
                                    );
                                ?>
                                <span class="input-group-addon">to</span>
                                <?php
                                    echo $this->Form->input(
                                        'VendorDetails.working_hr_to',
                                        array(
                                            'class' => 'form-control',
                                            'label' => false,
                                            'type' => 'text',
                                            'id'=> 'timepicker2'
                                        )
                                    );
                                ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Break hours<span>*</span></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <?php
                                    echo $this->Form->input(
                                        'VendorDetails.break_hr_from',
                                        array(
                                            'class' => 'form-control',
                                            'label' => false,
                                            'type'=>'number'
                                        )
                                    );
                                ?>
                                <span class="input-group-addon">to</span>
                                <?php
                                    echo $this->Form->input(
                                        'VendorDetails.break_hr_to',
                                        array(
                                            'class' => 'form-control',
                                            'label' => false,
                                            'type' => 'number'
                                        )
                                    );
                                ?>
                            </div>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <div class="form-group" id="data_5">
                        <label class="col-sm-2 control-label">Vacation days<span>*</span></label>
                        <div class="col-sm-10">
                            <div class="input-daterange input-group" id="datepicker">
                                <?php
                                    echo $this->Form->input(
                                        'VendorDetails.vacation_days_from',
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
                                        'VendorDetails.vacation_days_to',
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
<?php echo $this->Html->script('../admin/js/plugins/bootstrap-timepicker/bootstrap-timepicker.min'); ?>
<?php echo $this->Html->script('../admin/js/plugins/datapicker/bootstrap-datepicker.js'); ?>

<script type="text/javascript">
    $('#timepicker1').timepicker();
    $('#timepicker2').timepicker();

    $('#data_5 .input-daterange').datepicker({
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
        // minYear: 2018,
    });
</script>