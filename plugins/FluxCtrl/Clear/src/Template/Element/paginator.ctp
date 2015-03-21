<hr>
<small>
    <nav class="u-clearfix">
        <?= $this->Paginator->counter() ?>
        <ul class="u-pull-right">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
    </nav>
</small>
