<?= $this->Form->create($feed); ?>
<fieldset>
    <legend><?= __('Add Feed') ?></legend>
    <?php
    echo $this->Form->input('url');
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
