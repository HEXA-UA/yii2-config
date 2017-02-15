<?php
/**
 * Setting
 * @version     0.1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 */

namespace Tapakan\Settings\Tests\unit\data;

use yii\db\ActiveRecord;

/**
 * Class Setting
 */
class Setting extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }
}
