<?php  echo $this->Html->css('../admin/css/plugins/summernote/summernote.css'); ?>
<?php  echo $this->Html->css('../admin/css/plugins/summernote/summernote-bs3.css'); ?>

<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>Edit user</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li>
                <a href="<?php echo $this->webroot; ?>users">Users</a>
            </li>
            <li class="active">
                <strong>Edit user</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <div class="row add_btn">
            <a class="btn btn-info btn-circle btn-lg btn-outline right-flt" href="<?php echo $this->webroot; ?>users/view/<?php echo $this->request->data['User']['id']; ?>" data-toggle="tooltip" data-placement="auto" title="View this users">
                <i class="fa fa-paste"></i>
            </a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1"> User detail</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2">Other details</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <div class="ibox float-e-margins">
                                        <h4>Edit user</h4>
                                    <div class="ibox-content">
                                        <?php echo $this->Form->create('User', array('id' => 'profile','type' => 'file')); ?>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">First name</label>
                                            <div class="col-sm-10">
                                                <?php
                                                    echo $this->Form->input(
                                                        'f_name',
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
                                                        'l_name',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                        )
                                                    );
                                                ?>
                                            </div>
                                            <div class="hr-line-dashed col-md-12"></div>
                                        </div>

                                        <div class="form-group"><label class="col-sm-2 control-label">Email id</label>
                                            <div class="col-sm-10">
                                                <?php
                                                    echo $this->Form->input(
                                                        'email',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                            'disabled' => 'disabled'
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
                                                    echo $this->Form->input('group_id', array(
                                                                                                'class' => 'form-control',
                                                                                                'empty' => 'Select category',
                                                                                                'label' => false,
                                                                                                'options' => $options
                                                                                            ));
                                                ?>
                                            </div>
                                            <div class="hr-line-dashed col-md-12"></div>
                                        </div>
                                        
                                        <!-- <div class="form-group">
                                            <label class="col-sm-2 control-label">Upload images</label>
                                            <div class="col-sm-10">
                                                <span class="btn btn-primary btn-outline btn-file">
                                                    <i class="fa fa-upload"></i> Browse images
                                                    <?php
                                                        echo $this->Form->input(
                                                            'Product.imgs.',
                                                            array(
                                                                'label' => false,
                                                                'type' => 'file',
                                                                'multiple' => true,
                                                                'div'=>false,
                                                                'id'=>'produ_img',
                                                                'required' => false
                                                            )
                                                        );
                                                    ?>
                                                </span>
                                                <span class="updatedimgs">
                                                    
                                                </span>
                                            </div>
                                        </div> -->


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
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
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
    	var inhtml = $('.summernote').val();
        $('.note-editable').html(inhtml);

        $('.summernote').summernote();

  //       $( ".note-editable" ).focusout(function() {
  //       	var desc = $('.note-editable').html();
  //       	$('.summernote').val(desc);
		// });
            $('#produ_img').change(function(){
            if (this.files.length > 1) {
                $('.updatedimgs').html(this.files.length+' files are selected');
            }else{
                $('.updatedimgs').html(this.files.length+' file selected');
            }

        });
   });
</script>
<script>
    function deleteimg(img, product_id, div_id){
        var dataUrl = "<?php echo Router::url('/', true).'products/delete_images'; ?>";
        formData = {
            'img': img,
            'product_id': product_id
        }
        console.log(formData);
        var retVal = confirm("Are you sure to delete this image?");
        if( retVal == true ){
            $.ajax({
                url: dataUrl,
                type: 'POST',
                data: formData,
                beforeSend:function(data){
                    // $('.loadimg').css("display","block");
                },
                success:function(data){
                    console.log(data);
                    if (data == 'success') {
                        $('#'+div_id).attr('style','display:none;');
                    };
                }
            });
        }else{
            return false;
        }
    }
</script>