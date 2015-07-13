<?php

use app\assets\AppAsset;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $content string
 * @var $this \yii\web\View
 * @var $page_header string
 */

AppAsset::register($this);
$this->beginPage();
?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" >

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?php $this->registerMetaTag(['name'=>'viewport', 'content'=>'width=device-width,initial-scale=1']); ?>
    <title><?= Yii::$app->name ?></title>
    <?php $this->head(); ?>
</head>

<body>
<?php $this->beginBody(); ?>

<div class="wrap">

    <?php
    $page_header = (empty($_GET['repo']) ? ucwords(Yii::$app->controller->action->id) : ucwords($_GET['repo']));
    NavBar::begin(
        [
            'brandLabel' => 'MobiDev GitHub Browser >> '. $page_header
        ]
    );
    ActiveForm::begin(
        [
            'action'=>['/git/search'],   //['/git/search'],
            'method'=>'get',
            'options'=>['class'=>'navbar-form navbar-right']
        ]
    );
    echo '<div class="init-group init-group-sm">';
    echo Html::input(
        'type:text',
        'search',
        '',
        [
            'placeholder'=>'Search...',
            'class'=>'form-control'
        ]
    );
    echo '<span class="init-group-btn">';
    echo Html::submitButton(
        '<span class="glyphicon glyphicon-search"></span>',

        [
            'class'=>'btn btn-success',
            //'onClick' => 'window.location.href = this.form.action."-".this.form.search.value.replace(/[^\w\а-яё\А-ЯЁ]+/g, "_").".html" '
        ]
    );
    echo '</span></div>';
    ActiveForm::end();
    NavBar::end();
    ?>

    <div class="container">
            <?= $content ?>
    </div>
</div>


<div class="footer">
    <div class="container">
        <span class="badge">
            <span class="glyphicon glyphicon-copyright-mark"></span> alenka_programmer for ModiDev, <?=date('Y')?>
        </span>
    </div>
</div>

<?php $this->endBody(); ?>

</body>
</html>

<?php $this->endPage(); ?>