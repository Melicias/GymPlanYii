<?php namespace common\tests\models;

use common\models\Calculadora;

class CategoriaTest extends \Codeception\Test\Unit
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
        $calculadora = new Calculadora(5,5);
        $this->assertEquals(10,$calculadora->soma());
    }
}