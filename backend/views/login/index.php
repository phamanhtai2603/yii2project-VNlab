<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;  //De tao button 
?>
<?php 
    if (Yii::$app->session->hasFlash('LoginOK')) {
?>
<div class="alert alert-success">Login success! </div>
<?php 
   }
?>

<?php 
    if (Yii::$app->session->hasFlash('LoginFail')) {
?>
<div class="alert alert-danger">Login denied! </div>
<?php 
   }
?>



<?php $form = ActiveForm::begin()?>
<?= $form->field($model,'user_name')->textInput(['placeholder'=>'Go User Name!'])?>
<?= $form->field($model,'password')->passwordInput(['placeholder'=>'Go Password!'])?>
<?=Html::submitButton('Login',['class'=>'btn btn-primary'])?>
<?php $form = ActiveForm::end()?>
<?= $user_info['user_name']; ?>