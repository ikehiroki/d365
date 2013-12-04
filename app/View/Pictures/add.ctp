<div class="pictures form">
    <?php echo $this->Form->create('Picture', array('type' => 'file', 'url' => array('action' => 'add', $bookId))); ?>
    <fieldset>
        <legend><?php echo __('Add Picture'); ?></legend>
        <?php
        echo $this->Form->file('Picture.image');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Pictures'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Books'), array('controller' => 'books', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add')); ?> </li>
    </ul>
</div>
