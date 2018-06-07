<div class="pincodemasters view">
<h2><?php echo __('Pincodemaster'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pincodemaster['Pincodemaster']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pin Code No'); ?></dt>
		<dd>
			<?php echo h($pincodemaster['Pincodemaster']['pin_code_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Minimum order value'); ?></dt>
		<dd>
			<?php echo h($pincodemaster['Pincodemaster']['delivery_on_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delivery period'); ?></dt>
		<dd>
			<?php echo h($pincodemaster['Pincodemaster']['delivery_period']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is COD Available'); ?></dt>
		<dd>
			<?php echo h($pincodemaster['Pincodemaster']['is_COD_available']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pincodemaster'), array('action' => 'edit', $pincodemaster['Pincodemaster']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pincodemaster'), array('action' => 'delete', $pincodemaster['Pincodemaster']['id']), array(), __('Are you sure you want to delete # %s?', $pincodemaster['Pincodemaster']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pincodemasters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pincodemaster'), array('action' => 'add')); ?> </li>
	</ul>
</div>
