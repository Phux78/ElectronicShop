<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="../../theme/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../theme/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../theme/css/nouislider.min.css">
    <link rel="stylesheet" href="../../theme/css/slick.css">
    <link rel="stylesheet" href="../../theme/css/style.css">
    <link rel="stylesheet" href="../../theme/css/custom.css">
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header class="header fixed">
        <!--Top Header-->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
                </ul>
            </div>
        </div>
        <!--End of Top Header-->
        <?php
        NavBar::begin([
            'brandLabel' => "<h1 class='custom-brand-label'>Electronic Shop</h1>",
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                // 'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top'
                'class' => 'navbar navbar-expand-md navbar-dark',
            ]
        ]);
        ?>
        <?php
        // php header replace here
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            // ['label' => 'About', 'url' => ['/site/about']],
            // ['label' => 'Contact', 'url' => ['/site/contact']],
        ];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $menuItems[] = ['label' => 'Cart', 'url' => ['/cart/index']];
            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
        }
        ?>
        <?php
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ml-auto'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            <p class="float-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

<!--Script-->
<script src="../../theme/js/bootstrap.min.js"></script>
<script src="../../theme/js/jquery.min.js"></script>
<script src="../../theme/js/jquery.zoom.min.js"></script>
<script src="../../theme/js/main.js"></script>
<script src="../../theme/js/nouislider.min.js"></script>
<script src="../../theme/js/slick.min.js"></script>


</html>
<?php $this->endPage();
