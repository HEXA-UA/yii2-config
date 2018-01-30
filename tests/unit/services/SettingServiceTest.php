<?php
/**
 * SettingServiceTest
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\tests\unit\services;

use AspectMock\Test;
use hexaua\yiiconfig\services\SettingService;
use hexaua\yiiconfig\tests\unit\TestUnit;

/**
 * Class SettingServiceTest
 */
class SettingServiceTest extends TestUnit
{
    /**
     * Test get list service function.
     */
    public function testGetList()
    {
        $service = test::double(new SettingService(), [
            'list' => [
                'a' => 'a',
                'b' => 'c'
            ]
        ]);

        verify($service->list())->hasKey('a');
        verify($service->list())->hasKey('b');
    }
}
