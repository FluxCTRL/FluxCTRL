<?php
$this->Html->addCrumb($item->feed->title, ['_name' => 'feed', 'id' => $item->feed_id]);
$this->Html->addCrumb($item->title);
?>

<article>
    <header><?= h($item->title) ?></header>
    <main>
        <p><?= $item->content ?></p>
    </main>
    <footer>
    </footer>
</article>
