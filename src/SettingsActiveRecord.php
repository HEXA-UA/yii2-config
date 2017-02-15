<?php
/**
 * Settings component
 * @version     0.1.0
 * @license     http://mit-license.org/
 * @author      Tapakan https://github.com/Tapakan
 * @coder       Alexander Oganov <t_tapak@yahoo.com>
 */

namespace Tapakan\Settings;

use yii\db\ActiveRecord;

/**
 * Class Settings
 */
class SettingsActiveRecord extends AbstractSettings
{
    /**
     * ActiveRecord class name
     * @var string
     */
    public $settingsClass;

    /**
     * Column name that represents a key
     * @var string
     */
    public $keyAttribute = 'key';

    /**
     * Column name that represents a value
     * @var string
     */
    public $valueAttribute = 'value';

    /**
     * @inheritdoc
     */
    protected function getValue($key)
    {
        /** @var ActiveRecord $class */
        $class = $this->settingsClass;
        $model = $class::findOne([$this->keyAttribute => $key]);

        if ($model === null) {
            return null;
        }

        return $model->getAttribute($this->valueAttribute);
    }

    /**
     * @inheritdoc
     */
    protected function setValue($key, $value)
    {
        /** @var ActiveRecord $class */
        $class = $this->settingsClass;
        $model = $class::findOne([$this->keyAttribute => $key]);

        if ($model === null) {
            $model = new $class();
        }

        $model->setAttributes(
            [
                $this->keyAttribute   => $key,
                $this->valueAttribute => $value
            ],
            false
        );

        return $model->save(false);
    }

    /**
     * @inheritdoc
     */
    protected function existsKey($key)
    {
        /** @var ActiveRecord $class */
        $class = $this->settingsClass;

        return $class::find()->where([$this->keyAttribute => $key])->exists();
    }
}
