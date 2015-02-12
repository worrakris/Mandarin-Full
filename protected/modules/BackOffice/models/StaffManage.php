<?php

/**
 * This is the model class for table "tbl_staff".
 *
 * The followings are the available columns in table 'tbl_staff':
 * @property string $staff_id
 * @property string $staff_name_th
 * @property string $staff_name_en
 * @property string $staff_position
 * @property string $staff_email
 * @property string $staff_tel
 * @property string $staff_create_date
 * @property string $staff_update_date
 * @property string $staff_username
 * @property string $staff_password
 * @property string $staff_status
 * @property integer $staff_type_id
 */
class StaffManage extends CActiveRecord {

    public $retype_password;
    public $initialPassword;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_staff';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('staff_name_th, staff_name_en, staff_email, staff_update_date, staff_username, staff_type_id', 'required'),
            array('staff_type_id', 'numerical', 'integerOnly' => true),
            array('staff_name_th, staff_name_en, staff_position', 'length', 'max' => 250),
            array('staff_email', 'email'),
            array('staff_email, staff_tel', 'length', 'max' => 200),
            array('staff_username', 'length', 'max' => 20),
            array('staff_password, retype_password', 'required', 'on' => 'insert'),
            array('staff_password, retype_password', 'length', 'min' => 6, 'max' => 20),
            array('staff_password', 'compare', 'compareAttribute' => 'retype_password'),
            array('staff_status', 'length', 'max' => 8),
            array('staff_create_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('staff_id, staff_name_th, staff_name_en, staff_position, staff_email, staff_tel, staff_create_date, staff_update_date, staff_username, staff_password, staff_status, staff_type_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'staff_id' => 'ID',
            'staff_name_th' => 'Name (Thai)',
            'staff_name_en' => 'Name (English)',
            'staff_position' => 'Position',
            'staff_email' => 'E-Mail',
            'staff_tel' => 'Telephone',
            'staff_create_date' => 'Create Date',
            'staff_update_date' => 'Last Update',
            'staff_username' => 'Username',
            'staff_password' => 'Password',
            'retype_password' => 'Re-type Password',
            'staff_status' => 'Status',
            'staff_type_id' => 'Role',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('staff_id', $this->staff_id, true);
        $criteria->compare('staff_name_th', $this->staff_name_th, true);
        $criteria->compare('staff_name_en', $this->staff_name_en, true);
        $criteria->compare('staff_position', $this->staff_position, true);
        $criteria->compare('staff_email', $this->staff_email, true);
        $criteria->compare('staff_tel', $this->staff_tel, true);
        $criteria->compare('staff_create_date', $this->staff_create_date, true);
        $criteria->compare('staff_update_date', $this->staff_update_date, true);
        $criteria->compare('staff_username', $this->staff_username, true);
        $criteria->compare('staff_password', $this->staff_password, true);
        $criteria->compare('staff_status', $this->staff_status, true);
        $criteria->compare('staff_type_id', $this->staff_type_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function beforeSave() {
        // in this case, we will use the old hashed password.
        if (empty($this->staff_password) && empty($this->retype_password) && !empty($this->initialPassword)) {
            $this->staff_password = $this->retype_password = $this->initialPassword;
        } else {
            $this->staff_password = $this->retype_password = md5($this->staff_password);
        }
        return parent::beforeSave();
    }

    public function afterFind() {
        //reset the password to null because we don't want the hash to be shown.
        $this->initialPassword = $this->staff_password;
        $this->staff_password = null;

        parent::afterFind();
    }

    public function saveModel($data = array()) {
        //because the hashes needs to match
        if (!empty($data['staff_password']) && !empty($data['retype_password'])) {
            $data['staff_password'] = Yii::app()->user->hashPassword($data['staff_password']);
            $data['repeat_password'] = Yii::app()->user->hashPassword($data['retype_password']);
        }

        $this->attributes = $data;

        if (!$this->save()) {
            return CHtml::errorSummary($this);
        }
        return true;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return StaffManage the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
