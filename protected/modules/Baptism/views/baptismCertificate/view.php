<?php
$this->breadcrumbs=array(
	'Baptism Certificates'=>array('index'),
	$model->childName.' '.$model->surname,
);

$this->menu=array(
	array('label'=>'List Baptism Certificate', 'url'=>array('index'), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Index")),
	array('label'=>'Create Baptism Certificate', 'url'=>array('create'), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Create")),
	array('label'=>'Update Baptism Certificate', 'url'=>array('update', 'id'=>$model->id), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Update")),
	array('label'=>'Print Baptism Certificate', 'url'=>array('print', 'id'=>$model->id), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Print")),
	array('label'=>'Delete Baptism Certificate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Delete")),
	array('label'=>'Manage Baptism Certificate', 'url'=>array('admin'), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Admin")),
);
?>

<h1>View Baptism Certificate #<?php echo $model->id.' - '.$model->childName.' '.$model->surname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'year',
		'dateOfBaptism',
		'dateOfBirth',
		'childName',
		'surname',
		array(
			'name' => 'gender',
			'value' => commonFunc::getGender($model->gender)
		),
		array(
			'name' => 'nationalityId',
			'value' => commonFunc::getCountries($model->nationalityId)
		),
		'fatherName',
		'motherName',
		'godFatherName',
		'godMotherName',
		'minister',
		'remark',
		'domicile1',
		'domicile2',
		'domicile3',
		'domicile4',
	),
)); ?>
