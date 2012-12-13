<?php
/* @var $this TaskActionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Task Actions',
);

$this->menu=array(
	array('label'=>'Create TaskAction', 'url'=>array('create')),
	array('label'=>'Manage TaskAction', 'url'=>array('admin')),
);
?>

<h1>Task Actions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
