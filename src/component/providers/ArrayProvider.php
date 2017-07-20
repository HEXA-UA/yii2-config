<?php
/**
 * ArrayProvider
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\component\providers;

/**
 * Class ArrayProvider
 */
class ArrayProvider extends BaseProvider
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * ArrayProvider constructor.
     * @inheritdoc
     *
     * @param array $data
     */
    public function __construct(array $data = [], array $config = [])
    {
        parent::__construct($config);

        $this->data = $data;
    }

    /**
     * @inheritdoc
     */
    public function get($key, $default = null)
    {
        return isset($this->data[$key]) ? $this->data[$key] : $default;
    }

    /**
     * @inheritdoc
     */
    public function initialize()
    {
        return $this->data;
    }
}
