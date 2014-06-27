<?php

/**
 * This is the model class for table "{{slider}}".
 *
 * The followings are the available columns in table '{{slider}}':
 * @property integer $id
 * @property string $src
 * @property string $title
 * @property string $text
 * @property string $isActive
 * @property integer $position
 */
class Photo extends CActiveRecord
{
	
	public 
			$sliderHeight = 200,
//			$delImage,
			$icon;
	
//	public $onPage = 12;
	public $limit = 4;

	
    public function behaviors(){
        return array(
            'resourceBehavior' => array(
                'class' => 'ResourceBehavior',
		'delFiles' => array('src', 'thumb'),
            ),
            'paginationBehavior' => array(
                'class' => 'PaginationBehavior',
            ),
        );
    }
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Slider the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{photo}}';
	}

	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, catId', 'required'),
			array('src', 'file', 'types'=>'jpg, gif, png', 'on' => 'insert'),
//			array('delImage', 'boolean'),
			array('src', 'length', 'max'=>255),
			array('title', 'length', 'max'=>127),
			array('text', 'length', 'max'=>255),
//			array('isActive', 'length', 'max'=>1),
			array('isActive', 'numerical', 'integerOnly'=>true),
			array('catId', 'numerical', 'integerOnly'=>true),
//			array('src','allowEmpty' => true, 'on' => 'update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, src, title, catId, text, isActive', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'category'=>array(self::BELONGS_TO, 'Category', 'catId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'src' => 'Изображение',
			'title' => 'Название',
			'catId' => 'Категория',
			'text' => 'Текст',
//			'delImage'=>'Удалить картинку?',
			'isActive' => 'Активно',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('src',$this->src,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('catId',$this->catId,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('isActive',$this->isActive,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}