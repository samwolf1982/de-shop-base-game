<?php

use yii\db\Migration;

/**
 * Handles the creation of table `points`.
 */
class m171120_123657_create_points_table extends Migration
{

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
        $this->createTable('points', [
            'id' => $this->primaryKey(),
            'u_id'=>$this->integer()->notNull(),
            'shnappunkte'=>$this->decimal(10,2)->defaultValue(0),
            'rabatppunkte'=>$this->decimal(10,2)->defaultValue(0),

        ],$tableOptions);

        // add foreign key for table `points`
        $this->addForeignKey(
            'fk-points-user_id',
            'points',
            'u_id',
            'user',
            'id',
            'RESTRICT'
        );



    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('points');
    }
}
