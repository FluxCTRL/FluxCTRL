<?php $this->Html->addCrumb(__d('flux_ctrl', "Subscriptions")) ?>

<section>
    <?php foreach ($feeds as $feed) : ?>
    <article>
        <header><?= h($feed->title) ?></header>
        <summary>
            <p><?= h($feed->description) ?></p>
        </summary>
        <footer class="u-clearfix"><small>
            <?php
            echo $this->Html->tag('span', __d(
                'flux_ctrl',
                "Last checked on {0}",
                $feed->checked->format('Y-m-d')
            ), ['class' => 'u-text-maroon']);
            ?>
            <nav class="u-pull-right">
                <ul>
                    <li>
                        <?php
                        echo $this->Html->link(
                            __d('flux_ctrl', "Edit"),
                            ['action' => 'edit', 'id' => $feed->id]
                        );
                        ?>
                    </li>
                    <li>
                        <?php
                        echo $this->Form->postLink(
                            __d('flux_ctrl', "Unsubscribe"),
                            ['_name' => 'unsubscribe', 'id' => $feed->id],
                            ['confirm' => __('flux_ctrl', "Unsubscribe from {0}", $feed->title)]
                        );
                        ?>
                    </li>
                </ul>
            </nav>
        </small></footer>
    </article>
    <?php endforeach; ?>
</section>

<?= $this->element('paginator') ?>

