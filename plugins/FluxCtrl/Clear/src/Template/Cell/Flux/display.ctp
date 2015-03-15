<section>
    <?php foreach ($items as $item) : ?>
    <article>
        <header>
            <strong><?= $item->title ?></strong>
        </header>
        <summary>
            <p>
                <?php
                echo $this->Text->truncate(strip_tags($item->content), 300, [
                    'ellipsis' => ' [...]',
                    'exact' => false,
                    'html' => true,
                ]);
                ?>
            </p>
        </summary>
        <footer>
            <nav>
                <ul>
                    <li>
                        <?= $item->feed->title ?>
                    </li>
                    <li>
                        <?php
                        echo $this->Time->timeAgoInWords($item->published, [
                            'accuracy' => [
                                'year' => 'month',
                                'month' => 'month',
                            ],
                            'end' => '+2 years',
                        ]);
                        ?>
                    </li>
                    <li>
                        <?= $this->Html->link(__d('flux_ctrl', "Original link"), $item->url) ?>
                    </li>
                    <li>
                        <?php
                        echo $this->Form->postLink(__d('flux_ctrl', "Delete"), [
                            'plugin' => null,
                            'controller' => 'Items',
                            'action' => 'delete',
                            $item->id]
                        );
                        ?>
                    </li>
                </ul>
            </nav>
        </footer>
    </article>
    <?php endforeach ?>
</section>
