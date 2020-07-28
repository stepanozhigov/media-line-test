<?php

namespace app\modules\api\models;

use app\models\User;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int|null $user_id
 * @property int|null $parent_id
 * @property string|null $description
 * @property int|null $updated_at
 * @property int|null $created_at
 *
 * @property Article[] $articles
 * @property User $user
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['user_id', 'parent_id', 'updated_at', 'created_at'], 'integer'],
            [['description'], 'string'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['slug'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'user_id' => 'User ID',
            'parent_id' => 'Parent ID',
            'description' => 'Description',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Articles]].
     *
     * @return \yii\db\ActiveQuery|ArticleQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::class, ['id' => 'article_id'])->viaTable('article_category', ['category_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }
}
