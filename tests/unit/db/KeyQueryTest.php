<?php
/**
 * KeyQueryTest
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\tests\unit\db;

use AspectMock\Test;
use hexaua\yiiconfig\db\KeyQuery;
use hexaua\yiiconfig\models\Key;
use hexaua\yiiconfig\tests\unit\TestUnit;

/**
 * Class KeyQueryTest
 */
class KeyQueryTest extends TestUnit
{
    /**
     * Test byName method.
     * @see KeyQuery::byName()
     */
    public function testByName()
    {
        $this->specify("KeyQuery byName method should called byAttribute method", function () {
            $query = new KeyQuery(Key::className());
            $query = test::double($query);

            $query->byName('name');
            $query->verifyInvoked('byAttribute');
        });
    }
}
