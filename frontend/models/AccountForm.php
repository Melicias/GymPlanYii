<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class AccountForm extends Model
{


    public $primeiroNome;
    public $ultimoNome;
    public $email;
    public $password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['primeiroNome', 'required' ],
            ['primeiroNome', 'string', 'min' => 3, 'max' => 60],

            ['ultimoNome', 'required'],
            ['ultimoNome', 'string', 'min' => 3, 'max' => 60],

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
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}
