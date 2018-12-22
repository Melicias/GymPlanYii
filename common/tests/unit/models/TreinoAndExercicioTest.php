<?php namespace common\tests;

use common\models\Exercicio;
use common\models\Treino;


class TreinoAndExercicioTest extends \Codeception\Test\Unit
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
        $treino = new Treino();


        $treino->nome = null;
        $this->assertFalse($treino->validate(['nome']));

        $treino->descricao = null;
        $this->assertFalse($treino->validate(['descricao']));

        $treino->nome = 'Treino Macho';
        $this->assertTrue($treino->validate(['nome']));

        $treino->nome = 'NomeDoTreinoMuitoLongooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo';
        $this->assertFalse($treino->validate(['nome']));

        $treino->descricao = 'asdasdsadas';
        $this->assertTrue($treino->validate(['descricao']));

        $treino->repeticoes = null;
        $this->assertFalse($treino->validate(['repeticoes']));

        $treino->repeticoes = 'aa';
        $this->assertFalse($treino->validate(['repeticoes']));

        $treino->repeticoes = 10;
        $this->assertTrue($treino->validate(['repeticoes']));


        $exercicio = new Exercicio();


        $exercicio->nome = null;
        $this->assertFalse($exercicio->validate(['nome']));

        $exercicio->nome = 'NomeMuitoLongooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo';
        $this->assertFalse($exercicio->validate(['nome']));

        $exercicio->nome = 'Nome normal';
        $this->assertTrue($exercicio->validate(['nome']));

        $exercicio->foto = null;
        $this->assertFalse($exercicio->validate(['foto']));

        $exercicio->descricao = null;
        $this->assertFalse($exercicio->validate(['descricao']));

        $exercicio->repeticoes = null;
        $this->assertFalse($exercicio->validate(['repeticoes']));

        $exercicio->tempo = 60;
        $this->assertTrue($exercicio->validate(['tempo']));

        $exercicio->id_zona = -1;
        $this->assertFalse($exercicio->validate(['id_zona']));

        $exercicio->id_zona = 1;
        $this->assertTrue($exercicio->validate(['id_zona']));

        //if you insert assertFalse to Tempo, it will return error because repeticoes and tempo can't be both null!!!


        $exercicio->nome = 'Treino Macho';
        $this->assertTrue($exercicio->validate(['nome']));

        $exercicio->foto = 'https://www.dicasdetreino.com.br/wp-content/uploads/2017/10/Treino-de-Peito-e-Triceps-com-Treino-ABC.jpg';
        $this->assertTrue($exercicio->validate(['foto']));

        $exercicio->descricao = 'asdasdsadas';
        $this->assertTrue($exercicio->validate(['descricao']));

        $exercicio->repeticoes = '15';
        $this->assertTrue($exercicio->validate(['repeticoes']));

        $exercicio->tempo = '0';
        $this->assertTrue($exercicio->validate(['tempo']));

    }

}