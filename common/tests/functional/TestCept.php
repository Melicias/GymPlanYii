<?php
namespace common\tests\Functional;
use common\tests\FunctionalTester;


class TestCept
{
    public function Teste(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->click('Sign Up');
        $I->submitForm('#signup', ['primeiroNome' => 'Gonçalo', 'ultimoNome' => 'Amaro', 'email' => 'goncalo.amaro@hotmail.com']);
        $I->see('Thank you for Signing Up!');
        $I->seeEmailSent('goncalo.amaro@hotmail.com', 'Thank you for registration');
        $I->seeInDatabase('users', ['email' => 'goncalo.amaro@hotmail.com']);
    }
}

