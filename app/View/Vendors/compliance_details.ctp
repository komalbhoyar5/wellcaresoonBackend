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
                    <?php 
                        // if ($this->data['VendorDetails'][]) {
                        //     # code...
                        // }
                    ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Doctor registration number<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'VendorDetails.doc_registration_no',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => false
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Drug license number<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'VendorDetails.drug_license_no',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => false
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">GST<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'VendorDetails.GSTIN',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">TAN<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'VendorDetails.TAN',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">PAN<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'VendorDetails.PAN',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true
                                    )
                                );
                            ?>
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
