<?php
/**
 * Вьюшка добавления веб админ
 */

/**
 * @author Craft-Soft Team
 * @package CS:Bans
 * @version 1.0 beta
 * @copyright (C)2013 Craft-Soft.ru.  Все права защищены.
 * @link http://craft-soft.ru/
 * @license http://creativecommons.org/licenses/by-nc-sa/4.0/deed.ru  «Attribution-NonCommercial-ShareAlike»
 */

$this->pageTitle = Yii::app()->name .' :: Административен център - Добави WEB админ';
$this->breadcrumbs=array(
	'Административен център'=>array('/admin/index'),
	'Веб админ'=>array('admin'),
	'Създай нового веб админ',
);

$this->menu=array(
	array('label'=>'Административен център', 'url'=>array('/admin/index')),
	array('label'=>'ВЕБ админмы', 'url'=>array('admin')),
);
$this->renderPartial('/admin/mainmenu', array('active' =>'site', 'activebtn' => 'webadmins'));
?>

<h2>Добави веб админ</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>