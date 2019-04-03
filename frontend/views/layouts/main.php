<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;



AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() 
?>

<div class="wrap">
    <?php
    NavBar::begin([
        //'brandLabel' => '<img src="logo.png" class="test"/> ',
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);


    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Registrarse', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Ingresar', 'url' => ['/site/login']];
    } else {
        $Usuario = Yii::$app->user->identity->Usuario;

        $query = (new \yii\db\Query())
            ->select('Rol')
            ->from('user')
            ->where(['Usuario' => $Usuario])
            ->all();

        foreach ($query as $key => $value) {
        
        

        if($value['Rol']==1){
        $menuItems[] = ['label' => 'home', 'url' => ['/site/index']];
        $menuItems[] = ['label' => 'Generar Ticket', 'url' => ['/tickets/create']];
        $menuItems[] = ['label' => 'Reportes', 'url' => ['/tickets/reportes']];
        

        $menuItems[] ='<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->Usuario . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';

        }

        else 
        {
            $menuItems[] = ['label' => 'home', 'url' => ['/site/index']];
            $menuItems[] = ['label' => 'Generar Ticket', 'url' => ['/tickets/create']];
            $menuItems[] ='<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->Usuario . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
        }

        }
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
