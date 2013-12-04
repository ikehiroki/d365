<div class="positionsBooks form">
<?php echo $this->Form->create('PositionsBook'); ?>
	<fieldset>
		<legend><?php echo __('Edit Positions Book'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('position_id');
		echo $this->Form->input('book_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PositionsBook.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PositionsBook.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Positions Books'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Positions'), array('controller' => 'positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Position'), array('controller' => 'positions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Books'), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add')); ?> </li>
	</ul>
</div>
