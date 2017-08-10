<?php
/**
 * ActiveQueryTest
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit\db;

use hexa\yiiconfig\db\ActiveQuery;
use hexa\yiiconfig\tests\unit\TestUnit;

/**
 * Class ActiveQueryTest
 */
class ActiveQueryTest extends TestUnit
{
    /**
     * Test ActiveQuery base methods.
     */
    public function testBaseMethods()
    {
        $this->specify("ActiveQuery Not function should call andWhere", function () {
            $query = $this->getActiveQuery()->not('attribute', 'value');
            verify($query->where)->equals(['NOT', ['attribute' => 'value']]);
        });

        $this->specify("ActiveQuery orNot function should call andWhere", function () {
            $query = $this->getActiveQuery()->where(['a' => 'a'])->orNot('attribute', 'value');
            verify($query->where[0])->equals('or');
        });

        $this->specify("ActiveQuery notNull function should call andWhere", function () {
            $query = $this->getActiveQuery()->notNull('a');
            verify($query->where)->equals(['NOT', ['a' => null]]);
        });

        $this->specify("ActiveQuery byId function should call andWhere", function () {
            $query = $this->getActiveQuery()->byId(111);
            verify($query->where)->equals(['id' => 111]);
        });
    }

    /**
     * @return ActiveQuery
     */
    private function getActiveQuery()
    {
        return new ActiveQuery(ActiveRecord::className());
    }
}
