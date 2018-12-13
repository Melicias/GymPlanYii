<?php
namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

/* @var $scenario \Codeception\Scenario */

class ContactAdminCheckCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage(['site/contact']);
    }

    //Verifica se a página existe
    public function checkContact(FunctionalTester $I)
    {
        $I->see('Contact');
    }

    //Verifica se o admin existe
    public function seeAdmin(FunctionalTester $I)
    {
        $I->seeRecord('common\models\Admin', [
            'primeiroNome' => 'Francisco',
            'ultimoNome' => 'Melicias',
            'email' => 'melicias1999@gmail.com',
        ]);

    }


}
