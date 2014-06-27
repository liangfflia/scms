<?php
/* @var $this MenuController */
/* @var $model Menu */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<?SHtml::requiredText()?>

	<?php echo $form->errorSummary($model); ?>
    
	<?SHtml::textfield($form, $model, 'login', 63)?>
    
	<?SHtml::textfield($form, $model, 'email', 127)?>
    
	    <?SHtml::passwordfield($form, $model, 'pass', 127)?>
    
	<?SHtml::textfield($form, $model, 'firstName', 127)?>
	<?SHtml::textfield($form, $model, 'lastName', 127)?>
	<?SHtml::textfield($form, $model, 'middleName', 127)?>
    
	<?SHtml::textarea($form, $model, 'address', 255)?>
	<?SHtml::textfield($form, $model, 'zip', 11)?>

	
	<div class="row buttons">
		<?SHtml::adminButton($model)?>
		<?SHtml::adminButtonBack($this->modelAlias)?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->