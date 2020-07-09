<?php

use yii\db\Migration;

/**
 * Handles the creation of table 'category'.
 */
class m200708_150452_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->notNull()->unique(),
            'slug' => $this->string()->notNull()->unique(),
            'user_id'=>$this->integer()->notNull()->defaultValue(0),
            'parent_id'=>$this->integer(),
            'description'=>$this->text(),
            'updated_at'=>$this->dateTime(),
            'created_at'=>$this->dateTime()
        ]);
        $this->createIndex(
            'idx-category-user_id',
            'category',
            'user_id'
        );
        $this->addForeignKey(
            'fk-category-user_id',
            'category',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }
}
