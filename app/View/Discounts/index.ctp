<?php  echo $this->Html->css('../admin/css/plugins/dataTables/datatables.min.css'); ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Discount coupens</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li class="active">
                <strong>discount coupen list</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <div class="row add_btn">
            <a class="btn btn-info btn-circle btn-lg right-flt btn-outline" href="<?php echo $this->webroot; ?>discounts/add">
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
                <h5>All coupens <small>With searching options, export data and view, edit delete your coupens.</small></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo $this->webroot; ?>products/add">Add new discount coupen</a>
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
				<th>Discount code</th>
                <th>Discount name</th>
				<th>Discount type</th>
				<th width="5">Discount rate</th>
				<th width="5">Discount amount</th>
				<th>Expiry date</th>
                <th>Active</th>
                <th>status</th>
				<th>Action</th>
            </tr>
            </thead>
            <tbody>
            	<?php foreach ($discounts as $discount): ?>
					<tr>
						<td><?php echo h($discount['Discount']['id']); ?></td>
						<td><?php echo h($discount['Discount']['discount_code']); ?></td>
                        <td><?php echo h($discount['Discount']['discount_name']); ?></td>
						<td><?php echo h($discount['Discount']['type']); ?></td>
						<td><?php 
                                if ($discount['Discount']['discount_rate'] !="" && $discount['Discount']['discount_rate'] != 0) {
                                    echo $discount['Discount']['discount_rate'] . '%';
                                }
                            ?>
                        </td>
						<td><?php 
                                if ($discount['Discount']['discount_amount'] !="" && $discount['Discount']['discount_amount'] != 0) {
                                    echo $currency_symbol.' ' .$discount['Discount']['discount_amount']; 
                                }
                            ?>
                        </td>

						<td><?php echo date('d M Y',strtotime($discount['Discount']['discount_end_date'])); ?></td>
                        <!-- h:i a -->
						<td><?php echo h($discount['Discount']['active']); ?></td>
                        <td>
                            <?php 
                                $now = new DateTime("now");
                                $end_date = new DateTime($discount['Discount']['discount_end_date']);
                                if ($now > $end_date) {
                                    echo "<span class='label label-danger'>Expired</span>";
                                }
                                elseif ($now == $end_date) {
                                    echo "last day";
                                }else{
                                    $interval = $now->diff($end_date);
                                    echo $interval->format('%a days');
                                }
                            ?>
                        </td>
						<td class="actions">
							<?php echo $this->Html->link(__('View'), array('action' => 'view', $discount['Discount']['id']), array('class'=>'btn btn-xs btn-white')); ?>
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $discount['Discount']['id']), array('class'=>'btn btn-xs btn-white')); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $discount['Discount']['id']), array('class'=>'btn btn-xs btn-white'), array(), __('Are you sure you want to delete # %s?', $discount['Discount']['id'])); ?>
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