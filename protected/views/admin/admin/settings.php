<? if($model != null): ?>
    <? foreach(Yii::app()->user->getFlashes() as $key => $message): ?>
        <div style="width: 300px;" class="flash-<?=$key?>"><?=$message?></div>
    <? endforeach; ?>
<div class="form">
	<?php echo CHtml::beginForm(); ?>
	<p class="note">Поля обозначенные <span class="required">*</span> являются обязательными.</p>
	<table>
	<tr><th>Название</th><th>Значение</th></tr>
	<? foreach($model as $i=>$item): ?>
		<tr>
			<td style="width: 150px;"><?=$item->title;?></td>
			<td><?php echo CHtml::activeTextField($item,"[$i]value", array('style'=>'height: 30px;')); ?></td>
		</tr>
	<? endforeach; ?>
	</table>
	
	<?php echo CHtml::submitButton('Сохранить'); ?>
	<?php echo CHtml::endForm(); ?>
	
</div><!-- form -->
<? else: ?>
	Настроек не найдено.
<? endif; ?>