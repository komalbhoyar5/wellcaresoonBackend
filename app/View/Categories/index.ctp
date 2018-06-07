<?php  echo $this->Html->css('../admin/css/plugins/dataTables/datatables.min.css'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-5">
        <h2>Category list</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li class="active">
                <strong>Categories</strong>
            </li>
        </ol>
    </div>
    <div class="col-md-5">
        <a href="#" class="btn btn-primary startTour" style="margin-top: 30px;"><i class="fa fa-play"></i> Start Tour</a>
    </div>
    <div class="col-lg-2">
        <div class="row add_btn">
            <a class="btn btn-info btn-circle btn-lg right-flt" href="<?php echo $this->webroot; ?>categories/add" id="step1">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12" id="step2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Category list in nested format</h5>
                </div>
                <div class="ibox-content">
                    <div class="dd" id="nestable2">
                        <ol class="dd-list">
                            <?php 
                            if (!empty($trees)) {
                            foreach ($trees as $tree) {
                            ?>
                            <li class="dd-item" data-id="1">
                                    <div class="dd-handle">
                                        <span class="label label-info"></span>
                                        <?php echo $this->Html->link(__($tree['Category']['name']), array('action' => 'view', $tree['Category']['id']), array('class'=>'','id'=>'step4')); ?>
                                        <div class="nestaction" id="step5">
                                            <a href="<?php echo $this->webroot; ?>categories/edit/<?php echo $tree['Category']['id']; ?>"><i class="fa fa-pencil"></i></a>
                                            <a href="<?php echo $this->webroot; ?>categories/delete/<?php echo $tree['Category']['id']; ?>"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                <?php
                                    if (!empty($tree['childs'])) { ?>
                                    <ol class="dd-list"><?php
                                        foreach ($tree['childs'] as $child) {
                                ?>
                                    <li class="dd-item" data-id="2">
                                            <div class="dd-handle">
                                            <span class="label label-info"></span> <?php echo $this->Html->link(__($child['Category']['name']), array('action' => 'view', $child['Category']['id']), array('class'=>'')); ?>
                                            <div class="nestaction">
                                                <a href="<?php echo $this->webroot; ?>categories/edit/<?php echo $child['Category']['id']; ?>"><i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo $this->webroot; ?>categories/delete/<?php echo $child['Category']['id']; ?>"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                        <?php
                                            if (!empty($child['childs'])) { ?>
                                            <ol class="dd-list"><?php
                                                foreach ($child['childs'] as $subchild) {
                                        ?>
                                        <li class="dd-item" data-id="2">
                                        <div class="dd-handle">
                                            <span class="label label-info"></span> <?php echo $this->Html->link(__($subchild['Category']['name']), array('action' => 'view', $subchild['Category']['id']), array('class'=>'')); ?>
                                            <div class="nestaction">
                                                <a href="<?php echo $this->webroot; ?>categories/edit/<?php echo $subchild['Category']['id']; ?>"><i class="fa fa-pencil"></i></a>
                                                <a href="<?php echo $this->webroot; ?>categories/delete/<?php echo $subchild['Category']['id']; ?>"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                         <?php
                                          } ?></ol><?php
                                            }
                                        ?>
                                    </li>
                                
                                <?php
                                  } ?></ol><?php
                                    }
                                ?>
                            </li>
                            <?php
                            }}
                            ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12" id="step3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Category list in table format</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo $this->webroot; ?>categories/add">Add new category</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>created_date</th>
                    <th>modified_date</th>
                    <th>created_by</th>
                    <!-- <th>parent category</th> -->
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?php echo h($category['Category']['id']); ?></td>
                            <td><?php echo h($category['Category']['name']); ?></td>
                            <td><?php echo date('d M Y h:i a',strtotime($category['Category']['created_date'])); ?></td>
                            <td><?php echo date('d M Y h:i a',strtotime($category['Category']['modified_date'])); ?></td>
                            <td><?php echo ucwords($category['User']['f_name']. ' '. $category['User']['l_name']); ?></td>
                            <!-- <td>
                                <?php echo $this->Html->link($category['ParentCategory']['name'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id'])); ?>
                            </td> -->
                            <td class="actions" id="step6">
                                <?php echo $this->Html->link(__('View'), array('action' => 'view', $category['Category']['id']), array('class'=>'btn btn-xs btn-white')); ?>
                                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id']), array('class'=>'btn btn-xs btn-white')); ?>
                                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), array('class'=>'btn btn-xs btn-white'), array(), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
     
                </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?php echo $this->element('backend_footer'); ?>
<?php echo $this->Html->script('../admin/js/plugins/dataTables/datatables.min.js'); ?>
<?php echo $this->Html->script('../admin/js/plugins/nestable/jquery.nestable.js'); ?>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
     <script>
     $(document).ready(function(){
        // nested list

         // // activate Nestable for list 2
         $('#nestable2').nestable({
         });
         $('.dd').nestable('collapseAll');
       
         // disable drag dro functionality 
         $(function () {
          $('.sortable').sortable({
            items: '.draggable'
          });
          $('li:not(".draggable")').on('mousedown', function(e) {
            e.stopPropagation();
          });
        });
     });
    </script>
    <script>

    $(document).ready(function (){

        // Instance the tour
        var tour = new Tour({
            steps: [
                {

                    element: "#step1",
                    title: "Add new Category",
                    content: "Click on this button to add new category.",
                    placement: "left",
                    backdrop: true,
                    backdropContainer: '#wrapper',
                    onShown: function (tour){
                        $('body').addClass('tour-open')
                    },
                    onHidden: function (tour){
                        $('body').removeClass('tour-close')
                    }
                },
                {
                    element: "#step2",
                    title: "Nested view category",
                    content: "This section shows you the categories in nested list format (Category and subcategory).",
                    placement: "top",
                    backdrop: true,
                    backdropContainer: '#wrapper',
                    onShown: function (tour){
                        $('body').addClass('tour-open')
                    },
                    onHidden: function (tour){
                        $('body').removeClass('tour-close')
                    }
                },
                {
                    element: "#step3",
                    title: "Category list in table view format",
                    content: "This is the normal table view which list out all categories.",
                    placement: "top",
                    backdrop: true,
                    backdropContainer: '#wrapper',
                    onShown: function (tour){
                        $('body').addClass('tour-open')
                    },
                    onHidden: function (tour){
                        $('body').removeClass('tour-close')
                    }
                },
                {
                    element: "#step4",
                    title: "View category details",
                    content: "",
                    placement: "top",
                    backdropContainer: '#wrapper',
                    onShown: function (tour){
                        $('body').addClass('tour-open')
                    },
                    onHidden: function (tour){
                        $('body').removeClass('tour-close')
                    }
                },
                {
                    element: "#step5",
                    title: "Edit and delete category",
                    content: "",
                    placement: "left",
                    backdropContainer: '#wrapper',
                    onShown: function (tour){
                        $('body').addClass('tour-open')
                    },
                    onHidden: function (tour){
                        $('body').removeClass('tour-close')
                    }
                },
                {
                    element: "#step6",
                    title: "Here also can viewn edit and delete category.",
                    content: "",
                    placement: "left",
                    backdropContainer: '#wrapper',
                    onShown: function (tour){
                        $('body').addClass('tour-open')
                    },
                    onHidden: function (tour){
                        $('body').removeClass('tour-close')
                    }
                }
            ]});

        // Initialize the tour
        tour.init();

        $('.startTour').click(function(){
            tour.restart();

            // Start the tour
            // tour.start();
        })

    });
</script>