<div class="loginColumns animated fadeInDown">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $this->webroot. $company_logo; ?>" alt="<?php echo $company_name; ?>" style="width:40%;">
            <h2 class="font-bold">Admin portal login</h2>
            <p>
                
            </p>
            <p><?php echo $company_name; ?></p>
            <p>
                Manage the administrative settings and configurations, users, vendors, product categories, products, discounts and various approvals.
            </p>
        </div>
        <div class="col-md-6">
            <div class="ibox-content">
                <?php echo $this->Form->create('User', array('id' => 'login-box', 'class' => 'form-box')); ?>
                    <div class="form-group">
                        <?php
                            echo $this->Form->input(
                                'email',
                                array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Email id',
                                    'label' => ''
                                ),
                                array(
                                    'div' => array('class' => 'form-group')
                                )
                            );
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            echo $this->Form->input(
                                'password',
                                array(
                                    'class' => 'form-control',
                                    'placeholder' => 'Password',
                                    'label' => '',
                                    'type' => 'password'
                                ),
                                array(
                                    'div' => array('class' => 'form-group')
                                )
                            );
                        ?>
                    </div>
                    <?php
                        echo $this->Form->end(
                            array(
                                'label' => 'Login',
                                'class' => 'btn btn-primary block full-width m-b'
                            )
                        );
                    ?>
                    <a href="<?php echo $this->webroot; ?>users/forgot_password">
                        <small>Forgot password?</small>
                    </a>

                    <!-- <p class="text-muted text-center">
                        <small>Do not have an account?</small>
                    </p>
                    <a class="btn btn-sm btn-white btn-block" href="<?php echo $this->webroot; ?>users/register">Create an account</a> -->
                </form>
                <p class="m-t">
                    <center><small>Copyright &copy; <?php echo date("Y"); ?> <?php echo $company_name; ?></small></center>
                </p>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            <!-- Copyright Example Company -->
        </div>
        <div class="col-md-6 text-right">
           <!-- <small>© 2018-</small> -->
        </div>
    </div>
</div>
