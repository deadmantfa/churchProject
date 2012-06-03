<?php
$this->breadcrumbs=array(
	'Marriage Certificates'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MarriageCertificate', 'url'=>array('index'), 'visible'=>Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Index")),
	array('label'=>'Create MarriageCertificate', 'url'=>array('create'), 'visible'=>Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Create")),
	array('label'=>'Update MarriageCertificate', 'url'=>array('update', 'id'=>$model->id), 'visible'=>Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Update")),
	array('label'=>'Delete MarriageCertificate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Delete")),
	array('label'=>'Manage MarriageCertificate', 'url'=>array('admin'), 'visible'=>Yii::app()->user->checkAccess("Marriage.MarriageCertificate.Admin")),
);
?>

<h1>View MarriageCertificate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'year',
		'dateOfMarriage',
		'groomName',
		'groomSurname',
		'groomFatherFullName',
		'groomMotherFullName',
		'groomDOB',
		'groomNationality',
		'groomProfession',
		'groomStatus',
		'brideName',
		'brideSurname',
		'brideFatherFullName',
		'brideMotherFullName',
		'brideDOB',
		'brideNationality',
		'brideStatus',
		'firstWitnessFullName',
		'firstWitnessDomicile',
		'secondWitnessFullName',
		'secondWitnessDomicile',
		'minister',
		'remark',
	),
)); ?>
