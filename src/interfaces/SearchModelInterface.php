<?php
/**
 * SearchModelInterface
 * @version     1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 * @copyright   Copyright (C) Hexa,  All rights reserved.
 */

namespace hexa\yiiconfig\interfaces;

use yii\data\DataProviderInterface;

/**
 * Interface SearchModelInterface
 */
interface SearchModelInterface
{
    /**
     *
     * @param array         $queryParams    Params from request.
     * @param array         $providerParams Provider config.
     * @param \Closure|null $searchCallback Callback for filtering.
     *
     * @return DataProviderInterface
     */
    public function search(array $queryParams, array $providerParams = [], \Closure $searchCallback = null);
}
