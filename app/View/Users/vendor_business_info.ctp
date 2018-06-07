<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>Update business information</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li class="active">
                <strong>Business information</strong>
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
                    <h5>Update your business information</h5>
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
                        <label class="col-sm-2 control-label">Business name<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'VendorDetails.business_name',
                                    array(
                                        'class' => 'form-control',
                                        'required' => true,
                                        'label' => false,
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Address line1<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'VendorDetails.address1',
                                    array(
                                        'class' => 'form-control',
                                        'required' => true,
                                        'label' => false,
                                        'type' => 'text' 
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Address line2<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'VendorDetails.address2',
                                    array(
                                        'class' => 'form-control',
                                        'required' => true,
                                        'label' => false,
                                        'type' => 'text' 
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Country<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'VendorDetails.country',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true,
                                        'id' => 'country',
                                        'options' => $countries,
                                        'empty'=> 'Select country'
                                        // 'value' => isset($addr_details['country']) ? $addr_details['country'] : '',
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">State<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'VendorDetails.state',
                                    array(
                                        'class' => 'form-control',
                                        'id' => 'state',
                                        'label' => false,
                                        'required' => true,
                                        'options' => isset($states) ? $states : '',
                                        'empty'=> 'Select state'
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">City<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'VendorDetails.city',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true,
                                        'empty'=> 'Select city'
                                        
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Pincode<span>*</span></label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'VendorDetails.pincode',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true,
                                        'maxlength '=> "6"
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
<script>
    $('#country').change(function() {
        country_id = $('#country').val();
        formData = {
            'country_id' : country_id
        };
        url = '<?php echo Router::url(array('controller'=>'settings','action'=>'getstate'));?>',
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            async: true,
            cache: false,
            dataType: 'HTML',
            beforeSend: function() {
                
            },
            success: function (resp) {
                if (resp != '_ERROR') {
                    $('#state').html(resp);
                    console.log(resp);
                    
                }else{
                }

            }
        });
    });
</script>