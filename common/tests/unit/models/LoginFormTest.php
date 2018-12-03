<?php

namespace common\tests\unit\models;

use Yii;
use common\models\LoginForm;
use common\fixtures\UserFixture;

/**
 * Login form test
 */
class LoginFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;


    /**
     * @return array
     */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ];
    }

    public function testNoUser()
    {
        $model = new LoginForm([
            'primeiroNome' => 'not_existing_username',
            'ultimoNome' => 'not_existing_password',
        ]);

        expect('Error', $model->login())->false();
        expect('User should not be logged in', Yii::$app->user->isGuest)->true();
    }

    public function testWrongPassword()
    {
        $model = new LoginForm([
            'password' => ''
        ]);

        expect('Incorrect Password', $model->errors)->hasKey('password');

    }

    public function testLoginCorrect()
    {
        $model = new LoginForm([
            'primeiroNome' => 'Gonçalo',
            'ultimoNome' => 'Amaro',
            'password' => 'asdqwe123',
        ]);

        expect('User Logged in!', $model->login())->true();
    }
}
