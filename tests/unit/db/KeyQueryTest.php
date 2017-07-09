<?php
/**
 * KeyQueryTest
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit\db;

use AspectMock\Test;
use hexa\yiiconfig\db\KeyQuery;
use hexa\yiiconfig\models\Key;
use hexa\yiiconfig\tests\unit\TestUnit;

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
