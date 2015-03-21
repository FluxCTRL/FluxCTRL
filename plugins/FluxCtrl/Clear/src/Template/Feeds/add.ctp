<?php
$this->Html->addCrumb(__d('flux_ctrl', "Subscriptions"), ['action' => 'index']);
$this->Html->addCrumb(__d('flux_ctrl', "New Subscription"));
?>

<?= $this->Form->create($feed); ?>
<fieldset>
    <?php
    echo $this->Form->input('url', [
        'label' => false,
        'placeholder' => 'http://reddit.com/r/php',
        'class' => 'u-width-half',
    ]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
