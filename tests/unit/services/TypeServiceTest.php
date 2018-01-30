<?php
/**
 * TypeServiceTest
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\tests\unit\services;

use hexaua\yiiconfig\services\TypeService;
use hexaua\yiiconfig\tests\unit\TestUnit;

/**
 * Class TypeServiceTest
 */
class TypeServiceTest extends TestUnit
{
    /**
     * Test get list service function.
     */
    public function testGetList()
    {
        $service = new TypeService();

        verify($service->list())->equals([
            'string'  => 'string',
            'integer' => 'integer',
            'boolean' => 'boolean',
            'float'   => 'number',
            'email'   => 'email',
            'ip'      => 'ip',
            'url'     => 'url',
        ]);
    }
}
