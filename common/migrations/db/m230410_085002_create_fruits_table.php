<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fruits}}`.
 */
class m230410_085002_create_fruits_table extends Migration
{
    /**
     * {@inheritdoc}
     */
     
    public function safeUp()
    {
        $this->createTable('{{%fruits}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'genus' => $this->string(),
            'family' => $this->string(),
            'order' => $this->string(),
            'carbohydrates' => $this->integer(),
            'protein' => $this->integer(),
            'fat' => $this->integer(),
            'calories' => $this->integer(),
            'calories' => $this->integer(),
            'is_favourite' => $this->integer()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%fruits}}');
    }
}
