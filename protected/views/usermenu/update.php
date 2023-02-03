<?php
/**
 * Вьюшка редактирования ссылки главного меню
 */

/**
 * @author Craft-Soft Team
 * @package CS:Bans
 * @version 1.0 beta
 * @copyright (C)2013 Craft-Soft.ru.  Все права защищены.
 * @link http://craft-soft.ru/
 * @license http://creativecommons.org/licenses/by-nc-sa/4.0/deed.ru  «Attribution-NonCommercial-ShareAlike»
 */

$this->pageTitle = Yii::app()->name .' :: Административен център - Редактиране ссылку ';
$this->breadcrumbs=array(
	'Административен център'=> array('/admin/index'),
	'Главное меню'=>array('admin'),
	'Ссылка № '.$model->id=>array('view','id'=>$model->id),
	'Редактиране',
);

$this->menu=array(
	array('label'=>'Добави ссылку','url'=>array('create')),
	array('label'=>'Управление ссылками','url'=>array('admin')),
);
$this->renderPartial('/admin/mainmenu', array('active' =>'site', 'activebtn' => 'webmainmenu'));
?>

<h2>Редактиране ссылку № <?php echo $model->id; ?></h2>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>