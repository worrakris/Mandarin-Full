<?php

/**
 * This is the model class for table "tbl_room_type".
 *
 * The followings are the available columns in table 'tbl_room_type':
 * @property integer $room_type_id
 * @property string $room_type_code
 * @property string $room_type_name
 * @property string $room_type_desc
 * @property string $room_type_last_update
 * @property string $room_type_max_person
 * @property string $room_type_size
 * @property string $room_type_bed
 * @property string $room_type_extra_bed
 * @property string $room_type_picture1
 * @property string $room_type_picture2
 * @property string $room_type_picture3
 * @property string $room_type_picture4
 * @property string $room_type_picture5
 */
class RoomTypeModel extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_room_type';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('room_type_code, room_type_last_update', 'required'),
            array('room_type_code', 'length', 'max' => 5),
            array('room_type_name, room_type_picture1, room_type_picture2, room_type_picture3, room_type_picture4, room_type_picture5', 'length', 'max' => 255),
            array('room_type_size', 'length', 'max' => 200),
            array('room_type_desc, room_type_max_person, room_type_bed', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('room_type_id, room_type_code, room_type_name, room_type_desc, room_type_last_update, room_type_max_person, room_type_size, room_type_bed, room_type_extra_bed, room_type_picture1, room_type_picture2, room_type_picture3, room_type_picture4, room_type_picture5', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'RoomQuota' => array(self::HAS_MANY, 'RoomQuotaManage', 'room_type_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'room_type_id' => 'Room Type',
            'room_type_code' => 'Room Type Code',
            'room_type_name' => 'Room Type Name',
            'room_type_desc' => 'Room Type Desc',
            'room_type_last_update' => 'Room Type Last Update',
            'room_type_max_person' => 'Room Type Max Person',
            'room_type_size' => 'Room Type Size',
            'room_type_bed' => 'Room Type Bed',
            'room_type_extra_bed' => 'Extra Bed',
            'room_type_picture1' => 'Room Type Picture1',
            'room_type_picture2' => 'Room Type Picture2',
            'room_type_picture3' => 'Room Type Picture3',
            'room_type_picture4' => 'Room Type Picture4',
            'room_type_picture5' => 'Room Type Picture5',
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

        $criteria->compare('room_type_id', $this->room_type_id);
        $criteria->compare('room_type_code', $this->room_type_code, true);
        $criteria->compare('room_type_name', $this->room_type_name, true);
        $criteria->compare('room_type_desc', $this->room_type_desc, true);
        $criteria->compare('room_type_last_update', $this->room_type_last_update, true);
        $criteria->compare('room_type_max_person', $this->room_type_max_person, true);
        $criteria->compare('room_type_size', $this->room_type_size, true);
        $criteria->compare('room_type_bed', $this->room_type_bed, true);
        $criteria->compare('room_type_extra_bed', $this->room_type_extra_bed, true);
        $criteria->compare('room_type_picture1', $this->room_type_picture1, true);
        $criteria->compare('room_type_picture2', $this->room_type_picture2, true);
        $criteria->compare('room_type_picture3', $this->room_type_picture3, true);
        $criteria->compare('room_type_picture4', $this->room_type_picture4, true);
        $criteria->compare('room_type_picture5', $this->room_type_picture5, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return RoomTypeModel the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
