<?php
namespace common\tests\models;

use common\models\Categoria;
use common\models\Dificuldade;

class CategoriaAndDificuldadeTest extends \Codeception\Test\Unit
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
        $categoria = new Categoria();

        $categoria-> nome = '0123456789012345678901234567890';
        $this->assertFalse($categoria->validate(['nome']));

        $categoria->nome = 'Pernas';
        $this->assertTrue($categoria->validate(['nome']));

        $dificuldade = new Dificuldade();

        $dificuldade-> dificuldade = -2;
        $this->assertFalse($dificuldade->validate(['dificuldade']));

        $dificuldade-> dificuldade = 1; //error caused by DB already has dificuldade 1
        $this->assertTrue($dificuldade->validate(['dificuldade']));

    }
}