<?php

use yii\db\Migration;

/**
 * Handles the creation of table `settings`.
 */
class m170524_145534_create_settings_table extends Migration
{
    /**
     * @var string
     */
    private static $_tableName = '{{%settings}}';

    /**
     * @var string
     */
    private static $_refTableName = '{{%keys}}';

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
            'group' => $this->string(255)->notNull(),
            'name'  => $this->string(255)->notNull()->unique(),
            'value' => $this->text()->notNull(),
            'PRIMARY KEY(name)'
        ], $tableOptions);

        $this->createIndex(
            'IDX-GROUP-NAME_UNQ',
            self::$_tableName,
            ['group', 'name'],
            true
        );

        $this->addForeignKey(
            'FK-NAME-NAME-GROUP-GROUP',
            self::$_tableName,
            ['group', 'name'],
            self::$_refTableName,
            ['group', 'name'],
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('FK-NAME-NAME-GROUP-GROUP', self::$_tableName);
        $this->dropTable(self::$_tableName);
    }
}
