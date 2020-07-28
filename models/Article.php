<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $body
 * @property int|null $user_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property User $user
 * @property Category[] $categories
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'user_id',
                'updatedByAttribute'=> false
            ],
            'slug' => [
                'class' => 'Zelenin\yii\behaviors\Slug',
                'slugAttribute' => 'slug',
                'attribute' => 'title',
                // optional params
                'ensureUnique' => true,
                'replacement' => '-',
                'lowercase' => true,
                'immutable' => false,
                // If intl extension is enabled, see http://userguide.icu-project.org/transforms/general.
                'transliterateOptions' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['body'], 'string'],
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'slug' => 'Идентификатор',
            'body' => 'Текс Статьи',
            'user_id' => 'Автор',
            'created_at' => 'Обновлено',
            'updated_at' => 'Создано',
        ];
    }

    /**
    RELATIONS
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
//
    public function getCategories() {
        return $this->hasMany(Category::class,['id'=>'category_id'])
            ->viaTable('article_category',['article_id'=>'id']);
    }

    /**
    HELPERS
     */
    public function getEncodedText($param) {
        return Html::encode($this->$param);
    }
}
