<?php

/**
 * This is the model class for table "{{marriagecertificate}}".
 *
 * The followings are the available columns in table '{{marriagecertificate}}':
 * @property string $id
 * @property string $year
 * @property string $dateOfMarriage
 * @property string $groomName
 * @property string $groomSurname
 * @property string $groomFatherFullName
 * @property string $groomMotherFullName
 * @property string $groomDOB
 * @property integer $groomNationality
 * @property string $groomProfession
 * @property string $groomStatus
 * @property string $brideName
 * @property string $brideSurname
 * @property string $brideFatherFullName
 * @property string $brideMotherFullName
 * @property string $brideDOB
 * @property integer $brideNationality
 * @property string $brideStatus
 * @property string $firstWitnessFullName
 * @property string $firstWitnessDomicile
 * @property string $secondWitnessFullName
 * @property string $secondWitnessDomicile
 * @property string $minister
 * @property string $remark
 *
 * The followings are the available model relations:
 * @property Nationality $groomNationality0
 * @property Nationality $brideNationality0
 */
class MarriageCertificate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MarriageCertificate the static model class
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
		return '{{marriagecertificate}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('year, dateOfMarriage, groomName, groomSurname, groomFatherFullName, groomMotherFullName, groomDOB, groomNationality, groomProfession, groomStatus, brideName, brideSurname, brideFatherFullName, brideMotherFullName, brideDOB, brideNationality, brideStatus, firstWitnessFullName, firstWitnessDomicile, secondWitnessFullName, secondWitnessDomicile, minister, remark', 'required'),
			array('groomNationality, brideNationality', 'numerical', 'integerOnly'=>true),
			array('year', 'length', 'max'=>10),
			array('groomStatus, brideStatus', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, year, dateOfMarriage, groomName, groomSurname, groomFatherFullName, groomMotherFullName, groomDOB, groomNationality, groomProfession, groomStatus, brideName, brideSurname, brideFatherFullName, brideMotherFullName, brideDOB, brideNationality, brideStatus, firstWitnessFullName, firstWitnessDomicile, secondWitnessFullName, secondWitnessDomicile, minister, remark', 'safe', 'on'=>'search'),
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
			'groomNationality0' => array(self::BELONGS_TO, 'Nationality', 'groomNationality'),
			'brideNationality0' => array(self::BELONGS_TO, 'Nationality', 'brideNationality'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'year' => 'Year',
			'dateOfMarriage' => 'Date Of Marriage',
			'groomName' => 'Groom Name',
			'groomSurname' => 'Groom Surname',
			'groomFatherFullName' => 'Groom Father Full Name',
			'groomMotherFullName' => 'Groom Mother Full Name',
			'groomDOB' => 'Groom Dob',
			'groomNationality' => 'Groom Nationality',
			'groomProfession' => 'Groom Profession',
			'groomStatus' => 'Groom Status',
			'brideName' => 'Bride Name',
			'brideSurname' => 'Bride Surname',
			'brideFatherFullName' => 'Bride Father Full Name',
			'brideMotherFullName' => 'Bride Mother Full Name',
			'brideDOB' => 'Bride Dob',
			'brideNationality' => 'Bride Nationality',
			'brideStatus' => 'Bride Status',
			'firstWitnessFullName' => 'First Witness Full Name',
			'firstWitnessDomicile' => 'First Witness Domicile',
			'secondWitnessFullName' => 'Second Witness Full Name',
			'secondWitnessDomicile' => 'Second Witness Domicile',
			'minister' => 'Minister',
			'remark' => 'Remark',
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
		$criteria->compare('dateOfMarriage',$this->dateOfMarriage,true);
		$criteria->compare('groomName',$this->groomName,true);
		$criteria->compare('groomSurname',$this->groomSurname,true);
		$criteria->compare('groomFatherFullName',$this->groomFatherFullName,true);
		$criteria->compare('groomMotherFullName',$this->groomMotherFullName,true);
		$criteria->compare('groomDOB',$this->groomDOB,true);
		$criteria->compare('groomNationality',$this->groomNationality);
		$criteria->compare('groomProfession',$this->groomProfession,true);
		$criteria->compare('groomStatus',$this->groomStatus,true);
		$criteria->compare('brideName',$this->brideName,true);
		$criteria->compare('brideSurname',$this->brideSurname,true);
		$criteria->compare('brideFatherFullName',$this->brideFatherFullName,true);
		$criteria->compare('brideMotherFullName',$this->brideMotherFullName,true);
		$criteria->compare('brideDOB',$this->brideDOB,true);
		$criteria->compare('brideNationality',$this->brideNationality);
		$criteria->compare('brideStatus',$this->brideStatus,true);
		$criteria->compare('firstWitnessFullName',$this->firstWitnessFullName,true);
		$criteria->compare('firstWitnessDomicile',$this->firstWitnessDomicile,true);
		$criteria->compare('secondWitnessFullName',$this->secondWitnessFullName,true);
		$criteria->compare('secondWitnessDomicile',$this->secondWitnessDomicile,true);
		$criteria->compare('minister',$this->minister,true);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}