<?php

/**
 * This is the model class for table "statuses".
 *
 * The followings are the available columns in table 'statuses':
 * @property integer $status_id
 * @property string $name
 * @property string $description
 * @property string $value
 * @property string $object
 *
 * The followings are the available model relations:
 * @property Projects[] $projects
 * @property Tasks[] $tasks
 */
class Status extends CActiveRecord
{
    public static const OBJECT_PROJECT = 1;
    public static const OBJECT_TASK = 2;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Status the static model class
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
		return 'statuses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, value, object', 'required'),
			array('name', 'length', 'max'=>50),
			array('description', 'length', 'max'=>255),
			array('value, object', 'numerical', 'integerOnly'=>true),
			array('value, object', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('status_id, name, description, value, object', 'safe', 'on'=>'search'),
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
			'projects' => array(self::HAS_MANY, 'Project', 'status_id'),
			'tasks' => array(self::HAS_MANY, 'Task', 'status_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'status_id' => 'Status',
			'name' => 'Name',
			'description' => 'Description',
			'value' => 'Value',
			'object' => 'Object',
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

		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('object',$this->object,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
