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
class Comments extends CActiveRecord
{

	static public $owners = array(
		'Новости' => 'News',
		'Статьи' => 'Articles',
	);
	
	
    public function behaviors()
	{
        return array(
            'ownerBehavior' => array(
                'class' => 'OwnerBehavior',
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
		return '{{comments}}';
	}

	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user', 'length', 'max'=>127),
			array('ownerClass', 'length', 'max'=>63),
			array('text', 'length', 'max'=>500),
			array('isActive', 'length', 'max'=>1),
//			array('src','allowEmpty' => true, 'on' => 'update'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user, text, isActive', 'safe', 'on'=>'search'),
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
			'ownerClass' => 'Владелец',
			'user' => 'Пользователь',
			'text' => 'Текст',
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
		$criteria->compare('ownerClass',$this->ownerClass);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('isActive',$this->isActive,true);
		
//		$criteria->order = $this->_order;
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}