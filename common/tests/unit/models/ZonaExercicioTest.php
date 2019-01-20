<?php namespace common\tests;

use common\models\Admin;
use common\models\ZonaExercicio;

class ZonaExercicioTest extends \Codeception\Test\Unit
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


    public function testWrongZona()
    {
        $zona_exercicio = new ZonaExercicio();

        $zona_exercicio->nome = null;
        $this->assertFalse($zona_exercicio->validate(['nome']));

        $zona_exercicio->nome = 'a';
        $this->assertFalse($zona_exercicio->validate(['nome']));

        $zona_exercicio->nome = 'NomeMuitoLongoooooooooooooooooooooo';
        $this->assertFalse($zona_exercicio->validate(['nome']));

        $zona_exercicio->nome = 'Pernas';
        $this->assertFalse($zona_exercicio->validate(['nome']));

    }

    public function testCorrectZona()
    {
        $zona_exercicio = new ZonaExercicio();

        $zona_exercicio->nome = 'Nome que nao existe';
        $this->assertTrue($zona_exercicio->validate(['nome']));
    }
}
