<section class="feed">
    <?php foreach ($items as $item) : ?>
    <article>
        <?= $this->Html->tag('h3', $item->title) ?>
        <summary>
            <?php
            echo $this->Text->truncate(strip_tags($item->content), 300, [
                'ellipsis' => ' [...]',
                'exact' => false,
                'html' => true,
            ]);
            ?>
        </summary>
        <footer class="u-clearfix"><small>
            <?php
            echo $this->Html->div(
                'u-pull-left',
                __d('flux_ctrl', "On {0}, {1}", [
                    $item->feed->title,
                    $this->Time->timeAgoInWords($item->published, [
                        'accuracy' => ['year' => 'month', 'month' => 'month'],
                        'end' => '+2 years'
                    ])
                ])
            );
            ?>
            <nav class="u-pull-right">
                <ul>
                    <li>
                        <?= $this->Html->link(__d('flux_ctrl', "Original link"), $item->url) ?>
                    </li>
                    <li>
                        <?php
                        echo $this->Form->postLink(__d('flux_ctrl', "Delete"), [
                            'plugin' => null,
                            'controller' => 'Items',
                            'action' => 'delete',
                            'id' => $item->id
                        ]);
                        ?>
                    </li>
                </ul>
            </nav>
        </small></footer>
    </article>
    <?php endforeach ?>
</section>
