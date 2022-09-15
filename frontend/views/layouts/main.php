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
    <?php $this->head() ?>
    <!--CSS-->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../theme/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="../../theme/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="../../theme/css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="../../theme/css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="../../theme/css/flaticon.css">
    <link rel="stylesheet" href="../../theme/css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="../../theme/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="../../theme/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="../../theme/css/style.css">
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
        NavBar::begin([
            'brandLabel' => "<h1 class='custom-brand-label'>Electronic Shop</h1>",
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                // 'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top'
                'class' => 'navbar navbar-expand-lg navbar-light bg-light',
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
                    // 'Logout (' . Yii::$app->user->identity->username . ')',
                    'Logout ',
                    ['class' => 'btn btn-warning']
                )
                . Html::endForm()
                . '</li>';
        }
        ?>
        <?php
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ml-auto '],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
    </header>

    <main role="main" class="flex-shrink-0">
        <!-- container -->
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <!-- /container -->
        <?= $content ?>
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
<!-- jquery plugins here-->
<script src="../../theme/js/jquery-1.12.1.min.js"></script>
<!-- popper js -->
<script src="../../theme/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="../../theme/js/bootstrap.min.js"></script>
<!-- easing js -->
<script src="../../theme/js/jquery.magnific-popup.js"></script>
<!-- swiper js -->
<script src="../../theme/js/swiper.min.js"></script>
<!-- swiper js -->
<script src="../../theme/js/masonry.pkgd.js"></script>
<!-- particles js -->
<script src="../../theme/js/owl.carousel.min.js"></script>
<script src="../../theme/js/jquery.nice-select.min.js"></script>
<!-- slick js -->
<script src="../../theme/js/slick.min.js"></script>
<script src="../../theme/js/jquery.counterup.min.js"></script>
<script src="../../theme/js/waypoints.min.js"></script>
<script src="../../theme/js/contact.js"></script>
<script src="../../theme/js/jquery.ajaxchimp.min.js"></script>
<script src="../../theme/js/jquery.form.js"></script>
<script src="../../theme/js/jquery.validate.min.js"></script>
<script src="../../theme/js/mail-script.js"></script>
<!-- custom js -->
<script src="../../theme/js/custom.js"></script>


</html>
<?php $this->endPage(); ?>