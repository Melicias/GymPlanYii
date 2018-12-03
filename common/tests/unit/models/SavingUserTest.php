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

        $user->ultimoNome = 'Marco';
        $this->assertTrue($user->validate(['ultimoNome']));

    }
}