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
use hexa\yiiconfig\models\Key;
use hexa\yiiconfig\tests\unit\TestUnit;

/**
 * Trait KeyTest
 */
class KeyTest extends TestUnit
{
    use Specify;

    /**
     * Test group default list.
     */
    public function testGetAttributes()
    {
        $key = $this->getMockedClass(Key::className(), ['attributes', 'safeAttributes', 'rules']);

        $key->expects($this->any())
            ->method('attributes')
            ->willReturn(['name', 'group', 'type']);
        $key->expects($this->any())
            ->method('safeAttributes')
            ->willReturn(['name', 'group', 'type']);

        $key->setAttributes([
            'name'  => 'key-name',
            'group' => 'key-group',
            'type'  => 'key-type',
        ]);
        codecept_debug($key->getName());
        codecept_debug($key->getGroup());
        codecept_debug($key->getType());

        verify($key->getName())->equals('key-name');
        verify($key->getGroup())->equals('key-group');
        verify($key->getType())->equals('key-type');
    }

    /**
     * Verify table name.
     */
    public function testTableName()
    {
        verify(Key::tableName())->equals('{{%keys}}');
    }
}
