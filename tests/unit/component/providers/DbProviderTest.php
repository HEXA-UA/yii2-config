<?php
/**
 * DbProviderTest
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit\component\providers;

use hexa\yiiconfig\component\providers\ArrayProvider;
use hexa\yiiconfig\tests\unit\TestUnit;

/**
 * Class DbProviderTest
 */
class DbProviderTest extends TestUnit
{
    /**
     * Test initialize function.
     */
    public function testInitialize()
    {
        $this->specify("Provider initialize function should load ajd return all data", function () {
            $data = $this->getProvider()->initialize();
            codecept_debug($data);
            verify($data)->hasKey('first.Key');
            verify($data)->hasKey('second.Key');
        });
    }

    /**
     * Test get function.
     */
    public function testGet()
    {
        $this->specify("Provider get function should return correct value", function () {
            $provider = $this->getProvider();
            verify($provider->get('first.Key'))->equals('firstValue');
            verify($provider->get('second.Key'))->equals('secondValue');
        });

        $this->specify("Provider get function should return default value if key not exist", function () {
            $provider = $this->getProvider();
            verify($provider->get('unknownKey', 'defaultValue'))->equals('defaultValue');
        });
    }

    /**
     * @return ArrayProvider
     */
    protected function getProvider()
    {
        return new ArrayProvider([
            'first.Key'  => 'firstValue',
            'second.Key' => 'secondValue',
        ]);
    }
}
