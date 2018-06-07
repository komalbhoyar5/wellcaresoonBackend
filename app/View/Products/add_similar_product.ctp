<?php  echo $this->Html->css('../admin/css/plugins/summernote/summernote.css'); ?>
<?php  echo $this->Html->css('../admin/css/plugins/summernote/summernote-bs3.css'); ?>

<div class="row wrapper border-bottom white-bg page-heading wrapper-content">
    <div class="col-lg-10">
        <h2>Add Similar Product</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li>
                <a href="<?php echo $this->webroot; ?>products">Products</a>
            </li>
            <li class="active">
                <strong>Add product</strong>
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
                    <h5>Add Similar product</h5>
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
                                                                            'class' => 'form-control',
                                                                            'empty' => 'Select category',
                                                                            'label' => false,
                                                                            'options'=>$categories
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
                                        'value' => ''
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
                        <label class="col-sm-2 control-label">Choose brand<span>*</span></label>
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
                                            'value' => ''
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
                                            'value' => ''
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
                                        'value' => ''
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
                                        'value' => ''
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
                                            'value' => ''
                                        )
                                    );
                                ?>
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Variant type</label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'variant_type',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Variant value</label>
                        <div class="col-sm-10">
                            <?php
                                echo $this->Form->input(
                                    'product_variant',
                                    array(
                                        'class' => 'form-control',
                                        'label' => false,
                                        'value' => ''
                                    )
                                );
                            ?>
                        </div>
                        <div class="hr-line-dashed col-md-12"></div>
                    </div>

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
</div>
<?php echo $this->element('backend_footer'); ?>
<?php echo $this->Html->script('../admin/js/plugins/summernote/summernote.min.js'); ?>

<script>

    $(document).ready(function(){
        var inhtml = $('.summernote').val();
        $('.note-editable').html(inhtml);

        $('.summernote').summernote();


        $('#produ_img').change(function(){
            if (this.files.length > 1) {
                $('.updatedimgs').html(this.files.length+' files are selected');
            }else{
                $('.updatedimgs').html(this.files.length+' file selected');
            }

        });

    });
</script>