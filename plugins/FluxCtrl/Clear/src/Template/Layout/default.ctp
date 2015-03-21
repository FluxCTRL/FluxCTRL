<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['reset', 'clear']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>

<body>

    <header class="u-clearfix">
        <?php
        echo $this->Html->tag(
            'h1',
            $this->Html->link($this->fetch('title'), ['_name' => 'home']),
            ['class' => 'u-pull-left']
        );
        echo $this->fetch(
            'navigation',
            $this->Html->tag('nav', $this->element('navigation'), ['class' => 'u-pull-right'])
        );
        ?>
    </header>

    <main>
        <header class="u-clearfix"><small>
            <?php
            echo $this->fetch('breadcrumbs', $this->Html->tag(
                'nav',
                $this->Html->getCrumbs(' > ', __d('flux_ctrl', "Home"), false)
            ));
            echo $this->Html->tag('hr');
            echo $this->fetch('subnavigation', $this->Html->tag(
                'nav',
                $this->element('subnavigation'),
                ['class' => 'u-pull-right']
            ));
            ?>
        </small></header>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>

    <footer class="u-clearfix">
        <?php
        echo $this->fetch(
            'footer',
            $this->Html->tag('small', __d(
                'flux_ctrl',
                "Powered by {0}",
                $this->Html->link('FluxCTRL', 'http://fluxctrl.io')
            ), ['class' => 'u-pull-right'])
        );
        ?>
    </footer>

    <?= $this->fetch('script') ?>

</body>

</html>
