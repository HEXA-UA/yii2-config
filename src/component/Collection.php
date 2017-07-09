<?php
/**
 * Collection
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\component;

use yii\base\Object;

/**
 * Class Collection
 */
class Collection extends Object implements CollectionInterface
{
    /**
     * Storage for collection.
     * @var Object[]
     */
    private $objects = [];

    /**
     * @inheritdoc
     */
    public function __construct($data = [], $config = [])
    {
        parent::__construct($config);

        $this->objects = $data;
    }

    /**
     * @inheritdoc
     */
    public function add($data, $key)
    {
        $this->objects[$key] = $data;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function get($key, $default = null)
    {
        if (array_key_exists($key, $this->objects)) {
            return $this->objects[$key];
        }

        return $default;
    }

    /**
     * @inheritdoc
     */
    public function remove($key, $default = null)
    {
        if (array_key_exists($key, $this->objects)) {
            $default = $this->objects[$key];
            unset($this->objects[$key]);
        }

        return $default;
    }

    /**
     * @inheritdoc
     */
    public function has($key)
    {
        return isset($this->objects[$key]) || array_key_exists($key, $this->objects);
    }

    /**
     * @inheritdoc
     */
    public function setCollection(array $data)
    {
        $this->objects = $data;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function empty()
    {
        $this->objects = [];

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->objects);
    }

    /**
     * @inheritdoc
     */
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    /**
     * @inheritdoc
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * @inheritdoc
     */
    public function offsetSet($offset, $value)
    {
        return $this->add($value, $offset);
    }

    /**
     * @inheritdoc
     */
    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->objects[$offset]);
        }

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function count()
    {
        return count($this->objects);
    }

    /**
     * @inheritdoc
     */
    public function serialize()
    {
        return serialize($this->objects);
    }

    /**
     * @inheritdoc
     */
    public function unserialize($serialized)
    {
        return unserialize($this->objects);
    }

    /**
     * @inheritdoc
     */
    public function toArray()
    {
        return (array)$this->objects;
    }
}
