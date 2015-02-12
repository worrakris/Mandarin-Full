<?php

/**
 * This is the model class for table "tbl_room_reserved".
 *
 * The followings are the available columns in table 'tbl_room_reserved':
 * @property string $rr_id
 * @property integer $rsv_id
 * @property integer $room_type_id
 * @property string $rr_date
 * @property integer $rr_total_reserved
 * @property string $rr_extra_bed
 
 */
class RoomReservedManage extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    
    public $total_room;
    
    public function tableName() {
        return 'tbl_room_reserved';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('rsv_id, room_type_id, rr_date, rr_total_reserved', 'required'),
            array('rsv_id, room_type_id, rr_total_reserved', 'numerical', 'integerOnly' => true),
            array('rr_extra_bed', 'length', 'max' => 3),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('rr_id, rsv_id, room_type_id, rr_date, rr_total_reserved, rr_extra_bed', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'RoomDesc' => array(self::BELONGS_TO, 'ReservedDescriptionManage', 'rsv_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'rr_id' => 'Rr',
            'rsv_id' => 'Rsv',
            'room_type_id' => 'Room Type',
            'rr_date' => 'Rr Date',
            'rr_total_reserved' => 'Rr Total Reserved',
            'rr_extra_bed' => 'Rr Extra Bed',
            'room_total' => 'Total Room',
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

        $criteria->compare('rr_id', $this->rr_id, true);
        $criteria->compare('rsv_id', $this->rsv_id);
        $criteria->compare('room_type_id', $this->room_type_id);
        $criteria->compare('rr_date', $this->rr_date, true);
        $criteria->compare('rr_total_reserved', $this->rr_total_reserved);
        $criteria->compare('rr_extra_bed', $this->rr_extra_bed, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return RoomReservedManage the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
