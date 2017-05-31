<?php
/**
 * KeyTest
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit\traits;

use Codeception\Specify;
use hexa\yiiconfig\models\Type;
use hexa\yiiconfig\tests\unit\TestUnit;

/**
 * Trait KeyTest
 */
class TypeTest extends TestUnit
{
    use Specify;

    /**
     * Test that type list is not empty.
     */
    public function testList()
    {
        verify(Type::list())->greaterThan(1);
    }

    /**
     * Verify table name.
     */
    public function testTableName()
    {
        verify(Type::tableName())->equals('{{%types}}');
    }
}
