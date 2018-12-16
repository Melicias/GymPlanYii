<?php
namespace frontend\models;

use DateTime;
use Exception;
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
            [
                ['dataNascimento'],
                'validateUserBirthDate'
            ],
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

    public function validateUserBirthDate($attribute, $params) {
        $date = new \DateTime();
        date_sub($date, date_interval_create_from_date_string('12 years'));
        $minAgeDate = date_format($date, 'Y-m-d');
        date_sub($date, date_interval_create_from_date_string('122 years'));
        $maxAgeDate = date_format($date, 'Y-m-d');
        if ($this->$attribute > $minAgeDate) {
            $this->addError($attribute, 'Deveras ter mais que 12 anos.');
        } elseif ($this->$attribute < $maxAgeDate) {
            $this->addError($attribute, '122 anos e 164 dias - esta é a idade da pessoa mais velha do mundo, se tens mais que esta idade contacta a nossa staff');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'primeiroNome' => 'Primeiro Nome',
            'ultimoNome' => 'Ultimo Nome',
            'dataNascimento' => 'Data Nascimento (dd-mm-aaaa)',
            'altura' => 'Altura (Metros)',
            'peso' => 'Peso (Kg)',
            'sexo' => 'Sexo',
            'email' => 'Email',
            'password' => 'Password',
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
        $user->dataNascimento = Date("Y-m-d H:i:s", strtotime($this->dataNascimento)); //DateTime::createFromFormat('d/m/Y', $this->dataNascimento)->getTimestamp();
        $user->altura = $this->altura;
        $user->peso = $this->peso;
        $user->sexo = $this->sexo;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
