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

use hexa\yiiconfig\component\providers\DbProvider;
use hexa\yiiconfig\tests\unit\TestUnit;
use yii\base\InvalidParamException;

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
        $this->beforeSpecify(function () {
            $this->mockApplication();
        });

        $this->specify("Provider initialize function should load and return all data", function () {
            verify($this->getProvider()->initialize())->isEmpty();
        });
    }

    /**
     * Test get function.
     */
    public function testGet()
    {
        $this->specify("Provider should throw InvalidParamException with incorrect key", function () {
            $this->expectException(InvalidParamException::class);
            $this->getProvider()->get("incorrectValue");
        });
    }

    /**
     * @return DbProvider
     */
    protected function getProvider()
    {
        return new DbProvider();
    }
}
