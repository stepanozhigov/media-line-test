<?php

namespace app\modules\api\models;

use app\models\api\resources\UserResource;
use app\models\User;
use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SignupForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;
    public $_user = false;


    public function rules() {
        return [
            [['username','password','password_repeat'],'required'],
            [['username','password','password_repeat'],'string','min'=>4, 'max'=>16],
            [['password_repeat'],'string','min'=>4, 'max'=>16],
            ['password_repeat','compare','compareAttribute'=>'password']
        ];
    }
    public function register() {
        if($this->validate()) {
            $this->_user = new User();
            $this->_user->username = $this->username;
            $this->_user->password = \Yii::$app->security->generatePasswordHash($this->password);
            $this->_user->access_token = \Yii::$app->security->generateRandomString();
            $this->_user->auth_key = \Yii::$app->security->generateRandomString();
            if($this->_user->save()) {
                return true;
            }
            return false;
        }
        return false;
    }
}
