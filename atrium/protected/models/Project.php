<?php

/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property integer $project_id
 * @property string $name
 * @property integer $budget
 * @property integer $status_id
 *
 * The followings are the available model relations:
 * @property Finances[] $finances
 * @property Statuses $status
 * @property Users[] $users
 */
class Project extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
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
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, budget, status_id', 'required'),
			array('budget, status_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('project_id, name, budget, status_id', 'safe', 'on'=>'search'),
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
			'finances' => array(self::HAS_MANY, 'Finance', 'project_id'),
			'status' => array(self::BELONGS_TO, 'Status', 'status_id',
                'condition' => 'status.object='.Status::OBJECT_PROJECT,
            ),
            'comments' => array(self::HAS_MANY, 'Comment', 'project_id',
                'condition' => 'comments.object='.Comment::OBJECT_PROJECT,
                'through' => 'comments.object_id',
            ),
			'users' => array(self::MANY_MANY, 'User', 'projects_links(project_id, user_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'project_id' => 'Project',
			'name' => 'Name',
			'budget' => 'Budget',
			'status_id' => 'Status',
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

		$criteria->compare('project_id',$this->project_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('budget',$this->budget);
		$criteria->compare('status_id',$this->status_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
