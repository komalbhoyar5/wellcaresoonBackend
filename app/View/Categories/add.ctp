<?php  echo $this->Html->css('../admin/css/plugins/dropzone/dropzone.css'); ?>

<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>Add category</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li>
                <a href="<?php echo $this->webroot; ?>categories">Category</a>
            </li>
            <li class="active">
                <strong>Add Category</strong>
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
                    <h5>Add category</h5>
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
                    <?php echo $this->Form->create('Category', array('id' => 'profile','type' => 'file')); ?>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'name',
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
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'desc',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'type'=>'textarea'
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Parent category</label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'parent_id',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'empty' => 'Select parent category',
                                        'options' => $parentCategories
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">GST tax rate</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <?php
                                    echo $this->Form->input(
                                        'GST_tax',
                                        array(
                                            'class' => 'form-control',
                                            'label' => false,
                                        )
                                    );
                                ?>
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Upload images</label>
                        <div class="col-sm-10">
                            <span class="btn btn-primary btn-outline btn-file">
                                <i class="fa fa-upload"></i> Browse images
                                <?php
    							    echo $this->Form->input(
    							        'Category.imgs.',
    							        array(
    							            'label' => false,
    							            'type' => 'file',
    			            				'multiple' => true,
                                            'id'=>'produ_img',
                                            'div' => false,
                                            'required'=>'false'
    							        )
    							    );
    							?>
                            </span>
                            <span class="updatedimgs"></span>
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
<!-- DROPZONE -->
<?php //echo $this->Html->script('../admin/js/plugins/dropzone/dropzone.js'); ?>
<script>
    $('#produ_img').change(function(){
        if (this.files.length > 1) {
            $('.updatedimgs').html(this.files.length+' files are selected');
        }else{
            $('.updatedimgs').html(this.files.length+' file selected');
        }
    });
</script>
