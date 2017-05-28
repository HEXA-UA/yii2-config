<?php
/**
 * SettingTest
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit\traits;

use Codeception\Specify;
use hexa\yiiconfig\models\Key;
use hexa\yiiconfig\models\Setting;
use hexa\yiiconfig\tests\unit\TestUnit;

/**
 * Trait SettingTest
 */
class SettingTest extends TestUnit
{
    use Specify;

    /**
     * Test group default list.
     */
    public function testGetAttributes()
    {
        $setting = $this->getMockedSetting();

        verify($setting->getName())->equals('setting-name');
        verify($setting->getValue())->equals('setting-value');
        verify($setting->getGroup())->equals('setting-group');
        verify($setting->getType())->equals('key-type');
        verify($setting->getKey())->isInstanceOf(Key::className());
    }

    /**
     * Verify table name.
     */
    public function testTableName()
    {
        verify(Setting::tableName())->equals('{{%settings}}');
    }

    /**
     * @return Setting
     */
    protected function getMockedSetting()
    {
        /** @var Setting $setting */
        $setting = $this->getMockedClass(Setting::className(), ['attributes', 'safeAttributes', 'hasOne', 'rules']);

        $setting->expects($this->any())->method('rules')->willReturn([]);
        $setting->expects($this->any())->method('attributes')->willReturn(['name', 'value', 'group']);
        $setting->expects($this->any())->method('safeAttributes')->willReturn(['name', 'value', 'group']);
        $setting->expects($this->any())->method('hasOne')->willReturn($this->getMockedKey());

        $setting->setAttributes([
            'name'  => 'setting-name',
            'value' => 'setting-value',
            'group' => 'setting-group',
        ]);

        codecept_debug($setting->getAttributes());

        return $setting;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockedKey()
    {
        $key = $this->getMockedClass(Key::className(), ['attributes', 'safeAttributes', 'rules']);

        $key->expects($this->any())->method('rules')->willReturn([]);
        $key->expects($this->any())->method('attributes')->willReturn(['group', 'type']);
        $key->expects($this->any())->method('safeAttributes')->willReturn(['group', 'type']);

        $key->setAttributes([
            'type' => 'key-type',
        ]);

        return $key;
    }
}
