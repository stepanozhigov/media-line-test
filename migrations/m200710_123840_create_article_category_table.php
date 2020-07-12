<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_category`.
 */
class m200710_123840_create_article_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article_category', [
            'category_id' => $this->integer(),
            'article_id'=>$this->integer(),
            'PRIMARY KEY(category_id, article_id)'
        ]);
        $this->addForeignKey(
            'fk-article_category-article_id',
            'article_category',
            'article_id',
            'article',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
        'fk-article_category-category_id',
        'article_category',
        'category_id',
        'category',
        'id',
        'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('article_category');
    }
}
