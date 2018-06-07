<div class="brandmasters view">
<h2><?php echo __('Brandmaster'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($brandmaster['Brandmaster']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($brandmaster['Brandmaster']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Details'); ?></dt>
		<dd>
			<?php echo h($brandmaster['Brandmaster']['details']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Date'); ?></dt>
		<dd>
			<?php echo h($brandmaster['Brandmaster']['created_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Brandmaster'), array('action' => 'edit', $brandmaster['Brandmaster']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Brandmaster'), array('action' => 'delete', $brandmaster['Brandmaster']['id']), array(), __('Are you sure you want to delete # %s?', $brandmaster['Brandmaster']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Brandmasters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brandmaster'), array('action' => 'add')); ?> </li>
	</ul>
</div>
