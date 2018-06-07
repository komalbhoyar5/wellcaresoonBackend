<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>General setting</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li class="active">
                <strong>Settings</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="row wrapper-content">
    <div class="col-lg-7">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Project setting <small></small></h5>
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
                <div class="row">
                    <?php
                        echo $this->Form->create(false, array(
                            'url' => 'company_details',
                            'type' => 'file'
                        ));
                        if ($company_details['Setting']['value'] !="") {
                            $company_name = $company_details['Setting']['value'];
                        }else{
                            $company_name = "";
                        }
                    ?>
                    <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">Company name details</h3>
                            <div class="form-group">
                                <label>Company name</label> 
                                <input type="text" placeholder="Enter project name" name="company_name" class="form-control" value="<?php echo $company_name; ?>" maxlength="40">
                            </div>
                            
                    </div>
                    <div class="col-sm-6"><h4>Choose logo</h4>
                        
                        <p>click on image to update new logo.</p>
                        <input type="file" id="upload_logo" name="logo">
                        <p class="text-center" id="logo_icon">
                        <?php
                            if ($company_details['Setting']['other'] !="") {
                        ?>
                            <img src="<?php echo $this->webroot. $company_details['Setting']['other']; ?>" id="">
                        <?php
                            }else{ ?>
                            <a ><i class="fa fa-sign-in big-icon"></i></a>
                        <?php
                            }
                        ?>
                        </p>
                        <div>
                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">Submit</button>
                        </div>
                    </div>
                    <?php
                        echo $this->Form->end();
                    ?>
                </div>
            </div>
        </div>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Company contact details setting <small></small></h5>
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
                <?php
                    echo $this->Form->create('Setting', array(
                        'action' => 'company_address_details', 'class'=>"form-horizontal"
                    ));
                ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Country<span>*</span></label>
                        <div class="col-sm-9">
                            <?php
                                echo $this->Form->input(
                                    'country',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true,
                                        'id' => 'country',
                                        'options' => $countries,
                                        'empty'=> 'Select country',
                                        'value' => isset($addr_details['country']) ? $addr_details['country'] : '',
                                    )
                                );
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contact numbers<span>*</span></label>
                        <div class="col-sm-9">
                            <?php
                                echo $this->Form->input(
                                    'contact_no',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true,
                                        'value' => isset($addr_details['contact_no']) ? $addr_details['contact_no'] : '',
                                        'maxlength '=> "100",
                                        'pattern' => "^\d+(,\d+)*$"
                                    )
                                );
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Street Address<span>*</span></label>
                        <div class="col-sm-9">
                            <?php
                                echo $this->Form->input(
                                    'address1',
                                    array(
                                        'class' => 'form-control margin_bottom',
                                        'label' => false,
                                        'required' => true,
                                        'value' => isset($addr_details['address1']) ? $addr_details['address1'] : '',
                                        'maxlength '=> "50",
                                        'placeholder' => 'Address line 1'
                                    )
                                );
                            ?>
                            <?php
                                echo $this->Form->input(
                                    'address2',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true,
                                        'maxlength' => '50',
                                        'placeholder' => 'Address line 2',
                                        'value' => isset($addr_details['address2']) ? $addr_details['address2'] : ''
                                    )
                                );
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Landmark<span>*</span></label>
                        <div class="col-sm-9">
                            <?php
                                echo $this->Form->input(
                                    'landmark',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true,
                                        'value' => isset($addr_details['landmark']) ? $addr_details['landmark'] : '',
                                        'maxlength '=> "60"
                                    )
                                );
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">State<span>*</span></label>
                        <div class="col-sm-9">
                            <?php
                                echo $this->Form->input(
                                    'state',
                                    array(
                                        'class' => 'form-control',
                                        'id' => 'state',
                                        'label' => false,
                                        'required' => true,
                                        'value' => isset($addr_details['state']) ? $addr_details['state'] : '',
                                        'options' => isset($states) ? $states : '',
                                        'empty'=> 'Select state'
                                    )
                                );
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">City<span>*</span></label>
                        <div class="col-sm-9">
                            <?php
                                echo $this->Form->input(
                                    'city',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true,
                                        'value' => isset($addr_details['city']) ? $addr_details['city'] : '',
                                        'empty'=> 'Select city'
                                        
                                    )
                                );
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Pincode<span>*</span></label>
                        <div class="col-sm-9">
                            <?php
                                echo $this->Form->input(
                                    'pincode',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true,
                                        'value' => isset($addr_details['pincode']) ? $addr_details['pincode'] : '',
                                        'maxlength '=> "6"
                                    )
                                );
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Registered office address</label>
                        <div class="col-sm-9">
                            <?php
                                echo $this->Form->input(
                                    'office_address',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'type' =>'textarea',
                                        'required' => false,
                                        'value' => isset($addr_details['office_address']) ? $addr_details['office_address'] : ''
                                    )
                                );
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Customer care numbers</label>
                        <div class="col-sm-9">
                            <?php
                                echo $this->Form->input(
                                    'customer_care_no',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true,
                                        'value' => isset($addr_details['customer_care_no']) ? $addr_details['customer_care_no'] : ''
                                    )
                                );
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Customer care email ID</label>
                        <div class="col-sm-9">
                            <?php
                            echo $this->Form->input(
                                'customercare_email_id',
                                array(
                                    'class' => 'form-control',
                                    'label' => false,
                                    'required' => true,
                                    'type' => 'text',
                                    'value' => isset($addr_details['customercare_email_id']) ? $addr_details['customercare_email_id'] : ''
                                )
                            );
                        ?>
                        </div>
                    </div>

                    <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">Submit</button>
                    </div>
                </div>
                <?php
                    echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Change password</h5>
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
                <?php echo $this->Form->create('User', array( 'action' => "change_password", 'class'=>"form-horizontal")); ?>

                    <p>Enter your old password and new password.</p>
                    <div class="form-group"><label class="col-lg-5 control-label">Password<span>*</span></label>
                        <div class="col-lg-7">
                            <?php
                                echo $this->Form->input(
                                    'password',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'placeholder' => "New Password"
                                    )
                                );
                            ?>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-5 control-label">Confirm password<span>*</span></label>
                        <div class="col-lg-7">
                             <?php
                                echo $this->Form->input(
                                    'confirm_password',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'type' => 'password',
                                        'placeholder' => "Confirm Password"
                                    )
                                );
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">Submit</button>
                        </div>
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Currency setting</h5>
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
                <?php echo $this->Form->create('Setting', array( 'action' => "set_currency", 'class'=>"form-horizontal")); ?>
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Currency type<span>*</span></label>
                        <div class="col-sm-7">
                            <?php
                                echo $this->Form->input(
                                    'currency_type',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true,
                                        'value' => $currency_type
                                    )
                                );
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 control-label">Currency symbol<span>*</span></label>
                        <div class="col-sm-7">
                            <?php
                                echo $this->Form->input(
                                    'curr_symbol',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true,
                                        'value' => $currency_symbol
                                    )
                                );
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">Submit</button>
                        </div>
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Company taxes details</h5>
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
                <?php echo $this->Form->create('Setting', array( 'action' => "company_tax_details", 'class'=>"form-horizontal")); ?>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Tax details.(GST no.)<span>*</span></label>
                    <div class="col-sm-9">
                        <?php
                            echo $this->Form->input(
                                'GST_no',
                                array(
                                    'class' => 'form-control',
                                    'label' => false,
                                    'required' => true,
                                    'type' => 'text',
                                    'value' => isset($tax_details['GST_no']) ? $tax_details['GST_no'] : '',
                                    'maxlength '=> "40"
                                )
                            );
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">CIN<span>*</span></label>
                    <div class="col-sm-9">
                        <?php
                            echo $this->Form->input(
                                'CIN',
                                array(
                                    'class' => 'form-control',
                                    'label' => false,
                                    'required' => true,
                                    'type' => 'text',
                                    'value' => isset($tax_details['CIN']) ? $tax_details['CIN'] : '',
                                    'maxlength '=> "40"
                                )
                            );
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">PAN<span>*</span></label>
                    <div class="col-sm-9">
                        <?php
                            echo $this->Form->input(
                                'PAN',
                                array(
                                    'class' => 'form-control',
                                    'label' => false,
                                    'required' => true,
                                    'type' => 'text',
                                    'value' => isset($tax_details['PAN']) ? $tax_details['PAN'] : '',
                                    'maxlength '=> "40"
                                )
                            );
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">TAN<span>*</span></label>
                    <div class="col-sm-9">
                        <?php
                            echo $this->Form->input(
                                'TAN',
                                array(
                                    'class' => 'form-control',
                                    'label' => false,
                                    'required' => true,
                                    'type' => 'text',
                                    'value' => isset($tax_details['TAN']) ? $tax_details['TAN'] : '',
                                    'maxlength '=> "40"
                                )
                            );
                        ?>
                    </div>
                </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">Submit</button>
                        </div>
                    </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->element('backend_footer'); ?>
<script>
    $(document).on('click', '#logo_icon', function(event) { 
        event.preventDefault(); 
        $("#upload_logo").click(); 
    });

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#logo_icon').html('<img src="'+e.target.result+'" style="width:100%;">');
          $('#logo_icon a').attr('style','display:none;');
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#upload_logo").change(function() {
      readURL(this);
    });

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