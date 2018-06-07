
<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>Edit category</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li>
                <a href="<?php echo $this->webroot; ?>categories">Category</a>
            </li>
            <li class="active">
                <strong>Edit Category</strong>
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
                    <h5>Edit category</h5>
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
                                	$file = $this->request->data['Category']['imgs'];
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
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    <div class="row" style="margin-bottom:20px;">
                    <?php
                    	if ($file !="") {
	                    	$images = explode(',', $file);
			                foreach ($images as $key =>$img) {
								?>
			                    <div class="col-md-2" id="<?php echo $key; ?>">
		                    		<div class="stream" onclick="deleteimg('<?php echo $img; ?>',<?php echo $this->request->data['Category']['id']; ?>,<?php echo $key; ?>);">
		                    			<i class="fa fa-times"></i>
		                    		</div>
			                    	<div class="thumnail_div" style="background-image:url('<?php echo $this->webroot. $img; ?>');" >
			                    	</div>
			                    </div>
				    		<?php	
				                }
                    	}
				        ?>
                    </div>
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
<script>
    $('#produ_img').change(function(){
        if (this.files.length > 1) {
            $('.updatedimgs').html(this.files.length+' files are selected');
        }else{
            $('.updatedimgs').html(this.files.length+' file selected');
        }
    });
	function deleteimg(img, category_id, div_id){
		var dataUrl = "<?php echo Router::url('/', true).'categories/delete_images'; ?>";
		formData = {
			'img': img,
			'category_id': category_id
		}
		console.log(dataUrl);
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

