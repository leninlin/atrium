<?php
/* @var $this TaskActionController */
/* @var $model TaskAction */

$this->breadcrumbs=array(
	'Task Actions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TaskAction', 'url'=>array('index')),
	array('label'=>'Manage TaskAction', 'url'=>array('admin')),
);
?>

<h1>Create TaskAction</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>