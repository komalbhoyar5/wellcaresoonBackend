<div class="loginColumns animated fadeInDown">
    <div class="row">
        <div class="col-md-6">
            <h2 class="font-bold">Welcome to <?php echo $company_name; ?> Admin Panel</h2>

            <p>
                Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
            </p>

            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
            </p>

            <p>
                When an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </p>

            <p>
                <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
            </p>
        </div>
        <div class="col-md-6">
            <div class="ibox-content">
                <?php echo $this->Form->create('User', array('id' => 'login-box', 'class' => 'form-box')); ?>
                    <div class="form-group">
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
                    <div class="form-group">
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
                    <?php
                        echo $this->Form->end(
                            array(
                                'label' => 'Submit',
                                'class' => 'btn btn-primary block full-width m-b'
                            )
                        );
                    ?>
                    <a href="<?php echo $this->webroot; ?>users/forgot_password">
                        <small>Forgot password?</small>
                    </a>
                </form>
                <p class="m-t">
                    <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
                </p>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            Copyright Example Company
        </div>
        <div class="col-md-6 text-right">
           <small>© 2014-2015</small>
        </div>
    </div>
</div>
