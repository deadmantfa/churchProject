<?php

/**
 * This is the model class for table "{{BaptismCertificate}}".
 *
 * The followings are the available columns in table '{{BaptismCertificate}}':
 * @property string $id
 * @property string $year
 * @property string $dateOfBaptism
 * @property string $dateOfBirth
 * @property string $childName
 * @property string $surname
 * @property string $fatherName
 * @property string $motherName
 * @property string $godFatherName
 * @property string $godMotherName
 * @property string $minister
 * @property string $remark
 * @property integer $nationalityId
 * @property integer $gender
 * @property string $domicile1
 * @property string $domicile2
 * @property string $domicile3
 * @property string $domicile4
 *
 * The followings are the available model relations:
 * @property Nationality $nationality
 */
class BaptismCertificate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BaptismCertificate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{baptismCertificate}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('year, dateOfBaptism, dateOfBirth, childName, surname, fatherName, motherName, godFatherName, godMotherName, minister, nationalityId, gender, domicile1', 'required'),
			array('nationalityId, gender', 'numerical', 'integerOnly'=>true),
			array('year', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, year, dateOfBaptism, dateOfBirth, childName, surname, fatherName, motherName, godFatherName, godMotherName, minister, remark, nationalityId, gender, domicile1, domicile2, domicile3, domicile4', 'safe', 'on'=>'search'),
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
			'nationality' => array(self::BELONGS_TO, 'Nationality', 'nationalityId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'year' => 'Year of Baptism',
			'dateOfBaptism' => 'Date Of Baptism',
			'dateOfBirth' => 'Date Of Birth',
			'childName' => 'Child\'s Firstname',
			'surname' => 'Child\'s Surname',
			'fatherName' => 'Father\'s Name',
			'motherName' => 'Mother\'s Name',
			'godFatherName' => 'Godfather Full Name',
			'godMotherName' => 'GodMother Full Name',
			'minister' => 'Minister\'s Full Name',
			'remark' => 'Remark',
			'nationalityId' => 'Nationality',
			'gender' => 'Gender',
			'domicile1' => 'Domicile 1',
			'domicile2' => 'Domicile 2',
			'domicile3' => 'Domicile 3',
			'domicile4' => 'Domicile 4',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('dateOfBaptism',$this->dateOfBaptism,true);
		$criteria->compare('dateOfBirth',$this->dateOfBirth,true);
		$criteria->compare('childName',$this->childName,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('fatherName',$this->fatherName,true);
		$criteria->compare('motherName',$this->motherName,true);
		$criteria->compare('godFatherName',$this->godFatherName,true);
		$criteria->compare('godMotherName',$this->godMotherName,true);
		$criteria->compare('minister',$this->minister,true);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('nationalityId',$this->nationalityId);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('domicile1',$this->domicile1,true);
		$criteria->compare('domicile2',$this->domicile2,true);
		$criteria->compare('domicile3',$this->domicile3,true);
		$criteria->compare('domicile4',$this->domicile4,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}