<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Board $board
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $board->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $board->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Boards'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="boards form large-9 medium-8 columns content">
    <?= $this->Form->create($board) ?>
    <fieldset>
        <legend><?= __('Edit Board') ?></legend>
        <?php
            echo $this->Form->control('person_id', ['options' => $people, 'empty' => true]);
            echo $this->Form->control('title');
            echo $this->Form->control('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
