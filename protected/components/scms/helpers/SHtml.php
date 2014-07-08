<?php

class SHtml
{
    
    static public function getAdminButtons($val)
    {
        switch(trim($val))
        {
            case 'up':
            ?>
                <button type="submit" class="moveUp btn btn-primary">
                  <i class="icon-chevron-up icon-white"></i>
                </button>
            <?
            break;

            case 'down':
            ?>
                <button type="submit" class="moveDown btn btn-primary">
                  <i class="icon-chevron-down icon-white"></i>
                </button>
            <?
            break;

            case 'del':
            ?>
                <button type="submit" class="deleteChecked btn btn-danger">
                  <i class="icon-trash icon-white"></i>
                </button>
            <?
            break;
        }
    }
    
    static public function button($button)
    {
        if(strpos($button, ',') > 0)
        {
            $res = explode(',', $button);
            foreach($res as $val)
            {
                self::getAdminButtons($val);
            }
        }
        else
        {
            self::getAdminButtons($button);
        }
    }
    
    static public function searchText()
    {
    ?>
        <p>
        You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
        or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
        </p>
    <?
    }

    static public function imageAdmin($form, $model, $field, $delImage = 'delImage')
    {
	echo '<div class="row">';
		echo $form->labelEx($model,$field);
		echo $form->fileField($model,$field);
		echo $form->error($model,$field);
	echo '</div>';
	
	if(!empty($model->$field) && file_exists($_SERVER['DOCUMENT_ROOT'].Yii::app()->urlManager->baseUrl.'/'.$model->$field))
        {
		echo '<div class="row">';
			echo (!empty($model->$field))?'<a href="'.Yii::app()->request->getBaseUrl(true)."/".$model->$field.'" target="_blank">'.CHtml::image(Yii::app()->request->getBaseUrl(true)."/".$model->$field,"",array("style"=>"height:100px;")).'</a>':"Нет Изображения";
		echo '</div>';
		echo '<div class="row">';
			echo $model->$field;
		echo '</div>';
		echo '<div class="row">';
			echo $form->labelEx($model,$delImage);
			echo $form->checkBox($model,$delImage);
			echo $form->error($model,$delImage);
		echo '</div>';
        }
        else
        {
        
        }
    }

	
	static public function adminButton($model)
	{
		echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class'=>'btn btn-primary'));
	}
	
	
	static public function adminButtonBack($alias)
	{
		?>
		<a href="<?=Yii::app()->controller->_redirectUrl?>" class="btn btn-primary">Назад</a>
		<?
		
	}
	
	
	static public function textarea($form, $model, $field, $maxlength = 200, $rows = 7, $cols = 60, $class = 'field span5')
	{
	    echo '<div class="row">';
	    echo $form->labelEx($model,$field);
	    echo $form->textArea($model,$field, array('rows'=>$rows,'maxlength'=>$maxlength, 'cols'=>$cols, 'class' => $class));
	    echo $form->error($model,$field);
	    echo '</div>';
	}
	
	
	static public function checkbox($form, $model, $field)
	{
	    echo '<div class="row">';
	    echo $form->labelEx($model,$field);
	    echo $form->checkBox($model,$field);
	    echo $form->error($model,$field);
	    echo '</div>';
	}
	
	
	static public function textfield($form, $model, $field, $maxlength = 127, $size = 3, $class = 'field span5')
	{
	    echo '<div class="row">';
	    echo $form->labelEx($model,$field);
	    echo $form->textField($model,$field,array('size'=>$size,'maxlength'=>$maxlength, 'class' => $class));
	    echo $form->error($model,$field);
	    echo '</div>';
	}
	
	static public function passwordfield($form, $model, $field, $maxlength = 127, $size = 3, $class = 'field span5')
	{
	    echo '<div class="row">';
	    echo $form->labelEx($model,$field);
	    echo $form->passwordField($model,$field,array('size'=>$size,'maxlength'=>$maxlength, 'class' => $class));
	    echo $form->error($model,$field);
	    echo '</div>';
	}
	
	
	static public function requiredText()
	{
	    echo '<p class="note">Поля обозначенные <span class="required">*</span> являются обязательными для заполнения.</p>';
	}
	
}