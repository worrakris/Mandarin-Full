<?php

/**
 * This is the model class for table "tbl_customer_contact".
 *
 * The followings are the available columns in table 'tbl_customer_contact':
 * @property string $contact_id
 * @property string $contact_name
 * @property string $contact_email
 * @property string $contact_subject
 * @property string $contact_description
 * @property string $contact_status
 * @property string $contact_create_date
 * @property string $contact_update_date
 */
class TblCustomerContact extends CActiveRecord {

//    public $verifyCode;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_customer_contact';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('contact_name, contact_email, contact_subject, contact_description', 'required'),
            array('contact_name, contact_email, contact_subject', 'length', 'max' => 250),
            //array('contact_status', 'length', 'max'=>5),
            array('contact_create_date', 'safe'),
            array('contact_email', 'email'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('contact_id, contact_name, contact_email, contact_subject, contact_description, contact_status, contact_create_date, contact_update_date', 'safe', 'on' => 'search'),
//            array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
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
            'contact_id' => 'Contact',
            'contact_name' => 'Contact Name',
            'contact_email' => 'Contact Email',
            'contact_subject' => 'Contact Subject',
            'contact_description' => 'Contact Description',
            'contact_status' => 'Contact Status',
            'contact_create_date' => 'Contact Create Date',
            'contact_update_date' => 'Contact Update Date',
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

        $criteria->compare('contact_id', $this->contact_id, true);
        $criteria->compare('contact_name', $this->contact_name, true);
        $criteria->compare('contact_email', $this->contact_email, true);
        $criteria->compare('contact_subject', $this->contact_subject, true);
        $criteria->compare('contact_description', $this->contact_description, true);
        $criteria->compare('contact_status', $this->contact_status, true);
        $criteria->compare('contact_create_date', $this->contact_create_date, true);
        $criteria->compare('contact_update_date', $this->contact_update_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblCustomerContact the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
