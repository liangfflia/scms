<?php
/* @var $this SliderController */
/* @var $model Slider */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'slider-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<?SHtml::requiredText()?>

	<?=$form->errorSummary($model)?>

        <?SHtml::imageAdmin($form, $model, 'src')?>

	<?SHtml::textfield($form, $model, 'title',127)?>
	
	<div class="row">
	    <?php echo $form->labelEx($model,'catId'); ?>
	    <?php echo $form->dropDownList($model,'catId', Category::getList('Photo')); ?>
	    <?php echo $form->error($model,'catId'); ?>
	</div>
    
<!--	<div class="row">
	    <label>Category</label>
	    <?//=CHtml::dropDownList('a', '', Category::getList('Photo'))?>
	</div>-->
    
	<?SHtml::textarea($form, $model, 'text',200)?>
	
	<?SHtml::checkbox($form, $model, 'isActive')?>
	
	<div class="row buttons">
		<?SHtml::adminButton($model)?>
		<?SHtml::adminButtonBack($this->modelAlias)?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->