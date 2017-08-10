<?php
/**
 * GroupTest
 * @version     1.0.0-alpha.5
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
     * Verify table name.
     */
    public function testTableName()
    {
        verify(Group::tableName())->equals('{{%settings_groups}}');
    }

    /**
     * Test get name function.
     */
    public function testGetName()
    {
        $group = $this->getMockGroup();
        $group->setAttributes([
            'name' => 'group-name',
        ]);
        codecept_debug($group->getName());

        verify($group->getName())->equals('group-name');
    }

    /**
     * Test be
     */
    public function testBeforeSave()
    {
        /** @var Group $group */
        $group = $this->getMockGroup();
        $this->specify("Group Core can not be deleted", function () use ($group) {
            $group->setAttribute('name', Group::CORE);
            verify($group->beforeDelete())->false();
        });

        $this->specify("Group Core can not be updated", function () use ($group) {
            $group->setOldAttribute('name', Group::CORE);
            verify($group->beforeSave(true))->false();
        });
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function getMockGroup()
    {
        $group = $this->getMockedClass(Group::className(), ['attributes', 'safeAttributes', 'rules']);

        $group->expects($this->any())
            ->method('attributes')
            ->willReturn(['name']);
        $group->expects($this->any())
            ->method('safeAttributes')
            ->willReturn(['name']);

        return $group;
    }
}
