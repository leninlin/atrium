<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $user_id
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $second_name
 * @property string $last_name
 * @property integer $birthday
 * @property integer $phone
 * @property integer $usergroup_id
 * @property integer $job_id
 *
 * The followings are the available model relations:
 * @property Projects[] $projects
 * @property Tasks[] $tasks
 * @property Jobs $job
 * @property Usergroups $usergroup
 */
class User extends CActiveRecord
{
    public $retry_password;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email, password, retry_password, usergroup_id, job_id', 'required'),
			array('password', 'compare', 'compareAttribute' => 'retry_password'),
			array('birthday, phone, usergroup_id, job_id', 'numerical', 'integerOnly' => true),
			array('username', 'length', 'min' => 3),
			array('username, email, password, first_name, second_name, last_name', 'length', 'max' => 50),
			array('email', 'email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, username, email, password, first_name, second_name, last_name, birthday, phone, usergroup_id, job_id', 'safe', 'on' => 'search'),
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
			'projects' => array(self::MANY_MANY, 'Project', 'projects_links(user_id, project_id)'),
			'tasks' => array(self::MANY_MANY, 'Task', 'tasks_links(user_id, task_id)'),
			'job' => array(self::BELONGS_TO, 'Job', 'job_id'),
			'usergroup' => array(self::BELONGS_TO, 'Usergroup', 'usergroup_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'retry_password' => 'Retry password',
			'first_name' => 'First Name',
			'second_name' => 'Second Name',
			'last_name' => 'Last Name',
			'birthday' => 'Birthday',
			'phone' => 'Phone',
			'usergroup_id' => 'Usergroup',
			'job_id' => 'Job',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('second_name',$this->second_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('birthday',$this->birthday);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('usergroup_id',$this->usergroup_id);
		$criteria->compare('job_id',$this->job_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    protected function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->password = md5($this->password);
            }

            return true;
        }
        return false;
    }

    public function validatePassword($password)
    {
        return md5($password) === $this->password;
    }
}
