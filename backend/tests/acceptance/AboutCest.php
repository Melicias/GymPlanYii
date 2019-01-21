<?php
namespace backend\tests\acceptance;

use yii\helpers\Url;
use backend\tests\AcceptanceTester;

class AboutCest
{
    public function ensureThatAboutWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/about'));
        $I->see('Sobre', 'h1');
    }
}
