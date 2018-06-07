<?php  echo $this->Html->css('../admin/css/plugins/iCheck/custom.css'); ?>
<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>Add new User</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li>
                <a href="<?php echo $this->webroot; ?>users">Users</a>
            </li>
            <li class="active">
                <strong>Add new user</strong>
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
                    <h5>Add users <small>This section is to create all type of user by admin. Send mail to user for accessing their account.</small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="<?php echo $this->webroot; ?>users">User list</a>
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
                        <label class="col-sm-2 control-label">First name</label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'User.f_name',
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
                        <label class="col-sm-2 control-label">Last name</label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'User.l_name',
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
                        <label class="col-sm-2 control-label">Email Id</label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'User.email',
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
                        <label class="col-sm-2 control-label">User type</label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'User.group_id',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'options' => $options
                                    )
                                );
                            ?>
                        </div>
                    </div>
                    <div class="hr-line-dashed col-md-12"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <div class="i-checks"><input type="checkbox" value="" checked="" style="position: absolute; opacity: 0;"> Send email to user</div>
                        </div>
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