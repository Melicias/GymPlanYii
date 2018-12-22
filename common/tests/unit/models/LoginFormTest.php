<?php

namespace common\tests\unit\models;

use Yii;
use common\models\LoginForm;

/**
 * Login form test
 */
class LoginFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;


    public function testNoUser()
    {
        $model = new LoginForm([
            'email' => 'not_existing_email@gmail.com',
            'password' => 'not_existing_password',
        ]);

        expect('Error', $model->login())->false();
        expect('User should not be logged in', Yii::$app->user->isGuest)->true();
    }

    public function testExistUser()
    {
        $model = new LoginForm([
            'email' => 'melicias1999@gmail.com',
            'password' => 'melicias',
        ]);

        expect('Error', $model->login())->true();
        expect('User should be logged in', Yii::$app->user->isGuest)->false();
    }

    public function testWrongPassword()
    {
        $model = new LoginForm([
            'password' => '',
            'email' => 'melicias1999@gmail.com',
        ]);

        expect('Incorrect Password', $model->errors);

    }

    public function testLoginCorrect()
    {
        $model = new LoginForm([
            'email' => 'melicias1999@gmail.com',
            'password' => 'melicias',
        ]);

        expect('User Logged in!', $model->login())->true();
    }

    public function testLoginIncorrect()
    {
        $model = new LoginForm([
            'email' => 'melicias1999@gmail.com',
            'password' => 'meliciassssss',
        ]);

        expect('User Logged in!', $model->login())->false();
    }
}
