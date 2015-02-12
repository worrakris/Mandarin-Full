<?php

/**
 * This is the model class for table "tbl_promotions".
 *
 * The followings are the available columns in table 'tbl_promotions':
 * @property string $promotion_id
 * @property string $promotion_title_th
 * @property string $promotion_title_en
 * @property string $promotion_content_th
 * @property string $promotion_content_en
 * @property string $promotion_picture
 * @property string $promotion_create_date
 * @property string $promotion_start_date
 * @property string $promotion_expire_date
 * @property string $promotion_update_date
 * @property string $promotion_status
 * @property string $promotion_creator
 * @property string $promotion_type
 */
class TblPromotions extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_promotions';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('promotion_title_th, promotion_title_en, promotion_content_th, promotion_content_en, promotion_picture, promotion_update_date, promotion_creator', 'required'),
            array('promotion_title_th, promotion_title_en, promotion_picture', 'length', 'max' => 250),
            array('promotion_status', 'length', 'max' => 8),
            array('promotion_creator', 'length', 'max' => 10),
            array('promotion_type', 'length', 'max' => 13),
            array('promotion_create_date, promotion_start_date, promotion_expire_date', 'safe'),
            array('promotion_picture', 'file', 'types' => 'jpg, jpeg, png, gif'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('promotion_id, promotion_title_th, promotion_title_en, promotion_content_th, promotion_content_en, promotion_picture, promotion_create_date, promotion_start_date, promotion_expire_date, promotion_update_date, promotion_status, promotion_creator, promotion_type', 'safe', 'on' => 'search'),
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
            'promotion_id' => 'ID',
            'promotion_title_th' => 'Title (Thai)',
            'promotion_title_en' => 'Title (English)',
            'promotion_content_th' => 'Content (Thai)',
            'promotion_content_en' => 'Content (English)',
            'promotion_picture' => 'Image',
            'promotion_create_date' => 'Create Date',
            'promotion_start_date' => 'Start Date',
            'promotion_expire_date' => 'Expired Date',
            'promotion_update_date' => 'Update Date',
            'promotion_status' => 'Status',
            'promotion_creator' => 'Creator',
            'promotion_type' => 'Promotion Type',
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

//        $criteria->compare('promotion_id', $this->promotion_id, true);
        $criteria->compare('promotion_title_th', $this->promotion_title_th, true);
        $criteria->compare('promotion_title_en', $this->promotion_title_en, true);
//        $criteria->compare('promotion_content_th', $this->promotion_content_th, true);
//        $criteria->compare('promotion_content_en', $this->promotion_content_en, true);
//        $criteria->compare('promotion_picture', $this->promotion_picture, true);
//        $criteria->compare('promotion_create_date', $this->promotion_create_date, true);
        $criteria->compare('promotion_start_date', $this->promotion_start_date, true);
        $criteria->compare('promotion_expire_date', $this->promotion_expire_date, true);
//        $criteria->compare('promotion_update_date', $this->promotion_update_date, true);
        $criteria->compare('promotion_status', $this->promotion_status, true);
//        $criteria->compare('promotion_creator', $this->promotion_creator, true);
        $criteria->compare('promotion_type', $this->promotion_type, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TblPromotions the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
