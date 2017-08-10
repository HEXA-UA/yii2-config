<?php
/**
 * ActiveRecordTesterTrait
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit;

/**
 * Trait ActiveRecordTesterTrait
 */
trait ActiveRecordTrait
{
    /**
     * @param string $className
     * @param array  $methods
     *
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function getMockedClass($className, $methods = [])
    {
        $mock = $this->getMockBuilder($className)
            ->setMethods((array)$methods)
            ->getMock();

        return $mock;
    }
}
