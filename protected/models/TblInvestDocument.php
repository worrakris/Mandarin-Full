<?php

/**
 * This is the model class for table "tbl_invest_document".
 *
 * The followings are the available columns in table 'tbl_invest_document':
 * @property string $invest_doc_id
 * @property string $invest_doc_title_th
 * @property string $invest_doc_title_en
 * @property string $invest_doc_file_th
 * @property string $invest_doc_file_en
 * @property string $invest_doc_update_date
 * @property string $doc_type_id
 * @property string $invest_doc_status
 */
class TblInvestDocument extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_invest_document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('invest_doc_title_th, invest_doc_title_en, invest_doc_file_th, invest_doc_file_en, invest_doc_update_date, doc_type_id', 'required'),
			array('invest_doc_title_th, invest_doc_title_en, invest_doc_file_th, invest_doc_file_en', 'length', 'max'=>250),
			array('doc_type_id', 'length', 'max'=>10),
			array('invest_doc_status', 'length', 'max'=>8),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('invest_doc_id, invest_doc_title_th, invest_doc_title_en, invest_doc_file_th, invest_doc_file_en, invest_doc_update_date, doc_type_id, invest_doc_status', 'safe', 'on'=>'search'),
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
			'invest_doc_id' => 'Invest Doc',
			'invest_doc_title_th' => 'Invest Doc Title Th',
			'invest_doc_title_en' => 'Invest Doc Title En',
			'invest_doc_file_th' => 'Invest Doc File Th',
			'invest_doc_file_en' => 'Invest Doc File En',
			'invest_doc_update_date' => 'Invest Doc Update Date',
			'doc_type_id' => 'Doc Type',
			'invest_doc_status' => 'Invest Doc Status',
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

		$criteria->compare('invest_doc_id',$this->invest_doc_id,true);
		$criteria->compare('invest_doc_title_th',$this->invest_doc_title_th,true);
		$criteria->compare('invest_doc_title_en',$this->invest_doc_title_en,true);
		$criteria->compare('invest_doc_file_th',$this->invest_doc_file_th,true);
		$criteria->compare('invest_doc_file_en',$this->invest_doc_file_en,true);
		$criteria->compare('invest_doc_update_date',$this->invest_doc_update_date,true);
		$criteria->compare('doc_type_id',$this->doc_type_id,true);
		$criteria->compare('invest_doc_status',$this->invest_doc_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TblInvestDocument the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
