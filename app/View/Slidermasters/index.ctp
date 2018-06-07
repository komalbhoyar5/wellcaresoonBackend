<?php  echo $this->Html->css('../admin/css/plugins/dataTables/datatables.min.css'); ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Brand master</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo $this->webroot; ?>dashboard">Home</a>
            </li>
            <li class="active">
                <strong>Slider master</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
        <div class="row add_btn">
            <a class="btn btn-info btn-circle btn-lg right-flt btn-outline" href="<?php echo $this->webroot; ?>Slidermasters/add">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-5">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Slider detail list</h5>
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
                    <p>
                        Drag and drop below table cell to arrange slider image sequence.
                    </p>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Slider no</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody  id="sortable">
						<?php foreach ($slidermasters as $slidermaster): ?>
                            <tr class="ui-state-default">
								<td><?php echo h($slidermaster['Slidermaster']['slider_no']); ?></td>
								<td width="50%"><img src="<?php echo $this->webroot . $slidermaster['Slidermaster']['image']; ?>" class="img-responsive"></td>
								<td class="actions">
									<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $slidermaster['Slidermaster']['id'])); ?>
									<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $slidermaster['Slidermaster']['id']), array(), __('Are you sure you want to delete # %s?', $slidermaster['Slidermaster']['id'])); ?>
								</td>
                            </tr>
						<?php endforeach; ?>

                        </tbody>
                    </table>
                    <button type="button" class="btn btn-primary btn-xs">Update sorted list</button>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Home slider demo</h5>
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
                <div class="ibox-content ">
                    <div class="carousel slide" id="carousel2">
                        <ol class="carousel-indicators">
                        	<?php 
                        		$i = 0;
                        		foreach ($slidermasters as $slidermaster): ?>
                            	<li data-slide-to="<?php echo $i; ?>" data-target="#carousel2" class="<?php if ($i == 0) echo 'active'; ?>"></li>
							<?php $i++;  endforeach; ?>
                        </ol>
                        <div class="carousel-inner">
                        	<?php 
                                $j=0;
                                foreach ($slidermasters as $slidermaster): ?>
	                            <div class="item <?php if ($j == 0) echo 'active'; ?>" style="background-image:url('<?php echo $this->webroot . $slidermaster['Slidermaster']['image']; ?>');">
                                <?php
                                    if ($slidermaster['Slidermaster']['link'] !="") {
                                ?>
                                    <a href="<?php echo $slidermaster['Slidermaster']['link']; ?>" target="_blank">
                                        <div class="sliderlink">
                                            
                                        </div>
                                    </a>
                                <?php       
                                    }
                                ?>
	                            </div>
							<?php $j++; endforeach; ?>
                        </div>
                        <a data-slide="prev" href="#carousel2" class="left carousel-control">
                            <span class="icon-prev"></span>
                        </a>
                        <a data-slide="next" href="#carousel2" class="right carousel-control">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->element('backend_footer'); ?>

  <script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>