<?php  echo $this->Html->css('../admin/css/plugins/dataTables/datatables.min.css'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Users</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li class="active">
                <strong>User list</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <div class="row add_btn">
            <a class="btn btn-info btn-circle btn-lg right-flt btn-outline" href="<?php echo $this->webroot; ?>users/add">
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
                <h5>All users</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo $this->webroot; ?>Users/add">Add new user</a>
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
                <th>Id</th>
				<th width="10">User name</th>
				<th width="15%">User type</th>
				<th>Email id</th>
				<th>Registration date</th>
				<th class="actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            	<?php foreach ($users as $user): ?>
					<tr>
					<td><?php echo h($user['User']['id']); ?></td>
					<td><?php echo ucwords($user['User']['f_name'] . " ". $user['User']['l_name']); ?></td>
                    <td><?php echo h($user['Group']['name']); ?></td>
					<td><?php echo h($user['User']['email']); ?></td>
					<td><?php echo date('d M Y h:i a',strtotime($user['User']['created'])); ?></td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id']), array('class'=>'btn btn-xs btn-white')); ?>
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class'=>'btn btn-xs btn-white')); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class'=>'btn btn-xs btn-white'), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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

        });

</script>