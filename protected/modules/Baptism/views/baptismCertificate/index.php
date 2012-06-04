<?php
$this->breadcrumbs=array(
	'Baptism Certificates',
);

$this->menu=array(
	array('label'=>'Create Baptism Certificate', 'url'=>array('create'), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Create")),
	array('label'=>'Manage Baptism Certificate', 'url'=>array('admin'), 'visible'=>Yii::app()->user->checkAccess("Baptism.BaptismCertificate.Admin")),
);
?>

<h1>Baptism Certificates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
