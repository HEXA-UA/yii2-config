<?php
/**
 * KeyTest
 * @version     1.0.0-alpha.4
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit\traits;

use hexa\yiiconfig\models\Type;
use hexa\yiiconfig\tests\unit\TestUnit;

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
