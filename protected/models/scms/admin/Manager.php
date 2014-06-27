<?php

/**
 * This is the model class for table "{{manager}}".
 *
 * The followings are the available columns in table '{{manager}}':
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $isActive
 * @property integer $position
 */
class Manager extends CActiveRecord
{
	
	static public $menuGrouped = array();
	
	protected $_order = 'position';
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Manager the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	
    public function behaviors()
	{
        return array(
            'positionBehavior' => array(
                'class' => 'PositionBehavior',
            ),
        );
    }
	
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{manager}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, alias', 'required'),
			array('position', 'numerical', 'integerOnly'=>true),
			array('title, alias', 'length', 'max'=>127),
			array('group', 'length', 'max'=>31),
			array('isActive', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, alias, group, isActive, position', 'safe', 'on'=>'search'),
		);
	}

	static public function getMenuGrouped()
	{
		$adminMenu = self::model()->findAll(array('order'=>'position'));
		$menu = array();
		$existingGroups = array();
		foreach($adminMenu as $val)
		{
			if($val->group != null && !in_array($val->group, $existingGroups))
			{
				$i = 0;
				foreach($adminMenu as $val2)
				{
					if($val2->group == $val->group)
					{
						$menu[$val->group][$i]['alias'] = $val2->alias;
						$menu[$val->group][$i]['title'] = $val2->title;
					}
					$i++;
				}
				array_push($existingGroups, $val->group);
			}
		}
		return $menu;
	}
	
	static public function showMenu()
	{
		$adminMenu = self::model()->findAllByAttributes(array('isActive'=>true),array('order'=>'position'));
		$menu['items'] = array();
		
		foreach($adminMenu as $val)
		{
			if($val->group == null)
			{
				array_push($menu['items'], array('label'=>$val->title, 'url'=>array('/admin/'.$val->alias), 'alias'=>$val->alias));
			}
		}
//		array_push($menu['items'], array('label'=>'Выход', 'url'=>array('site/logout')));
		return $menu;
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
			'title' => 'Title',
			'alias' => 'Alias',
			'group' => 'Group',
			'isActive' => 'Is Active',
			'position' => 'Position',
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
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('t.group',$this->group,true);
		$criteria->compare('isActive',$this->isActive,true);
		$criteria->compare('position',$this->position);

		$criteria->order = $this->_order;
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	public function beforeDelete()
	{
		if($this->alias == 'manager')
			return false;
		return parent::beforeDelete();
	}
	
}