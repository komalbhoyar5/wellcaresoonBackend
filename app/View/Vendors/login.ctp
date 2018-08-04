 <!-- Fixed navbar -->
<nav class="navbar navbar-vendor navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img alt="<?php echo $company_name; ?>" class="img-responsive" src="<?php echo $this->webroot.$company_logo; ?>" style="margin-bottom: 15px;"/></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
        <?php echo $this->Form->create('User', array('id' => 'login-box', 'class' => 'navbar-form navbar-right')); ?>
        <div class="row">
            <h6 class="login col-sm-6">Vendor login</h6>
            <h6 class="forgot col-sm-6"><a href="<?php echo $this->webroot; ?>vendors/forgot_password">Forgot password?</a></h6>
        </div>
          <?php
                echo $this->Form->input(
                    'email',
                    array(
                        'class' => 'form-control',
                        'placeholder' => 'Username',
                        'label' => false,
                        'div' => array('class' => 'form-group')
                    )
                );
            ?>
            <?php
                echo $this->Form->input(
                    'password',
                    array(
                        'class' => 'form-control',
                        'placeholder' => 'Password',
                        'label' => false,
                        'type' => 'password',
                        'div' => array('class' => 'form-group')
                    )
                );
            ?>
        <?php
            echo $this->Form->end(
                array(
                    'label' => 'Login',
                    'class' => 'btn btn-default',
                    'div' => array('class' => 'form-group')
                )
            );
        ?>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<div class="vendor_back">
    <div class="container animated fadeInDown register_container">
        <div class="row">
            <div class="col-md-8">
                
            </div>
            <div class="col-md-4">
                <div class="ibox-content">
                    <h2>Register today</h2>
                    <?php echo $this->Form->create('User', array('action' => 'register'), array('id' => 'login-box', 'class' => 'form-box')); ?>
                    <div class="form-group">
                        <?php
                            echo $this->Form->input(
                                'f_name',
                                array(
                                    'class' => 'form-control',
                                    'placeholder' => 'First name',
                                    'label' => false
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
                                    'label' => false
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
                                    'label' => false
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
                                    'label' => false,
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
                                    'label' => false,
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
                                    'label' => 'Register now',
                                    'class' => 'btn btn-primary block full-width m-b',
                                    'div' => array('class' => 'form-group registerbtn')
                                )
                            );
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="white-wrapper nopadding">
        <div class="container">
            <div class="general-row">
                <div class="custom-services">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 first">
                        <div class="ch-item">   
                            <div class="ch-info-wrap">
                                <div class="ch-info">
                                    <div class="ch-info-front">
                                        <i class="fa fa-user-md fa-4x"></i>
                                        <h3>Medical Treatment</h3>
                                    </div>
                                    <div class="ch-info-back">
                                        <i class="fa fa-user-md fa-4x"></i>
                                        <h3>Medical Treatment</h3>
                                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Nulla nulla diam, Etiam urna scing elit..</p>
                                    </div>
                                </div><!-- end ch-info -->
                            </div><!-- end ch-info-wrap -->
                        </div><!-- end ch-item -->
                    </div><!-- end col-sm-3 -->

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="ch-item">   
                            <div class="ch-info-wrap">
                                <div class="ch-info">
                                    <div class="ch-info-front">
                                        <i class="fa fa-medkit fa-4x"></i>
                                        <h3>HEALTHCARE SOLUTIONS</h3>
                                    </div>
                                    <div class="ch-info-back">
                                        <i class="fa fa-medkit fa-4x"></i>
                                        <h3>HEALTHCARE SOLUTIONS</h3>
                                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Nulla nulla diam, Etiam urna scing elit..</p>
                                    </div>
                                </div><!-- end ch-info -->
                            </div><!-- end ch-info-wrap -->
                        </div><!-- end ch-item -->
                    </div><!-- end col-sm-3 -->
                    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="ch-item">   
                            <div class="ch-info-wrap">
                                <div class="ch-info">
                                    <div class="ch-info-front">
                                        <i class="fa fa-hospital-o fa-4x"></i>
                                        <h3>ADVANCED TECHNOLOGY</h3>
                                    </div>
                                    <div class="ch-info-back">
                                        <i class="fa fa-hospital-o fa-4x"></i>
                                        <h3>ADVANCED TECHNOLOGY</h3>
                                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Nulla nulla diam, Etiam urna scing elit..</p>
                                    </div>
                                </div><!-- end ch-info -->
                            </div><!-- end ch-info-wrap -->
                        </div><!-- end ch-item -->
                    </div><!-- end col-sm-3 -->
                    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 last">
                        <div class="ch-item last">  
                            <div class="ch-info-wrap">
                                <div class="ch-info">
                                    <div class="ch-info-front">
                                        <i class="fa fa-ambulance fa-4x"></i>
                                        <h3>Emergency Help</h3>
                                    </div>
                                    <div class="ch-info-back">
                                        <i class="fa fa-ambulance fa-4x"></i>
                                        <h3>Emergency Help</h3>
                                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Nulla nulla diam, Etiam urna scing elit..</p>
                                    </div>
                                </div><!-- end ch-info -->
                            </div><!-- end ch-info-wrap -->
                        </div><!-- end ch-item -->
                    </div><!-- end col-sm-3 -->
                </div><!-- end custom-services -->
                
                <div class="clearfix"></div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end white-wrapper -->