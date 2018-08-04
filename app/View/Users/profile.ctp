<?php  echo $this->Html->css('../admin/css/plugins/iCheck/custom.css'); ?>
<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>Update your profile</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li class="active">
                <strong>Update profile</strong>
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
                    <h5>Update your profile</h5>
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
                                        'disabled'=>'disabled'
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <?php
                        if ($this->data['User']['group_id'] == '1' || $this->data['User']['group_id'] == '2') {
                    ?>
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
                    <?php } ?>
                    <?php
                        if ($this->data['User']['group_id'] != '1' || $this->data['User']['group_id'] != '2') {
                    ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Are you a doctor ?</label>
                        <div class="col-sm-10">
                            <div class="i-checks">
                                <?php
                                    echo $this->Form->input('User.is_doctor', array(
                                        'options' => array('Yes'=>'Yes', 'No'=>'No'),
                                        'type' => 'radio',
                                        'label' => false,
                                        'legend' => false,
                                        'class'=> 'radiobtn'
                                    ));
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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
