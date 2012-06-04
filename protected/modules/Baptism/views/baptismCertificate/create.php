<?php
$this->breadcrumbs=array(
	'Baptism Certificates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Baptism Certificate', 'url'=>array('index'), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Index")),
	array('label'=>'Manage Baptism Certificate', 'url'=>array('admin'), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Admin")),
);
?>

<h1>Create Baptism Certificate</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>