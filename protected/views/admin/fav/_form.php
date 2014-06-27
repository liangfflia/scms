<?php
/* @var $this MenuController */
/* @var $model Menu */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fav-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?SHtml::requiredText()?>

	<?php echo $form->errorSummary($model); ?>

	<?SHtml::textfield($form, $model, 'title', 127)?>
	
	<?SHtml::textfield($form, $model, 'stdField', 63)?>
	
	<?SHtml::textfield($form, $model, 'alias', 127)?>
		
	<?SHtml::checkbox($form, $model, 'isActive')?>
	
	<div class="row buttons">
		<?SHtml::adminButton($model)?>
		<?SHtml::adminButtonBack($this->modelAlias)?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->