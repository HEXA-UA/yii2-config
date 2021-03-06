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

use Codeception\Specify;
use hexaua\yiiconfig\models\Key;
use hexaua\yiiconfig\tests\unit\TestUnit;
use yii\db\ActiveQueryInterface;

/**
 * Class KeyTest
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
            ->willReturn(['name', 'type', 'description']);
        $key->expects($this->any())
            ->method('safeAttributes')
            ->willReturn(['name', 'type', 'description']);

        $key->setAttributes([
            'name'        => 'key-name',
            'type'        => 'key-type',
            'description' => 'key-description',
        ]);

        codecept_debug($key->getName());
        codecept_debug($key->getType());
        codecept_debug($key->getDescription());

        verify($key->getName())->equals('key-name');
        verify($key->getType())->equals('key-type');
        verify($key->getDescription())->equals('key-description');
    }

    /**
     * Test static find method. Must return KeyQuery class.
     */
    public function testFind()
    {
        verify(Key::find())->isInstanceOf(ActiveQueryInterface::class);
    }

    /**
     * Verify table name.
     */
    public function testTableName()
    {
        verify(Key::tableName())->equals('{{%settings_keys}}');
    }
}
