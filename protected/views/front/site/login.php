<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="container" style="margin-bottom: 30px;">
	<div class="row-fluid">
		<div class="log-page">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableAjaxValidation'=>true,
			)); ?>

				<div class="">
					<?php echo $form->labelEx($model,'username'); ?>
					<?php echo $form->textField($model,'username'); ?>
					<?php echo $form->error($model,'username'); ?>
				</div>

				<div class="">
					<?php echo $form->labelEx($model,'password'); ?>
					<?php echo $form->passwordField($model,'password'); ?>
					<?php echo $form->error($model,'password'); ?>
					<p class="hint">
						Hint: You may login with <tt>demo/demo</tt>.
					</p>
				</div>

				<div class="rememberMe">
					<?php echo $form->checkBox($model,'rememberMe'); ?>
					<?php echo $form->label($model,'rememberMe'); ?>
					<?php echo $form->error($model,'rememberMe'); ?>
				</div>

				<div class="submit">
					<?//php echo CHtml::submitButton('Login'); ?>
					<button class="btn">Войти</button>
				</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>
