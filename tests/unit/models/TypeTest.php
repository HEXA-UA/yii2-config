<?php
/**
 * KeyTest
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\tests\unit\traits;

use hexaua\yiiconfig\models\Type;
use hexaua\yiiconfig\tests\unit\TestUnit;

/**
 * Trait KeyTest
 */
class TypeTest extends TestUnit
{
    /**
     * Verify table name.
     */
    public function testTableName()
    {
        verify(Type::tableName())->equals('{{%types}}');
    }
}
