<div class="sectionsBooks view">
<h2><?php echo __('Sections Book'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sectionsBook['SectionsBook']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Section'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sectionsBook['Section']['name'], array('controller' => 'sections', 'action' => 'view', $sectionsBook['Section']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Book'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sectionsBook['Book']['id'], array('controller' => 'books', 'action' => 'view', $sectionsBook['Book']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sections Book'), array('action' => 'edit', $sectionsBook['SectionsBook']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sections Book'), array('action' => 'delete', $sectionsBook['SectionsBook']['id']), null, __('Are you sure you want to delete # %s?', $sectionsBook['SectionsBook']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sections Books'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sections Book'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sections'), array('controller' => 'sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Section'), array('controller' => 'sections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Books'), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add')); ?> </li>
	</ul>
</div>
