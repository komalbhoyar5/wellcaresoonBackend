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
                        if (!empty($company_details)) {
                            $company_name = $company_details['Setting']['value'];
                        }else{
                            $company_name = "";
                        }
                    ?>
                    <div class="col-sm-5 b-r"><h3 class="m-t-none m-b">Company name details</h3>
                            <div class="form-group">
                                <label>Company name</label> 
                                <input type="text" placeholder="Enter project name" name="company_name" class="form-control" value="<?php echo $company_name; ?>" maxlength="40">
                            </div>
                            
                    </div>
                    <div class="col-sm-7"><h4>Choose logo and fevicon</h4>
                        
                            <p>click on image to update new logo and fevicon.</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="file" id="upload_logo" name="logo">
                                <p class="text-center" id="logo_icon">
                                <?php
                                    if (!empty($company_detail)) {
                                    if ($company_details['Setting']['other'] !="") {
                                ?>
                                    <img src="<?php echo $this->webroot. $company_details['Setting']['other']; ?>" id="">
                                <?php
                                    }
                                    }else{ ?>
                                    <a ><i class="fa fa-sign-in big-icon"></i></a>
                                <?php
                                    }
                                ?>
                                </p>
                            </div>
                            <div class="col-sm-6"></div>
                        </div>
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
                <h5>Shipping charges setting <small></small></h5>
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
                        'action' => 'shipping_charges', 'class'=>"form-horizontal"
                    ));
                ?>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Tax</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"><?php echo $currency_symbol; ?></span> 
                            <?php
                                echo $this->Form->input(
                                    'tax',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true,
                                        'value' => $tax
                                    )
                                );
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Cash on delivery charges</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"><?php echo $currency_symbol; ?></span>
                            <?php
                                echo $this->Form->input(
                                    'cash_on_delivery',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true,
                                        'value' => $cash_on_delivery
                                    )
                                );
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Shipping charges</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <span class="input-group-addon"><?php echo $currency_symbol; ?></span>
                            <?php
                                echo $this->Form->input(
                                    'shipping_charges',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'required' => true,
                                        'value' => $shipping_charges
                                    )
                                );
                            ?>
                        </div>
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
                    <div class="form-group"><label class="col-lg-5 control-label">Password</label>
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
                    <div class="form-group"><label class="col-lg-5 control-label">Confirm password</label>
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
                        <label class="col-sm-4 control-label">Currency type</label>
                        <div class="col-sm-8">
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
                        <label class="col-sm-4 control-label">Currency symbol</label>
                        <div class="col-sm-8">
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

</script>