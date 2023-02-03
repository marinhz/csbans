<?php
/**
 * Вьюшка просмотра деталей веб админ
 */

/**
 * @author Craft-Soft Team
 * @package CS:Bans
 * @version 1.0 beta
 * @copyright (C)2013 Craft-Soft.ru.  Все права защищены.
 * @link http://craft-soft.ru/
 * @license http://creativecommons.org/licenses/by-nc-sa/4.0/deed.ru  «Attribution-NonCommercial-ShareAlike»
 */

$this->pageTitle = Yii::app()->name .' :: Административен център - Детали админ ' . $model->username;
$this->breadcrumbs=array(
	'Административен център'=>array('/admin/index'),
	'Веб админ'=>array('admin'),
	'Детали админ ' . $model->username,
);

$this->menu=array(
	array('label'=>'Административен център', 'url'=>array('/admin/index')),
	array('label'=>'Управление веб админи', 'url'=>array('index')),
	array('label'=>'Обнови', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Изтрий', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Удалитьт веб админ?')),
);
$this->renderPartial('/admin/mainmenu', array('active' =>'site', 'activebtn' => 'webadmins'));
?>

<h2>Детали ВЕБ админ "<?php echo $model->username; ?>"</h2>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'level',
		'email',
		array(
			'name' => 'last_action',
			'type' => 'datetime',
			'value' => $model->last_action
		),
		'try',
	),
)); ?>
