<section>
    <?php foreach ($feeds as $feed) : ?>
    <article>
        <header><?= h($feed->title) ?></header>
        <summary>
            <p><?= h($feed->description) ?></p>
        </summary>
        <footer>
            <nav>
                <ul>
                    <li>
                        <?php
                        echo $this->Html->link(
                            __d('flux_ctrl', "Edit"),
                            ['action' => 'edit', $feed->id]
                        );
                        ?>
                    </li>
                    <li>
                        <?php
                        echo $this->Form->postLink(
                            __d('flux_ctrl', "Unsubscribe"),
                            ['_name' => 'unsubscribe', $feed->id],
                            ['confirm' => __('flux_ctrl', "Unsubscribe from {0}", $feed->title)]
                        );
                        ?>
                    </li>
                </ul>
            </nav>
        </footer>
    </article>
    <?php endforeach; ?>
</section>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
