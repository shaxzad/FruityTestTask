<?php
/**
 * @var yii\web\View $this
 * @var string $content
 */

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
<header>
    <?php NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => ['navbar-dark', 'bg-dark', 'navbar-expand-md'],
        ],
    ]); ?>
    <?php echo Nav::widget([
        'options' => ['class' => ['navbar-nav', 'justify-content-end', 'ml-auto']],
        'items' => [
            ['label' => Yii::t('frontend', 'Home'), 'url' => ['/site/index']],
            ['label' => Yii::t('frontend', 'Fruits'), 'url' => ['/fruit']],
            ['label' => Yii::t('frontend', 'Favorites'), 'url' => ['/fruit/favoritelist']],
        ]
    ]); ?>
    <?php NavBar::end(); ?>
</header>

<main class="flex-shrink-0" role="main">
    <?php echo $content ?>
</main>

<footer class="footer mt-auto py-3">
    <div class="container">
        <div class="d-flex flex-row justify-content-between">
            <div>&copy; Fruity Test Task April <?php echo date('Y') ?></div>
            <div>&copy; https://github.com/shaxzad </div>
        </div>
    </div>
</footer>
<?php $this->endContent() ?>