<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Hola <?= $user->Usuario ?>,

Sigue el enlace de abajo para restablecer tu contraseña:

<?= $resetLink ?>
