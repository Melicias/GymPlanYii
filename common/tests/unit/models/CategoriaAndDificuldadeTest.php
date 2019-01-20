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
    public function testCategoria()
    {
        $categoria = new Categoria();

        $categoria-> nome = 'verificacaoDe31CaracteresSeTemMaisDaErro';
        $this->assertFalse($categoria->validate(['nome']));

        $categoria->nome = 'Perda de peso';
        $this->assertFalse($categoria->validate(['nome']));

        $categoria->nome = 'Cardio';
        $this->assertFalse($categoria->validate(['nome']));

        $categoria->nome = 'Abdominal 2';
        $this->assertTrue($categoria->validate(['nome']));

        $categoria->nome = '';
        $this->assertFalse($categoria->validate(['nome']));

    }

    public function testDificuldade()
    {

        $dificuldade = new Dificuldade();

        $dificuldade-> dificuldade = -2;
        $this->assertFalse($dificuldade->validate(['dificuldade']));

        $dificuldade-> dificuldade = 2;
        $this->assertFalse($dificuldade->validate(['dificuldade']));

        $dificuldade-> dificuldade = 11;
        $this->assertFalse($dificuldade->validate(['dificuldade']));

        $dificuldade-> dificuldade = 10;
        $this->assertTrue($dificuldade->validate(['dificuldade']));

    }
}