<?php  echo $this->Html->css('../admin/css/plugins/summernote/summernote.css'); ?>
<?php  echo $this->Html->css('../admin/css/plugins/summernote/summernote-bs3.css'); ?>
<?php echo $this->Html->css('../admin/css/plugins/chosen/bootstrap-chosen.css'); ?>
<?php  echo $this->Html->css('../admin/css/plugins/iCheck/custom.css'); ?>

<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>Edit Product</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li>
                <a href="<?php echo $this->webroot; ?>products">Products</a>
            </li>
            <li class="active">
                <strong>Edit product</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <div class="row add_btn">
            <a class="btn btn-info btn-circle btn-lg btn-outline right-flt" href="<?php echo $this->webroot; ?>products/view/<?php echo $this->request->data['Product']['id']; ?>" data-toggle="tooltip" data-placement="auto" title="View this product">
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
                        <li class="active"><a data-toggle="tab" href="#tab-1"> Product</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2">Product Images</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <div class="ibox float-e-margins">
                                        <h4>Edit product</h4>
                                    <div class="ibox-content">
                                        <?php echo $this->Form->create('Product', array('id' => 'profile','type' => 'file')); ?>

                                        <div class="form-group">
                                        <label class="col-sm-2 control-label">Title<span>*</span></label>
                                        <div class="col-sm-10">
                                                <?php
                                                    echo $this->Form->input(
                                                        'title',
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
                                        <label class="col-sm-2 control-label">Choose category<span>*</span></label>
                                        <div class="col-sm-10">
                                            <?php
                                                echo $this->Form->input('category_id', array(
                                                                                            'class' => 'chosen-select',
                                                                                            'empty' => 'Select category',
                                                                                            'multiple' => 'multiple',
                                                                                            'label' => false,
                                                                                            'data-placeholder'=>"Choose category..."
                                                                                        ));
                                            ?>
                                        </div>
                                        <div class="hr-line-dashed col-md-12"></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">UID<span>*</span></label>
                                            <div class="col-sm-10">
                                                <?php
                                                    echo $this->Form->input(
                                                        'product_UID',
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
                                            <label class="col-sm-2 control-label">Type<span>*</span></label>
                                            <div class="col-sm-10">
                                                <?php
                                                    echo $this->Form->input(
                                                        'type',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                            'options' => array('Product'=>'Product', 'Service' => 'Service')
                                                        )
                                                    );
                                                ?>
                                            </div>
                                            <div class="hr-line-dashed col-md-12"></div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Choose brand</label>
                                            <div class="col-sm-10">
                                                <?php
                                                    echo $this->Form->input('brand_id', array(
                                                                                                'class' => 'form-control',
                                                                                                'empty' => 'Select brand',
                                                                                                'label' => false,
                                                                                            ));
                                                ?>
                                            </div>
                                            <div class="hr-line-dashed col-md-12"></div>
                                        </div>


                                        <div class="form-group"><label class="col-sm-2 control-label">Description</label>
                                            <div class="col-sm-10">
                                                <?php
                                                    echo $this->Form->input(
                                                        'description',
                                                        array(
                                                            'class' => 'summernote form-control',
                                                            'label' => false,
                                                        )
                                                    );
                                                ?>
                                            </div>
                                            <div class="hr-line-dashed col-md-12"></div>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Price<span>*</span></label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><?php echo $currency; ?></span>
                                                    <?php
                                                        echo $this->Form->input(
                                                            'price',
                                                            array(
                                                                'class' => 'form-control',
                                                                'label' => false,
                                                            )
                                                        );
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="hr-line-dashed col-md-12"></div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Discount</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <?php
                                                        echo $this->Form->input(
                                                            'discount',
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

                                      <!--   <div class="form-group">
                                            <label class="col-sm-2 control-label">Discount in currency</label>
                                            <div class="col-sm-10">
                                                <?php
                                                    // echo $this->Form->input(
                                                    //     'discount',
                                                    //     array(
                                                    //         'class' => 'form-control',
                                                    //         'label' => false,
                                                    //         'type' => 'number'
                                                    //     )
                                                    // );
                                                ?>
                                            </div>
                                            <div class="hr-line-dashed col-md-12"></div>
                                        </div> -->

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">MOQ<span>*</span></label>
                                            <div class="col-sm-10">
                                                <?php
                                                    echo $this->Form->input(
                                                        'MOQ',
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
                                            <label class="col-sm-2 control-label">Product count<span>*</span></label>
                                            <div class="col-sm-10">
                                                <?php
                                                    echo $this->Form->input(
                                                        'product_count',
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
                                            <label class="col-sm-2 control-label">GST tax rates</label>
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
                                            <label class="col-sm-2 control-label">Variant type<span>*</span></label>
                                            <div class="col-sm-10">
                                                <?php
                                                    echo $this->Form->input(
                                                        'variant_type',
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
                                            <label class="col-sm-2 control-label">Variant value<span>*</span></label>
                                            <div class="col-sm-10">
                                                <?php
                                                    echo $this->Form->input(
                                                        'product_variant',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
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
                                            <label class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10">
                                                <div class="i-checks">
                                                    <?php
                                                        echo $this->Form->input('Product.status', array(
                                                            'options' => array('Active'=>'Active', 'Inactive'=>'Inactive'),
                                                            'type' => 'radio',
                                                            'label' => false,
                                                            'legend' => false,
                                                            'class'=> 'radiobtn'
                                                        ));
                                                    ?>
                                                </div>
                                            </div>
                                        <div class="hr-line-dashed col-md-12"></div>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Upload images<span>*</span></label>
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
                                                                'required'=> false
                                                            )
                                                        );
                                                    ?>
                                                </span>
                                                <span class="updatedimgs">
                                                    
                                                </span>
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
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-stripped">
                                        <thead>
                                        <tr>
                                            <th>
                                                Image preview
                                            </th>
                                            <th>
                                                Image url
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if ($this->request->data['Product']['imgs'] !="") {
                                        $file = $this->request->data['Product']['imgs'];
                                        $images = explode(',', $file);
                                        foreach ($images as $key => $img) {
                                        ?>
                                        <tr id="<?php echo $key; ?>">
                                            <td width="30%">
                                                <img src="<?php echo $this->webroot. $img; ?>">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" disabled value="<?php echo $this->webroot. $img; ?>">
                                            </td>
                                            <td>
                                                <a class="btn btn-white" onclick="deleteimg('<?php echo $img; ?>',<?php echo $this->request->data['Product']['id']; ?>,<?php echo $key; ?>);"><i class="fa fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                        <?php }
                                        }
                                         ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
            
        </div>
    </div>
</div>
<?php echo $this->element('backend_footer'); ?>
<?php echo $this->Html->script('../admin/js/plugins/summernote/summernote.min.js'); ?>
<?php echo $this->Html->script('../admin/js/plugins/chosen/chosen.jquery.js'); ?>
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
    $('.chosen-select').chosen({width: "100%"});
    
</script>
<?php echo $this->Html->script('../admin/js/plugins/iCheck/icheck.min.js'); ?>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>