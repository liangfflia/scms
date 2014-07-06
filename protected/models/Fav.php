<?php

/**
 * This is the model class for table "{{slider}}".
 *
 * The followings are the available columns in table '{{slider}}':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $isActive
 */
class Fav extends BaseModel
{
	
	protected $_order = 'position';

	
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
		return '{{fav}}';
	}

	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'length', 'max'=>127),
			array('stdField', 'length', 'max'=>63),
			array('alias', 'length', 'max'=>127),
			array('position, isActive', 'numerical', 'integerOnly'=>true),
			array('isActive', 'length', 'max'=>1),
			
			array('id, title, alias, position, isActive', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Название',
			'alias' => 'Url',
			'isActive' => 'Активно',
			'position' => 'Позиция',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('stdField',$this->stdField,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('isActive',$this->isActive,true);
		$criteria->compare('position',$this->position,true);
		
		$criteria->order = $this->_order;
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	

}