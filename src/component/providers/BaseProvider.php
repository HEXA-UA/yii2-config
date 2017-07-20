<?php
/**
 * BaseProvider
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\component\providers;

use yii\base\Object;

/**
 * Class BaseProvider
 */
abstract class BaseProvider extends Object implements ProviderInterface
{
    /**
     * @var string Current class collection
     */
    public $collectionClass = 'hexa\yiiconfig\component\Collection';

    /**
     * @inheritdoc
     */
    public function initialize()
    {

    }
}
