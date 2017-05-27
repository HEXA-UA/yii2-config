<?php

use yii\db\Migration;

/**
 * Handles the creation of table `keys_table`.
 */
class m170524_145534_create_keys_table extends Migration
{
    /**
     * @var string
     */
    private static $_tableName = '{{%keys}}';

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
            'name'  => $this->primaryKey(255)->notNull(),
            'group' => $this->string(255)->notNull(),
            'type'  => $this->string(255)->notNull()
        ], $tableOptions);

        $this->createIndex(
            'KEYS_NAME_UNIQUE',
            self::$_tableName,
            ['name'],
            true
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(self::$_tableName);
    }
}
