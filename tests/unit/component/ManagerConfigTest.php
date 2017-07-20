<?php
/**
 * ManagerConfigTest
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit\component;

use hexa\yiiconfig\component\ManagerConfig;
use hexa\yiiconfig\tests\unit\TestUnit;
use yii\base\NotSupportedException;

/**
 * Class ManagerConfigTest
 */
class ManagerConfigTest extends TestUnit
{
    /**
     * Test add group method.
     */
    public function testAddGroup()
    {
        $this->expectException(NotSupportedException::class);
        $this->getManager()->addGroup('name');
    }

    /**
     * Test add key method.
     */
    public function testAddKey()
    {
        $this->expectException(NotSupportedException::class);
        $this->getManager()->addKey('name');
    }

    /**
     * Return instance of config manager.
     * @return ManagerConfig
     */
    protected function getManager()
    {
        return new ManagerConfig();
    }
}
