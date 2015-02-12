<?php

/**
 * This is the model class for table "tbl_reserved_desc".
 *
 * The followings are the available columns in table 'tbl_reserved_desc':
 * @property string $rsv_id
 * @property string $rsv_name
 * @property string $rsv_tel
 * @property string $rsv_email
 * @property integer $rsv_total_room
 * @property integer $rsv_total_night
 * @property string $rsv_extra_bed
 * @property string $rsv_note
 * @property integer $staff_id
 */
class ReservedDescriptionManage extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_reserved_desc';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('rsv_name, rsv_tel, rsv_email, rsv_total_room, rsv_total_night, rsv_note, staff_id', 'required'),
            array('rsv_total_room, rsv_total_night, staff_id', 'numerical', 'integerOnly' => true),
            array('rsv_name, rsv_email', 'length', 'max' => 255),
            array('rsv_tel', 'length', 'max' => 100),
            array('rsv_extra_bed', 'length', 'max' => 3),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('rsv_id, rsv_name, rsv_tel, rsv_email, rsv_total_room, rsv_total_night, rsv_extra_bed, rsv_note, staff_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'RoomDesc' => array(self::HAS_MANY, 'RoomReservedManage', 'rsv_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'rsv_id' => 'Rsv',
            'rsv_name' => 'Rsv Name',
            'rsv_tel' => 'Rsv Tel',
            'rsv_email' => 'Rsv Email',
            'rsv_total_room' => 'Rsv Total Room',
            'rsv_total_night' => 'Rsv Total Night',
            'rsv_extra_bed' => 'Rsv Extra Bed',
            'rsv_note' => 'Rsv Note',
            'staff_id' => 'Staff',
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

        $criteria->compare('rsv_id', $this->rsv_id, true);
        $criteria->compare('rsv_name', $this->rsv_name, true);
        $criteria->compare('rsv_tel', $this->rsv_tel, true);
        $criteria->compare('rsv_email', $this->rsv_email, true);
        $criteria->compare('rsv_total_room', $this->rsv_total_room);
        $criteria->compare('rsv_total_night', $this->rsv_total_night);
        $criteria->compare('rsv_extra_bed', $this->rsv_extra_bed, true);
        $criteria->compare('rsv_note', $this->rsv_note, true);
        $criteria->compare('staff_id', $this->staff_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ReservedDescriptionManage the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
