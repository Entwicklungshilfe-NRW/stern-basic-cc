<?php

namespace startpage;

use AcceptanceTester;

class searchCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->waitForElement('#header-wrapper > div > button');
    }

    // tests
    public function searchAutocompleateWithValidData(AcceptanceTester $I)
    {
        $inputField = '#basics';

        $I->click('#header-wrapper > div > button');
        $I->waitForElementVisible($inputField);

        $autocomplete = 'Handball';
        $I->fillField($inputField, $autocomplete);
        $I->click('#search > ul > li:nth-child(2) > button');
        $I->waitForText('SUCHERGEBNISSE');
        $I->seeInCurrentUrl($autocomplete);
    }
}
