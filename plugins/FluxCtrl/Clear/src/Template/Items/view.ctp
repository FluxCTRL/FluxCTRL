<?php
$this->Html->addCrumb($item->feed->title, ['_name' => 'feed', 'id' => $item->feed_id]);
$this->Html->addCrumb($item->title);
?>

<article>
    <header><?= h($item->title) ?></header>
    <main>
        <p><?= $item->content ?></p>
    </main>
    <footer class="u-clearfix">
        <?php
        if (!empty($links['previous'])) {
            echo $this->Html->link(__d('flux_ctrl', "Previous"), $links['previous'], ['class' => 'u-pull-left']);
        }
        if (!empty($links['next'])) {
            echo $this->Html->link(__d('flux_ctrl', "Next"), $links['next'], ['class' => 'u-pull-right']);
        }
        ?>
    </footer>
</article>
