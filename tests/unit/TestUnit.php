<?php
/**
 * TestUnit
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit;

use AspectMock\Test;
use Codeception\Specify;
use Codeception\Test\Unit;

/**
 * Class TestUnit
 */
class TestUnit extends Unit
{
    use Specify;
    use ActiveRecordTrait;

    /**
     * @inheritdoc
     */
    protected function _after()
    {
        Test::clean();
    }
}
