<?php
/**
 * KeySearchTest
 * @version     1.0.0-alpha.5
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexaua\yiiconfig\tests\unit\models\search;

use hexaua\yiiconfig\models\search\KeySearch;

/**
 * Class KeySearchTest
 */
class KeySearchTest extends SearchTest
{
    /**
     * @return string
     */
    public function getModelClass()
    {
        return KeySearch::className();
    }
}
