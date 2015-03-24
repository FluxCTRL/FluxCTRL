<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', 'id' => $feed->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $feed->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Feeds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="feeds form large-10 medium-9 columns">
    <?= $this->Form->create($feed); ?>
    <fieldset>
        <legend><?= __('Edit Feed') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('uri');
            echo $this->Form->input('website');
            echo $this->Form->input('is_active');
            echo $this->Form->input('checked');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
