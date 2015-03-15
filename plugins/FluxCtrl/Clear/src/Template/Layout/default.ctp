<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('reset') ?>
    <?= $this->Html->css('clear') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>

<body>

    <header>
        <div>
            <span><?= $this->fetch('title') ?></span>
        </div>
        <?= $this->fetch('navigation', sprintf('<nav>%s</nav>', $this->element('navigation'))) ?>
    </header>

    <main>
        <header>
            <?= $this->fetch('subtitle', sprintf('<h2>%s</h2>', $fc_subtitle)) ?>
            <?= $this->fetch('subnavigation', sprintf('<nav>%s</nav>', $this->element('subnavigation'))) ?>
        </header>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>

    <footer>
        <?php
        echo $this->fetch('footer', __d(
            'flux_ctrl',
            "Powered by {0}",
            $this->Html->link('FluxCtrl', 'http://fluxctrl.io')
        ));
        ?>
    </footer>

    <?= $this->fetch('script') ?>

</body>

</html>
