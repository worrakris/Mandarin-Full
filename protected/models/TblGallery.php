<?php

/**
 * This is the model class for table "tbl_gallery".
 *
 * The followings are the available columns in table 'tbl_gallery':
 * @property string $gallery_id
 * @property string $gallery_capt_th
 * @property string $gallery_capt_en
 * @property string $gallery_image
 * @property string $gallery_update_date
 */
class TblGallery extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_gallery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('gallery_image, gallery_update_date', 'required'),
			array('gallery_capt_th, gallery_capt_en, gallery_image', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('gallery_id, gallery_capt_th, gallery_capt_en, gallery_image, gallery_update_date', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'gallery_id' => 'Gallery',
			'gallery_capt_th' => 'Gallery Capt Th',
			'gallery_capt_en' => 'Gallery Capt En',
			'gallery_image' => 'Gallery Image',
			'gallery_update_date' => 'Gallery Update Date',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('gallery_id',$this->gallery_id,true);
		$criteria->compare('gallery_capt_th',$this->gallery_capt_th,true);
		$criteria->compare('gallery_capt_en',$this->gallery_capt_en,true);
		$criteria->compare('gallery_image',$this->gallery_image,true);
		$criteria->compare('gallery_update_date',$this->gallery_update_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblGallery the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
