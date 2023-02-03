<?php
/**
 * @author Craft-Soft Team
 * @package CS:Bans
 * @version 1.0 beta
 * @copyright (C)2013 Craft-Soft.ru.  Все права защищены.
 * @link http://craft-soft.ru/
 * @license http://creativecommons.org/licenses/by-nc-sa/4.0/deed.ru  «Attribution-NonCommercial-ShareAlike»
 */

/**
 * Модель для таблицы "{{amxadmins}}".
 *
 * Доступные поля таблицы '{{amxadmins}}':
 * @property integer $id ID админ
 * @property string $username имя админ
 * @property string $password Парола админ
 * @property string $access Доступ
 * @property string $flags Флаги
 * @property string $steamid Стим
 * @property string $nickname Ник
 * @property integer $icq Контакти
 * @property integer $ashow Показывать ли на странице админов
 * @property integer $created Дата добавления
 * @property integer $expired Дата окончания
 * @property integer $days Дни админки
 */
class Amxadmins extends CActiveRecord
{
	//public $accessflags = array();
	public $change;
	public $addtake = null;
	//public $servers;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return '{{amxadmins}}';
	}


	public function getAccessflags() {

		return str_split($this->access);
	}

	public function setAccessflags($value) {
		//return false;
	}

	public function scopes()
    {
        return array(
            'sort'=>array(
                'order'=>'`expired` ASC, `nickname` ASC'
            ),
        );
    }

	public function rules()
	{
		return array(
			array('steamid, nickname', 'required'),
			array('accessflags, addtake, servers', 'safe'),
			array('icq, ashow, days, change', 'numerical', 'integerOnly'=>true),
			array('username, access, flags, steamid, nickname', 'length', 'max'=>32),
			array('password', 'length', 'max'=>50),
			array('id, username, password, access, flags, steamid, nickname, icq, ashow, created, expired, days', 'safe',  'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'servers' => array(
				self::MANY_MANY,
				'Serverinfo',
				'{{admins_servers}}(admin_id, server_id)'
			),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'SteamID',
			'password' => 'Парола',
			'access' => 'Флагове за достъп',
			'accessflags' => 'Флагове за достъп',
			'flags' => 'Тип админки',
			'steamid' => 'Steamid/IP/Ник',
			'nickname' => 'Ник',
			'icq' => 'ICQ',
			'ashow' => 'Показывать в списке админов',
			'created' => 'Дата добавления',
			'expired' => 'Изтича',
			'days' => 'Дни',
			'long' => 'Осталось дней',
			'change' => 'Новый срок',
			'addtake' => 'Выбор',
			'servers' => 'Назначить на серверах',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('access',$this->access,true);
		$criteria->compare('flags',$this->flags,true);
		$criteria->compare('steamid',$this->steamid,true);
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('icq',$this->icq);
		$criteria->compare('ashow',$this->ashow);
		$criteria->compare('created',$this->created);
		$criteria->compare('expired',$this->expired);
		$criteria->compare('days',$this->days);
		//$criteria->order = 'nickname ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array(
				'pageSize' =>  Yii::app()->config->bans_per_page,
			),
		));
	}

	public static function getFlags($adminlist = false)
	{
		if($adminlist)
		{
			return array(
				'a' => 'Имунитет (не може да бъде кикан/баннат и т.н.)',
				'b' => 'Резервация на слот (може да използва запазени слотове)',
				'c' => 'Команда amx_kick',
				'd' => 'Команда amx_ban и amx_unban',
				'e' => 'Команда amx_slay и amx_slap',
				'f' => 'Команда amx_map',
				'g' => 'Команда amx_cvar (не все CVAR\'ы доступны)',
				'h' => 'Команда amx_cfg',
				'i' => 'amx_chat и други команди за чат',
				'j' => 'amx_vote и други команди за гласуване (Vote)',
				'k' => 'Достъп за промяна на стойността на командата sv_password (чрез командата amx_cvar)',
				'l' => 'Достъп до amx_rcon и rcon_password (чрез команда amx_cvar)',
				'm' => 'Ниво на достъп A (за други добавки)',
				'n' => 'Ниво на достъп B',
				'o' => 'Ниво на достъп C',
				'p' => 'Ниво на достъп D',
				'q' => 'Ниво на достъп E',
				'r' => 'Ниво на достъп F',
				's' => 'Ниво на достъп G',
				't' => 'Ниво на достъп H',
				'u' => 'Основен достъп',
				'z' => 'Играч (не администратор)'
			);
		}

		return array(
			'a' => '[a] Имунитет (не може да бъде кикан/баннат и т.н.)',
			'b' => '[b] Резервация на слот (може да използва запазени слотове)',
			'c' => '[c] Команда amx_kick',
			'd' => '[d] Команда amx_ban и amx_unban',
			'e' => '[e] Команда amx_slay и amx_slap',
			'f' => '[f] Команда amx_map',
			'g' => '[g] Команда amx_cvar (не всички CVAR са налични)',
			'h' => '[h] Команда amx_cfg',
			'i' => '[i] amx_chat и други команди за чат',
			'j' => '[j] amx_vote и други команди за гласуване (Vote)',
			'k' => '[k] Достъп за промяна на стойността на командата sv_password (чрез командата amx_cvar)',
			'l' => '[l] Достъп до amx_rcon и rcon_password (чрез команда amx_cvar)',
			'm' => '[m] Ниво на достъп A (за други добавки)',
			'n' => '[n] Ниво на достъп B',
			'o' => '[o] Ниво на достъп C',
			'p' => '[p] Ниво на достъп D',
			'q' => '[q] Ниво на достъп E',
			'r' => '[r] Ниво на достъп F',
			's' => '[s] Ниво на достъп G',
			't' => '[t] Ниво на достъп H',
			'u' => '[u] Основен достъп',
			'z' => '[z] Играч (не администратор)'
		);
	}

	protected function beforeDelete() {
		parent::beforeDelete();
		$servers = AdminsServers::model()->findByAttributes(array('admin_id' => $this->id));
		if ($servers !== null) {
            $servers->deleteAllByAttributes(array('admin_id' => $this->id));
        }

        return true;
	}

	protected function beforeSave() {
        $removePwd = filter_input(INPUT_POST, 'removePwd', FILTER_VALIDATE_BOOLEAN);
        if($removePwd) {
            $this->password = '';
        }

		if($this->isNewRecord) {
			$this->created = time();
            if($this->password && $this->scenario != 'buy') {
                $this->password = md5($this->password);
            }
            if($this->flags != 'a' && !$this->password) {
                $this->flags .= 'e';
            }
			$this->expired = $this->days != 0 ? ($this->days * 86400) + time() : 0;
		} else {
			if ($this->password) {
                $this->password = md5($this->password);
            } else {
                $oldadmin = Amxadmins::model()->findByPk($this->id);
                if ($oldadmin->password && !$removePwd) {
                    $this->password = $oldadmin->password;
                } elseif($this->flags != 'a') {
                    $this->flags .= 'e';
                }
            }

            if($this->expired < time()) {
				$this->expired = time();
			}

			switch($this->addtake) {
				case '1':
					$this->expired = $this->expired - ((int)$this->change * 86400);
					$this->days = $this->days - (int)$this->change;
					break;
				case '0':
                    $this->expired = (int)$this->expired + ((int)$this->change * 86400);
					$this->days = $this->days + (int)$this->change;
					break;
				default:
					$this->expired = 0;
					$this->days = 0;
			}
		}
		return parent::beforeSave();
	}

	protected function afterValidate() {

		if ($this->scenario == 'buy') {
            return true;
        }

        if (!$this->access) {
            $this->addError('access', 'Изберете флаг за достъп');
        }

        if($this->isNewRecord && $this->flags === 'a' && !$this->password) {
            $this->addError('password', 'За админ панела по псевдоним трябва да посочите парола');
        }

		if ($this->flags === 'd' && !filter_var($this->steamid, FILTER_VALIDATE_IP, array('flags' => FILTER_FLAG_IPV4))) {
            $this->addError('steamid', 'Въведен е грешен IP');
        }

        if ($this->flags === 'c' && !Prefs::validate_value($this->steamid, 'steamid')) {
            $this->addError('steamid', 'Въведен е неправилен SteamID');
        }

        if ($this->password && !preg_match('#^([a-z0-9]+)$#i', $this->password)) {
			$this->addError ('password', 'Паролата може да съдържа само латински букви и цифри');
		}

        if(!$this->isNewRecord && $this->days < $this->change && $this->addtake === '1')
		{
			$this->addError ('', 'Грешка! Не може да отнеме повече дни, отколкото вече има');
		}

        if(empty($this->servers)) {
            $this->addError ('servers', 'Моля, изберете поне един сървър');
        }

        if($this->hasErrors()) {
            return $this->getErrors();
        }

		return parent::afterValidate();
	}

	public static function getAuthType($get = false)
	{
		$flags = array(
			'a' => 'Ник',
			'c' => 'SteamID',
			'd' => 'IP'
		);
		if($get) {
            $flag = $get[0];
			if(isset($flags[$flag])) {
                $return = $flags[$flag];
                if(!isset($get[1])) {
                    $return .= ' + парола';
                }
				return $return;
			}
			return 'Неизвестно';
		}
		return $flags;
	}

	public function getLong()
	{
		$long = $this->expired - time();
		if ($this->expired == 0 || $long < 0) {
            return false;
        }

        return intval($long / 86400);
	}

	public function afterSave() {

		if(!empty($this->servers) && $this->isNewRecord) {
			foreach($this->servers as $is) {
				$inservers = new AdminsServers;
				$inservers->unsetAttributes();
				if (!Serverinfo::model()->findByPk($is)) {
                    continue;
                }

                $inservers->admin_id = $this->id;
				$inservers->server_id = intval($is);
				$inservers->use_static_bantime = 'no';
				if (!$inservers->save()) {
                    continue;
                }
            }
		}

		if ($this->isNewRecord) {
            Syslog::add(Logs::LOG_ADDED, 'Добавлен новый AmxModX админ <strong>' . $this->nickname . '</strong>');
        } else {
            Syslog::add(Logs::LOG_EDITED, 'Изменены детали AmxModX админ <strong>' . $this->nickname . '</strong>');
        }
        return parent::afterSave();
	}

	public function afterDelete() {
        AdminsServers::model()->deleteAllByAttributes(array('admin_id' => $this->id));
		Syslog::add(Logs::LOG_DELETED, 'Удален AmxModX админ <strong>' . $this->nickname . '</strong>');
		return parent::afterDelete();
	}
}
