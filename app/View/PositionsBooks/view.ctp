<div class="positionsBooks view">
<h2><?php echo __('Positions Book'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($positionsBook['PositionsBook']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo $this->Html->link($positionsBook['Position']['name'], array('controller' => 'positions', 'action' => 'view', $positionsBook['Position']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Book'); ?></dt>
		<dd>
			<?php echo $this->Html->link($positionsBook['Book']['id'], array('controller' => 'books', 'action' => 'view', $positionsBook['Book']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Positions Book'), array('action' => 'edit', $positionsBook['PositionsBook']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Positions Book'), array('action' => 'delete', $positionsBook['PositionsBook']['id']), null, __('Are you sure you want to delete # %s?', $positionsBook['PositionsBook']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Positions Books'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Positions Book'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Positions'), array('controller' => 'positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Position'), array('controller' => 'positions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Books'), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add')); ?> </li>
	</ul>
</div>
