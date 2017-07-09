<?php

use yii\db\Migration;

/**
 * Handles the creation of table `groups`.
 */
class m170524_145534_create_groups_table extends Migration
{
    /**
     * @var string
     */
    private static $_tableName = '{{%settings_groups}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::$_tableName, [
            'name' => $this->string(255)->notNull()->unique(),
            'PRIMARY KEY(name)'
        ], $tableOptions);

        $this->batchInsert(static::$_tableName, ['name'], [
            ['core']
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(self::$_tableName);
    }
}
