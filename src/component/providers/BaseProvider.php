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

use hexa\yiiconfig\component\CollectionInterface;
use yii\base\InvalidValueException;
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
     * @var CollectionInterface
     */
    private $collection;

    /**
     * @return $this
     * @throws InvalidValueException
     */
    public function load()
    {
        $this->collection = $this->initialize();
        if (!$this->collection instanceof CollectionInterface) {
            throw new InvalidValueException("Collection property should be instance of CollectionInterface");
        }

        return $this;
    }

    /**
     * @return CollectionInterface
     */
    abstract public function initialize();
}
