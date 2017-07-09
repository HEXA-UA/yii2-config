<?php
/**
 * CollectionInterface
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\component;

/**
 * Interface CollectionInterface
 */
interface CollectionInterface extends \IteratorAggregate, \Serializable, \Countable
{
    /**
     * @param mixed  $data
     * @param string $key
     *
     * @return $this
     */
    public function add($data, $key);

    /**
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function remove($key, $default = null);

    /**
     * Check if the value exist in collection by key.
     *
     * @param string $key
     *
     * @return bool
     */
    public function has($key);

    /**
     * Create array from collection.
     * @return array
     */
    public function toArray();

    /**
     * Set new collection.
     *
     * @param Object[] $data
     *
     * @return $this
     */
    public function setCollection(array $data);

    /**
     * Remove all objects.
     * @return $this
     */
    public function empty();
}
