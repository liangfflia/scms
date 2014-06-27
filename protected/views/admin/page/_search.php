<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
)); ?>

        <div class="row">
                <?php echo $form->label($model,'id'); ?>
                <?php echo $form->textField($model,'id'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'title'); ?>
                <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'alias'); ?>
                <?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>127)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'dateAdded'); ?>
                <?php echo $form->textField($model,'dateAdded'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'dateUpdated'); ?>
                <?php echo $form->textField($model,'dateUpdated'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'metaDesc'); ?>
                <?php echo $form->textField($model,'metaDesc',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'ownerId'); ?>
                <?php echo $form->textField($model,'ownerId'); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'ownerClass'); ?>
                <?php echo $form->textField($model,'ownerClass',array('size'=>60,'maxlength'=>63)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'annotation'); ?>
                <?php echo $form->textField($model,'annotation',array('size'=>60,'maxlength'=>255)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'text'); ?>
                <?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model,'isActive'); ?>
                <?php echo $form->checkBox($model,'isActive'); ?>
        </div>

        <div class="row buttons">
                <?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
