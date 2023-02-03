<?php
/**
 * Вьюшка добавления уровня веб админов
 */

/**
 * @author Craft-Soft Team
 * @package CS:Bans
 * @version 1.0 beta
 * @copyright (C)2013 Craft-Soft.ru.  Все права защищены.
 * @link http://craft-soft.ru/
 * @license http://creativecommons.org/licenses/by-nc-sa/4.0/deed.ru  «Attribution-NonCommercial-ShareAlike»
 */

$this->pageTitle = Yii::app()->name .' :: Административен център - Уеб нива';

$this->breadcrumbs=array(
	'Административен център'=>array('/admin/index'),
	'Уеб нива'=>array('admin'),
	'Добави'
);

$this->menu=array(
	array('label'=>'Административен център','url'=>array('index')),
	array('label'=>'Нива','url'=>array('admin')),
);

$this->renderPartial('/admin/mainmenu', array('active' =>'site', 'activebtn' => 'webadmlevel'));
?>

<h2>Добавете ново ниво на уеб администратор</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>