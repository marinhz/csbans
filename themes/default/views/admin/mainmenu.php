<?php
/**
 * Верхнее меню админцентра
 */

/**
 * @author Craft-Soft Team
 * @package CS:Bans
 * @version 1.0 beta
 * @copyright (C)2013 Craft-Soft.ru.  Все права защищены.
 * @link http://craft-soft.ru/
 * @license http://creativecommons.org/licenses/by-nc-sa/4.0/deed.ru  «Attribution-NonCommercial-ShareAlike»
 */

/**
 * @param string $active Определяет активный раздел меню
 * @param string $activeиет Определяет активную кнопку
 */
$disabled = ' disabled="disabled" onclick="return false;"';
$this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs',
	'placement' => 'above',
	'tabs' => array(
		array(
			'label' => 'Административен център',
			'content' => '
				<ul class="inline">
					<li><a href="' . Yii::app()->createUrl('/admin/index') . '" class="btn"'.($activebtn == 'admsystem' ? $disabled : '').'>Системна информация</a></li>
					<li><a href="' . Yii::app()->createUrl('/Bans/create') . '" class="btn"'.($activebtn == 'admaddban' ? $disabled : '').'>Добавете бан</a></li>
					<li><a href="' . Yii::app()->createUrl('/admin/addbanonline') . '" class="btn"'.($activebtn == 'addbanonline' ? $disabled : '').'>Добавете бан онлайн</a></li>
				</ul>',
			'active' => $active == 'main'
		),
		array(
			'label' => 'Сървър',
			'content' => '
				<ul class="inline">
					<li><a href="' . Yii::app()->createUrl('/serverinfo/admin') . '" class="btn"'.($activebtn == 'servsettings' ? $disabled : '').'>Настройки</a></li>
					<li><a href="' . Yii::app()->createUrl('/admin/reasons') . '" class="btn"'.($activebtn == 'servreasons' ? $disabled : '').'>Причини за бан</a></li>
					<li><a href="' . Yii::app()->createUrl('/amxadmins/admin') . '" class="btn"'.($activebtn == 'servamxadmins' ? $disabled : '').'>Администратори</a></li>
					<li><a href="' . Yii::app()->createUrl('/amxadmins/adminsonservers') . '" class="btn"'.($activebtn == 'servadmassign' ? $disabled : '').'>Добавяне на администратори</a></li>
				</ul>',
			'active' => $active == 'server'
		),
		array(
			'label' => 'Уеб сайт',
			'content' => '
				<ul class="inline">
					<li><a href="' . Yii::app()->createUrl('/webadmins/admin') . '" class="btn"'.($activebtn == 'webadmins' ? $disabled : '').'>УЕБ админ</a></li>
					<li><a href="' . Yii::app()->createUrl('/levels/admin') . '" class="btn"'.($activebtn == 'webadmlevel' ? $disabled : '').'>Нива</a></li>
					<li><a href="' . Yii::app()->createUrl('/usermenu/admin') . '" class="btn"'.($activebtn == 'webmainmenu' ? $disabled : '').'>Връзки</a></li>
					<li><a href="' . Yii::app()->createUrl('/admin/websettings') . '" class="btn"'.($activebtn == 'websettings' ? $disabled : '').'>Настройки</a></li>
					<li><a href="' . Yii::app()->createUrl('/logs/admin') . '" class="btn"'.($activebtn == 'logs' ? $disabled : '').'>Логове</a></li>
					'.(Yii::app()->hasModule('billing')
						?
					'<li><a href="'.Yii::app()->createUrl('/billing/tariff/admin').'" class="btn"'.($activebtn == 'tariffs' ? $disabled : '').'>Цени</a></li>'
						:
					'').'
				</ul>',
			'active' => $active == 'site'
		),
	),
));
?>
