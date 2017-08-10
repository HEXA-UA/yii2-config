<?php
/**
 * KeyServiceTest
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit\services;

use AspectMock\Test;
use hexa\yiiconfig\services\KeyService;
use hexa\yiiconfig\tests\unit\TestUnit;

/**
 * Class KeyServiceTest
 */
class KeyServiceTest extends TestUnit
{
    /**
     * Test get list service function.
     */
    public function testGetList()
    {
        $service = test::double(new KeyService(), [
            'list' => [
                'a' => 'a',
                'b' => 'c'
            ]
        ]);

        verify($service->list())->hasKey('a');
        verify($service->list())->hasKey('b');
    }
}
