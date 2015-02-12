<?php

/**
 * This is the model class for table "tbl_room_quota".
 *
 * The followings are the available columns in table 'tbl_room_quota':
 * @property integer $quota_id
 * @property string $quota_start
 * @property string $quota_end
 * @property integer $room_type_id
 * @property integer $quota_number
 * @property integer $creator_staff
 * @property string $quota_condition
 * 
 */
class RoomQuotaManage extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_room_quota';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('quota_start, quota_end, room_type_id, quota_number, creator_staff', 'required'),
            array('room_type_id, quota_number, creator_staff', 'numerical', 'integerOnly' => true),
            array('quota_condition', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('quota_id, quota_start, quota_end, room_type_id, quota_number, creator_staff, quota_condition', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'RoomType' => array(self::BELONGS_TO, 'RoomTypeModel', 'room_type_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'quota_id' => 'Quota',
            'quota_start' => 'Quota Start',
            'quota_end' => 'Quota End',
            'room_type_id' => 'Room Type',
            'quota_number' => 'Quota Number',
            'creator_staff' => 'Creator Staff',
            'quota_condition' => 'Quota Condition',
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
//    public function search() {
//        // @todo Please modify the following code to remove attributes that should not be searched.
//
//        $criteria = new CDbCriteria;
//
//        $criteria->compare('quota_id', $this->quota_id);
//        $criteria->compare('quota_start', $this->quota_start, true);
//        $criteria->compare('quota_end', $this->quota_end, true);
//        $criteria->compare('room_type_id', $this->room_type_id);
//        $criteria->compare('quota_number', $this->quota_number);
//        $criteria->compare('creator_staff', $this->creator_staff);
//        $criteria->compare('quota_condition', $this->quota_condition, true);
//
//        return new CActiveDataProvider($this, array(
//            'criteria' => $criteria,
//        ));
//    }

    public function search($stDate, $enDate) {
        if (!(empty($stDate) || empty($enDate))) {
            $criteria = new CDbCriteria;

            $criteria->compare('quota_start', ">=" . $stDate, true);
            $criteria->compare('quota_end', "<=" . $enDate, true);

            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
            ));
        }
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return RoomQuotaManage the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
