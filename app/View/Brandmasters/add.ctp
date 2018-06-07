<?php  echo $this->Html->css('../admin/css/plugins/summernote/summernote.css'); ?>
<?php  echo $this->Html->css('../admin/css/plugins/summernote/summernote-bs3.css'); ?>
<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>Add new brand</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li>
                <a href="<?php echo $this->webroot; ?>Brandmasters">Brand master</a>
            </li>
            <li class="active">
                <strong>Add Brand</strong>
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
                    <h5>Add new brand</h5>
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
                    <?php echo $this->Form->create('Brandmaster', array('id' => 'profile','type' => 'file')); ?>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Brand name<span>*</span></label>
                        <div class="col-sm-9">
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

                    <div class="form-group"><label class="col-sm-3 control-label">Description<span>*</span></label>
                        <div class="col-sm-9">
                            <?php
                                echo $this->Form->input(
                                    'details',
                                    array(
                                        'class' => 'summernote form-control',
                                        'label' => false
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Upload images</label>
                        <div class="col-sm-9">
                            <span class="btn btn-primary btn-outline btn-file">
                                <i class="fa fa-upload"></i> Browse images
                                <?php
                                    echo $this->Form->input(
                                        'imgs',
                                        array(
                                            'label' => false,
                                            'type' => 'file',
                                            // 'multiple' => true,
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
<?php echo $this->Html->script('../admin/js/plugins/summernote/summernote.min.js'); ?>
<script>

    $(document).ready(function(){
        $('.summernote').summernote();

  //       $( ".note-editable" ).focusout(function() {
  //       	var desc = $('.note-editable').html();
  //       	$('.summernote').val(desc);
		// });
    });
    $('#produ_img').change(function(){
        if (this.files.length > 1) {
            $('.updatedimgs').html(this.files.length+' files are selected');
        }else{
            $('.updatedimgs').html(this.files.length+' file selected');
        }
    });

</script>
