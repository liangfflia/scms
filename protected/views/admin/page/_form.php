<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	'enableAjaxValidation'=>false,
)); ?>

<?SHtml::requiredText()?>

<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'placeholder'=>'Название страницы')); ?>
<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>127, 'placeholder'=>'Url псевдоним страницы')); ?>
<?php echo $form->error($model,'alias'); ?>
	</div>

<?SHtml::textarea($form, $model, 'metaDesc', 200) ?>

<?SHtml::textarea($form, $model, 'annotation', 255) ?>

<b>Текст</b> <span class="required">*</span>
<?
$dir = is_null($model->id) ? Yii::app()->user->name : $model->id;
Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget');
$this->widget('ImperaviRedactorWidget', array(
    // The textarea selector
	 'model' => $model,
	 'attribute' => 'text',
    // Some options, see http://imperavi.com/redactor/docs/
    'options' => array(
        'lang' => 'ru',
        'autoresize' => 'true',
        'minHeight' => '300',
        'focus' => 'true',
//        'imageGetJson' => Yii::app()->baseUrl . '/images/news/' . $dir . '/images.json',
        'imageGetJson' => Yii::app()->baseUrl . '/images/news/333/images.json',
        // 'imageGetJson' => Yii::app()->baseUrl . '/images/news/' . Yii::app()->user->name . '/images.json',
        'imageUpload' => Yii::app()->baseUrl . '/upload',
        'placeholder' => 'Контент', 
        'paragraphy' => 'false',
        'imageUploadCallback' => "function(image, json) {alert('123');}",
    ),
));
?>

	<?SHtml::checkbox($form, $model, 'isActive') ?>

	<div class="row buttons">
		<?SHtml::adminButton($model)?>
		<?SHtml::adminButtonBack($this->modelAlias)?>
	</div>

<?php $this->endWidget(); ?>
</div>