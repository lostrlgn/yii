<?php
namespace app\models;

use Symfony\Component\VarDumper\VarDumper as VarDumperVarDumper;
use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

class RegisterForm extends Model
{
    public string $name = '';
    public string $surname = '';
    public string $patronymic = '';
    public string $login = '';
    public string $email = '';
    public string $phone = '';
    public string $password = '';
    public string $password_repeat = '';
    public bool $rules = false;

    public function rules()
    {
        return [
            [ ['name', 'surname', 'login', 'email', 'phone', 'password', 'password_repeat'], 'required'],
            [ ['name', 'surname', 'patronymic', 'login', 'email', 'phone', 'password', 'password_repeat'], 'string', 'max' =>  255 ],
            [['name', 'surname', 'patronymic'] ,'match', 'pattern' => '/^[а-яё\s\-]+$/ui', 'message' => 'Только кирилицца, пробел, тире'],
            [['login'] ,'match', 'pattern' => '/^[a-z\d\-]+$/ui', 'message' => 'Только кирилицца, пробел, тире'],
            ['email', 'email'],
            [['password'] ,'string', 'min' => 6],
            [['password'] ,'match', 'pattern' => '/^[a-z0-9]{6,}$/i', 'message' => 'Не менее 6 символов'],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password'],
            ['rules', 'required', 'requiredValue' => 1, 'message' => 'Необходимо согласиться с правилами регистации'],
            // ['phone', 'match', 'pattern' => '/^\+7\([\d]{3}\)\-[\d]{3}(\-[\d]{2}){2}$/'],
            [['login'], 'unique', 'targetClass' => User::class]
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => '',
            'login' => 'Логин',
            'email' => 'Email',
            'phone' => 'Телефон',
            'password' => 'Пароль',
            'password_repeat' => 'Повтор пороля',
            'rules' => 'Согласие с правилами регистрации',
        ];
    }
    public function register(): object | bool
    {
        if($this->validate()){
            $user = new User();
            // $user->name = $this->name;
            $user->load($this->attributes, '');
            $user->role_id = Role::getRoleId('user');
            $user->password = Yii::$app->security->generatePasswordHash($user->password);
            $user->auth_key = Yii::$app->security->generateRandomString();
            if (! $user->save()){
                VarDumper::dump($user->errors);

            }
            VarDumper::dump($user->attributes);

        } else {
            // VarDumper::dump($this->errors);die;
        }
        return $user ?? false;
    }
}