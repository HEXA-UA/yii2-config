<?php
/**
 * ArrayProviderTest
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\tests\unit\component\providers;

use hexaua\yiiconfig\component\providers\ArrayProvider;
use hexaua\yiiconfig\tests\unit\TestUnit;

/**
 * Class ArrayProviderTest
 */
class ArrayProviderTest extends TestUnit
{
    /**
     * Test array provider get function.
     */
    public function testGet()
    {
        $this->specify("ArrayProvider should return exist values by key", function () {
            $provider = new ArrayProvider($this->getData());

            verify($provider->get('a'))->equals('a');
            verify($provider->get('b'))->equals('b');
            verify($provider->get('c'))->null();
        });
    }

    /**
     * test array provider initialize function.
     */
    public function testInitialize()
    {
        $this->specify("ArrayProvider initialize should return all data", function () {
            $provider = new ArrayProvider($this->getData());
            verify($provider->initialize())->equals($this->getData());
        });
    }

    /**
     * @return array
     */
    private function getData()
    {
        return [
            'a' => 'a',
            'b' => 'b'
        ];
    }
}
