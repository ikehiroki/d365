<div class="books index">
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('picture_id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo __('section'); ?></th>
            <th><?php echo __('position'); ?></th>
            <th><?php echo $this->Paginator->sort('email'); ?></th>
            <th><?php echo $this->Paginator->sort('phone'); ?></th>
            <th><?php echo $this->Paginator->sort('location_id'); ?></th>
            <?php if ($authUser): ?>
                <th class="actions"><?php echo __('Actions'); ?></th>
            <?php endif; ?>
        </tr>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?php echo $this->upload->uploadImage($book, 'Picture.image', array('style' => 'thumb')); ?>&nbsp;</td>
                <td><?php echo h($book['Book']['name']); ?>&nbsp;<br>
                    <?php echo h($book['Book']['kana_name']); ?>&nbsp;</td>
                <td>
                    <?php foreach ($book['Section'] as $section): ?>
                        <?php echo $section['name']; ?>&nbsp;<br>
                    <?php endforeach; ?>
                </td>
                <td>
                    <?php foreach ($book['Position'] as $position): ?>
                        <?php echo $position['name']; ?>&nbsp;<br>
                    <?php endforeach; ?>
                </td>
                <td><?php echo h($book['Book']['email']); ?>&nbsp;</td>
                <td><?php echo h($book['Book']['phone']); ?>&nbsp;</td>
                <td><?php echo h($book['Location']['name']); ?>&nbsp;</td>
                <?php if ($authUser): ?>

                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $book['Book']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $book['Book']['id'])); ?>
                        <?php echo $this->Html->link(__('Photo'), array('controller' => 'pictures', 'action' => 'add', $book['Book']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $book['Book']['id']), null, __('Are you sure you want to delete # %s?', $book['Book']['id'])); ?>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>
    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<?php if ($authUser): ?>
    <div class="actions">
        <h3><?php echo __('Actions'); ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('New Book'), array('action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Positions'), array('controller' => 'positions', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Position'), array('controller' => 'positions', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Sections'), array('controller' => 'sections', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Section'), array('controller' => 'sections', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
        </ul>
    </div>
<?php else: ?>
    <div class="actions">
        <?php echo $this->Form->create('Book', array('action' => 'index')); ?>  
        <?php echo $this->Form->input('Book.Section', array('empty' => true)); ?>
        <?php echo $this->Form->input('Location', array('empty' => true)); ?>
        <?php echo $this->Form->input('name', array('label' => 'Search', 'empty' => true)); ?>
        <?php echo $this->Form->submit(__('Search')); ?>
        <?php echo $this->Form->end(); ?>
    </div>
<?php endif; ?>
