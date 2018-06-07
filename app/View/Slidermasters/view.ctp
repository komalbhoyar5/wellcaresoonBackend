<div class="slidermasters view">
<h2><?php echo __('Slidermaster'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($slidermaster['Slidermaster']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slider No'); ?></dt>
		<dd>
			<?php echo h($slidermaster['Slidermaster']['slider_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($slidermaster['Slidermaster']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($slidermaster['Slidermaster']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Heading Text'); ?></dt>
		<dd>
			<?php echo h($slidermaster['Slidermaster']['heading_text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desc Text'); ?></dt>
		<dd>
			<?php echo h($slidermaster['Slidermaster']['desc_text']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Slidermaster'), array('action' => 'edit', $slidermaster['Slidermaster']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Slidermaster'), array('action' => 'delete', $slidermaster['Slidermaster']['id']), array(), __('Are you sure you want to delete # %s?', $slidermaster['Slidermaster']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Slidermasters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Slidermaster'), array('action' => 'add')); ?> </li>
	</ul>
</div>
