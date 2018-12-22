<?php namespace common\tests;

use common\models\User;

class SavingUserTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $user = new User();

        $user->primeiroNome = null;
        $this->assertFalse($user->validate(['primeiroNome']));

        $user->primeiroNome = 'NomeMuitoLongooooooooooooo';
        $this->assertFalse($user->validate(['primeiroNome']));

        $user->primeiroNome = 'a';
        $this->assertFalse($user->validate(['primeiroNome']));

        $user->primeiroNome = 'Maria';
        $this->assertTrue($user->validate(['primeiroNome']));

        $user->ultimoNome = null;
        $this->assertFalse($user->validate(['ultimoNome']));

        $user->ultimoNome = 'NomeMuitoLongooooooooooooo';
        $this->assertFalse($user->validate(['ultimoNome']));

        $user->ultimoNome = 'b';
        $this->assertFalse($user->validate(['ultimoNome']));

        $user->ultimoNome = 'Marco';
        $this->assertTrue($user->validate(['ultimoNome']));

        $user->email = 'melicias1999@gmail.com';
        $this->assertFalse($user->validate(['email']));

        $user->email = null;
        $this->assertfalse($user->validate(['email']));

        $user->email = 'um_emailQue_naoexiste@gmail.com';
        $this->assertTrue($user->validate(['email']));

        $user->altura = null;
        $this->assertFalse($user->validate(['altura']));

        $user->altura = 'aaa';
        $this->assertFalse($user->validate(['altura']));

        $user->altura = 1.70;
        $this->assertTrue($user->validate(['altura']));

        $user->peso = null;
        $this->assertFalse($user->validate(['peso']));

        $user->peso = 'bbb';
        $this->assertFalse($user->validate(['peso']));

        $user->peso = 80;
        $this->assertTrue($user->validate(['peso']));
    }
}