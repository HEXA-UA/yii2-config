<?php
/**
 * GroupTest
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit\traits;

use hexa\yiiconfig\models\Group;
use hexa\yiiconfig\tests\unit\TestUnit;

/**
 * Trait GroupTest
 */
class GroupTest extends TestUnit
{
    /**
     * Test group default list.
     */
    public function testGetList()
    {
        $list = Group::list();
        codecept_debug($list);

        verify($list)->contains('core');
    }

    /**
     * Verify table name.
     */
    public function testTableName()
    {
        verify(Group::tableName())->equals('{{%settings_groups}}');
    }
}
