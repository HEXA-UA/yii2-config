<?php
/**
 * SearchModelTraitTest
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\tests\unit\traits;

use hexaua\yiiconfig\tests\unit\TestUnit;
use hexaua\yiiconfig\traits\SearchModelTrait as TraitModel;


/**
 * Trait SearchModelTraitTest
 */
class SearchModelTraitTest extends TestUnit
{
    /**
     * Test default value of trait.
     */
    public function testDefaultDataProvider()
    {
        $mock = $this->getMockedTrait();

        $mock->expects($this->once())
            ->method('getDataProvider')
            ->willReturn(new \stdClass());

        $mock->expects($this->once())
            ->method('load')
            ->willReturn(false);

        verify($mock->search([]))->isInstanceOf(\stdClass::class);
    }

    public function testAddClosureFilter()
    {
        $mock = $this->getMockedTrait();

        $mock->expects($this->once())
            ->method('getDataProvider')
            ->willReturn('anonymous');

        $mock->expects($this->once())
            ->method('load')
            ->willReturn(true);

        $mock->expects($this->once())
            ->method('validate')
            ->willReturn(true);

        $mock->search([], [], function ($dataProvider) {
            verify($dataProvider)->equals('anonymous');
        });
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockedTrait()
    {
        return $this->getMockForTrait(
            TraitModel::class,
            [],
            '',
            true,
            true,
            true,
            [
                'getDataProvider',
                'load',
                'validate'
            ]
        );
    }
}
