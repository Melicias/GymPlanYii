<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $primeiroNome;
    public $ultimoNome;
    public $dataNascimento;
    public $altura;
    public $peso;
    public $sexo;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['primeiroNome', 'required'],
            ['primeiroNome', 'string', 'min' => 3, 'max' => 25],

            ['ultimoNome', 'required'],
            ['ultimoNome', 'string', 'min' => 3, 'max' => 25],

            ['dataNascimento', 'required'],
            ['dataNascimento', 'date' ,'format' => 'php:d-m-Y', 'message' => 'The Format is DD-MM-YYYY'],

            ['altura', 'number', 'min' => 1.00, 'max' => 2.50],
            ['peso', 'required'],
            ['peso', 'number' , 'min' => 25, 'max' => 300],

            ['sexo', 'trim'],
            ['sexo', 'number'],

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
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->primeiroNome = $this->primeiroNome;
        $user->ultimoNome = $this->ultimoNome;
        $user->dataNascimento = Date("Y-m-d h:i:s", strtotime($this->dataNascimento)); //DateTime::createFromFormat('d/m/Y', $this->dataNascimento)->getTimestamp();
        $user->altura = $this->altura;
        $user->peso = $this->peso;
        $user->sexo = $this->sexo;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
