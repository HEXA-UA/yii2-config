<?php


use yii\db\Migration;

/**
 * Handles the creation of table `keys`.
 */
class m170524_145535_create_settings_keys_table extends Migration
{
    /**
     * @var string
     */
    private static $_tableName = '{{%settings_keys}}';

    /**
     * @var string
     */
    private static $_refTableName = '{{%settings_groups}}';

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
            'name'        => $this->string(255)->notNull(),
            'type'        => $this->string(255)->notNull(),
            'description' => $this->string(1000)->notNull(),
            'PRIMARY KEY(name)'
        ], $tableOptions);

        $this->createIndex(
            'INX-GROUP-NAME-UNQ',
            self::$_tableName,
            'name',
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
