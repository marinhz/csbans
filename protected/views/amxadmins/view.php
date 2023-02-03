<?php
/**
 * Вьюшка просмотра деталей админ серверов
 */

/**
 * @author Craft-Soft Team
 * @package CS:Bans
 * @version 1.0 beta
 * @copyright (C)2013 Craft-Soft.ru.  Все права защищены.
 * @link http://craft-soft.ru/
 * @license http://creativecommons.org/licenses/by-nc-sa/4.0/deed.ru  «Attribution-NonCommercial-ShareAlike»
 */

$this->pageTitle = Yii::app()->name . ' :: Административен център - Редактиране на админ';
$this->breadcrumbs = array(
	'Административен център' => array('/admin/index'),
	'AmxModX админ' => array('admin'),
	'Админ ' . $model->nickname
);
$this->renderPartial('/admin/mainmenu', array('active' =>'server', 'activebtn' => 'servamxadmins'));

$this->menu=array(
	array('label'=>'Добави AmxModX админ', 'url'=>array('create')),
	array('label'=>'Управление на AmxModX админи', 'url'=>array('admin')),
);
?>
<h2>Детали админ &laquo;<?php echo $model->nickname; ?>&raquo;</h2>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name' => 'flags',
			'value' => Amxadmins::getAuthType($model->flags)
		),
		'username',
		'nickname',
		'steamid',
		'access',
		'icq',
		array(
			'name' => 'ashow',
			'value' => $model->ashow == 1 ? 'Да' : 'Не'
		),
		array(
			'name' => 'created',
			'type' => 'datetime',
			'value' => $model->created
		),
		array(
			'name' => 'expired',
			'value' => $model->expired == 0 ? 'Завинаги' : date('d.m.Y H:i', $model->expired)
		),
		'days',
	),
)); ?>
