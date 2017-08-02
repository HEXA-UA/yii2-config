<?php
/**
 * GroupServiceTest
 * @version     1.0.0-alpha.3
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit\services;

use AspectMock\Test;
use hexa\yiiconfig\services\GroupService;
use hexa\yiiconfig\tests\unit\TestUnit;

/**
 * Class GroupServiceTest
 */
class GroupServiceTest extends TestUnit
{
    /**
     * Test get list service function.
     */
    public function testGetList()
    {
        $service = test::double(new GroupService(), [
            'list' => [
                'a' => 'a',
                'b' => 'c'
            ]
        ]);

        verify($service->list())->hasKey('a');
        verify($service->list())->hasKey('b');
    }
}
