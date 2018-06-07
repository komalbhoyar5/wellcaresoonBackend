<div class="middle-box text-center loginscreen   animated fadeInDown">
    <div>
        <h3>Register to <?php echo $company_name; ?></h3>
        <p>Create account for admin panel as a superadmin.</p>
        <p>Note- This page is private, will only use by <?php echo $company_name; ?> company's employees.</p>
        <?php echo $this->Form->create('User', array('id' => 'login-box', 'class' => 'form-box')); ?>

            <div class="form-group">
                <?php
                    echo $this->Form->input(
                        'f_name',
                        array(
                            'class' => 'form-control',
                            'placeholder' => 'First name',
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
                        'l_name',
                        array(
                            'class' => 'form-control',
                            'placeholder' => 'Last name',
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
            <div class="form-group">
                <?php
                    echo $this->Form->input(
                        'confirm_password',
                        array(
                            'class' => 'form-control',
                            'placeholder' => 'Confirm password',
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
                        'label' => 'Register',
                        'class' => 'btn btn-primary block full-width m-b'
                    )
                );
            ?>
            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="<?php echo $this->webroot; ?>users/login">Login</a>
        <?php echo $this->Form->create('User', array('id' => 'login-box', 'class' => 'form-box')); ?>
        <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
    </div>
</div>