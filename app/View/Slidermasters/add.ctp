<?php  echo $this->Html->css('../admin/css/plugins/summernote/summernote.css'); ?>
<?php  echo $this->Html->css('../admin/css/plugins/summernote/summernote-bs3.css'); ?>
<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>Add new Slider</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li>
                <a href="<?php echo $this->webroot; ?>Brandmasters">Slider master</a>
            </li>
            <li class="active">
                <strong>Add Slider image </strong>
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
                    <h5>Add new slider</h5>
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
                    <?php echo $this->Form->create(array('id' => 'profile','type' => 'file')); ?>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Add link for slider<span>*</span></label>
                        <div class="col-sm-9" id="linkerror">
                            <?php
                                echo $this->Form->input(
                                    'link',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'type' => 'text'
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Upload images</label>
                        <div class="col-sm-9" id="slidererror">
                            <span class="btn btn-primary btn-outline btn-file">
                                <i class="fa fa-upload"></i> Browse image
                                <?php
                                    echo $this->Form->input(
                                        'image',
                                        array(
                                            'label' => false,
                                            'type' => 'file',
                                            // 'multiple' => true,
                                            'id'=>'slider_img',
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
                        	<input class="btn btn-md pull-right btn-primary m-t-n-xs" id="submit" name="Submit" type="submit" value="Submit">
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
    $('#slider_img').change(function(){
        if (this.files.length > 1) {
            $('.updatedimgs').html(this.files.length+' files are selected');
        }else{
            $('.updatedimgs').html(this.files.length+' file selected');
        }
    });

 //    function validate(){
 //    	$('.error-message').html("");
	//     var inp = document.getElementById('slider_img');
	//     var link = $('#SlidermasterLink').val();
	//     console.log(link);
	//     if (link == "") {
	//     	$('#linkerror').append('<div class="error-message">Please enter link.</div>');
	//         inp.focus();
	//         return false;
	//     }
	//     else if(inp.files.length === 0){
	//         $('#slidererror').append('<div class="error-message">Please Upload image.</div>');
	//         inp.focus();
	//         return false;
	//     }
	// }
</script>

