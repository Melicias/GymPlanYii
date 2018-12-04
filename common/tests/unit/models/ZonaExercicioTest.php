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
        $zona_exercicio = new ZonaExercicio([
            'nome' => 'A'
        ]);

        expect('Incorrect Zona', $zona_exercicio->errors);

    }

    public function testCorrectZona()
    {
        $zona_exercicio = new ZonaExercicio([
            'nome' => 'Pernas',
        ]);

        expect('Created Zona', $zona_exercicio->validate('nome'));
    }
}
