<?php  echo $this->Html->css('../admin/css/plugins/dataTables/datatables.min.css'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Pincode master</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li class="active">
                <strong>Pincode master</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <div class="row add_btn">
            <a class="btn btn-info btn-circle btn-lg right-flt btn-outline" href="<?php echo $this->webroot; ?>pincodemasters/add">
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
                <h5>All pincode details</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo $this->webroot; ?>pincodemasters/add">Add new pincode detail</a>
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
				<th width="10">Pincode no.</th>
				<th>Minimum order value</th>
                <th>Delivery charges</th>
				<th>Delivery period</th>
				<th>Is COD available</th>
				<th class="actions">Actions</th>
            </tr>
            </thead>
	            <tbody>
	            	<?php foreach ($pincodemasters as $pincodemaster): ?>
						<tr>
							<td><?php echo h($pincodemaster['Pincodemaster']['id']); ?></td>
							<td><?php echo h($pincodemaster['Pincodemaster']['pin_code_no']); ?></td>
                            <td><?php 
                                if ($pincodemaster['Pincodemaster']['delivery_on_amount'] !="") {
                                    echo $currency.' '. $pincodemaster['Pincodemaster']['delivery_on_amount']; 
                                }else{
                                    echo $currency.' '. '0'; 
                                }?>
                            </td>
                            <td>
                                <?php
                                    if ($pincodemaster['Pincodemaster']['delivery_charges'] !="") {
                                        echo $currency.' '. $pincodemaster['Pincodemaster']['delivery_charges']; 
                                    }else{
                                        echo $currency.' '. '0'; 
                                    }?>
                            </td>
							<td><?php echo h($pincodemaster['Pincodemaster']['delivery_period']); ?> days</td>
							<td><?php echo h($pincodemaster['Pincodemaster']['is_COD_available']); ?></td>
							<td class="actions">
							<?php //echo $this->Html->link(__('View'), array('action' => 'view', $pincodemaster['Pincodemaster']['id']), array('class'=>'btn btn-xs btn-white')); ?>
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pincodemaster['Pincodemaster']['id']), array('class'=>'btn btn-xs btn-white')); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pincodemaster['Pincodemaster']['id']), array('class'=>'btn btn-xs btn-white'), array(), __('Are you sure you want to delete # %s?', $pincodemaster['Pincodemaster']['id'])); ?>
						</td>
						</tr>
					<?php endforeach; ?>
	            </tbody>
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