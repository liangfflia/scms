<?php
/* @var $this MenuController */
/* @var $model Menu */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'resource-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<?SHtml::requiredText()?>

	<?php echo $form->errorSummary($model); ?>

	<?SHtml::textfield($form, $model, 'title', 127)?>

	<?SHtml::imageAdmin($form, $model, 'source')?>
	
	<?SHtml::checkbox($form, $model, 'isActive')?>
	
	<div class="row buttons">
		<?SHtml::adminButton($model)?>
		<?SHtml::adminButtonBack($this->modelAlias)?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->