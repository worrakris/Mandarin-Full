<?php

/**
 * This is the model class for table "tbl_invest_doc_type".
 *
 * The followings are the available columns in table 'tbl_invest_doc_type':
 * @property string $doc_type_id
 * @property string $doc_type_title_th
 * @property string $doc_type_title_en
 * @property string $doc_type_update_date
 * @property string $doc_type_status
 */
class TblInvestDocType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_invest_doc_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('doc_type_title_th, doc_type_title_en, doc_type_update_date', 'required'),
			array('doc_type_title_th, doc_type_title_en', 'length', 'max'=>250),
			array('doc_type_status', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('doc_type_id, doc_type_title_th, doc_type_title_en, doc_type_update_date, doc_type_status', 'safe', 'on'=>'search'),
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
			'doc_type_id' => 'Doc Type',
			'doc_type_title_th' => 'Doc Type Title Th',
			'doc_type_title_en' => 'Doc Type Title En',
			'doc_type_update_date' => 'Doc Type Update Date',
			'doc_type_status' => 'Doc Type Status',
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

		$criteria->compare('doc_type_id',$this->doc_type_id,true);
		$criteria->compare('doc_type_title_th',$this->doc_type_title_th,true);
		$criteria->compare('doc_type_title_en',$this->doc_type_title_en,true);
		$criteria->compare('doc_type_update_date',$this->doc_type_update_date,true);
		$criteria->compare('doc_type_status',$this->doc_type_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblInvestDocType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
