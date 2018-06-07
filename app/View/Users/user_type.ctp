<?php  echo $this->Html->css('../admin/css/plugins/dataTables/datatables.min.css'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
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
    <div class="col-lg-2">
        <div class="row add_btn">
            <a class="btn btn-info btn-circle btn-lg right-flt" data-toggle="modal" data-target="#myModal5">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Basic Data Tables example with responsive plugin</h5>
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
				<th>Created date</th>
				<th>Modified date</th>
				<th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
            </thead>
            <tbody>
            	<?php foreach ($groups as $group): ?>
					<tr>
						<td><?php echo h($group['Group']['id']); ?></td>
						<td><?php echo h($group['Group']['name']); ?></td>
						<td><?php echo date('d M Y h:i a',strtotime($group['Group']['created'])); ?></td>
						<td><?php echo date('d M Y h:i a',strtotime($group['Group']['modified'])); ?></td>
						<td class="actions">
						<a data-toggle="modal" data-target="#myModal4" class="btn btn-xs btn-white editbtn" typeid="<?php echo h($group['Group']['id']); ?>" typename="<?php echo h($group['Group']['name']); ?>">Edit</a>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete_user_type', $group['Group']['id']), array('class'=>'btn btn-xs btn-white'), array(), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
 
            </tfoot>
            </table>
                </div>

            </div>
        </div>
    </div>
    </div>
</div>
<div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add new user type</h4>
            </div>
            <div class="modal-body">
            	<div class="row">
                	<?php echo $this->Form->create('User', array('id' => 'profile','type' => 'file','action' => 'add_user_type')); ?>
	                <div class="form-group">
	                    <label class="col-sm-2 control-label">Enter user type</label>
	                    <div class="col-sm-10">
	                        <?php
	                            echo $this->Form->input(
	                                'Group.name',
	                                array(
	                                    'class' => 'form-control',
	                                    'label' => false,
	                                )
	                            );
	                        ?>
	                    </div>
	                </div>
            	</div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <?php echo $this->Form->end(array('label' => 'Save changes', 'class' => 'btn btn-primary','div'=>false)); ?>
            </div>
        </div>
    </div>
</div>
<div class="modal inmodal fade" id="myModal4" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add new user type</h4>
            </div>
            <div class="modal-body">
            	<div class="row">
                	<?php echo $this->Form->create('User', array('id' => 'profile','type' => 'file','action' => 'edit_user_type')); ?>
	                <div class="form-group">
	                    <label class="col-sm-2 control-label">Enter user type</label>
	                    <div class="col-sm-10">
	                    	<?php
	                            echo $this->Form->input(
	                                'Group.id',
	                                array(
	                                    'class' => 'form-control',
	                                    'label' => false,
	                                    'type' => 'hidden',
	                                    'id' => 'typeid'
	                                )
	                            );
	                        ?>
	                        <?php
	                            echo $this->Form->input(
	                                'Group.name',
	                                array(
	                                    'class' => 'form-control',
	                                    'label' => false,
	                                    'id' => 'typename'
	                                )
	                            );
	                        ?>
	                    </div>
	                </div>
            	</div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <?php echo $this->Form->end(array('label' => 'Save changes', 'class' => 'btn btn-primary','div'=>false)); ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->element('backend_footer'); ?>
<?php echo $this->Html->script('../admin/js/plugins/dataTables/datatables.min.js'); ?>
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
            $('.editbtn').click(function(){
            	var id = $(this).attr('typeid');
            	var name = $(this).attr('typename');
            	$('#typeid').val(id);
            	$('#typename').val(name);
            });
            function updatetype(id, name){
            	$('#typeid').val(id);
            	$('#typename').val(name);
            }

        });

    </script>