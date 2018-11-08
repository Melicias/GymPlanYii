<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $primeiroNome;
    public $ultimoNome;
    public $dataNascimento;
    public $altura;
    public $peso;
    public $sexo;
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        ['primeiroNome', 'required'],
        ['primeiroNome', 'string', 'min' => 2, 'max' => 255],

        ['ultimoNome', 'required'],
        ['ultimoNome', 'string', 'min' => 2, 'max' => 255],

        ['dataNascimento', 'trim'],

        ['altura', 'trim'],

        ['peso', 'trim'],
        ['peso', 'required'],
        ['peso', 'string', 'min' => 2, 'max' => 255],

        ['sexo', 'trim'],
        ['sexo', 'required'],
        ['sexo', 'boolean'],

        ['email', 'trim'],
        ['email', 'required'],
        ['email', 'email'],
        ['email', 'string', 'max' => 255],
        ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

        ['password', 'required'],
        ['password', 'string', 'min' => 5],
    ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        var_dump($this);
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect email or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided email and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    /**
     * Finds user by [[email]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }
}
