<?php
/**
 * GroupSearchTest
 * @version     1.0.0-alpha.3
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\tests\unit\models\search;

use hexa\yiiconfig\models\search\GroupSearch;

/**
 * Class GroupSearchTest
 */
class GroupSearchTest extends SearchTest
{
    /**
     * @return string
     */
    public function getModelClass()
    {
        return GroupSearch::className();
    }
}
