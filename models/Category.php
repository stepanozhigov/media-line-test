<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int $user_id
 * @property int|null $parent_id
 * @property string|null $description
 * @property string|null $updated_at
 * @property string|null $created_at
 *
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
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => SluggableBehavior::class,
                'attribute' => 'title',
                'slugAttribute' => 'slug',
            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'user_id',
            ],
            TimestampBehavior::class
        ];

    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'user_id'], 'required'],
            [['user_id', 'parent_id'], 'integer'],
            [['description'], 'string'],
            [['updated_at', 'created_at'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['title'], 'unique'],
            [['slug'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
     * get All Categories
     */

    public static function getAllCategories($parent = 0, $level = 0, $exclude = 0) {
        $children = self::find()
            ->where(['parent_id' => $parent])
            ->asArray()
            ->all();
        $result = [];
        foreach ($children as $category) {
            if ($category['id'] == $exclude) {
                continue;
            }
            if ($level) {
                $category['name'] = str_repeat('— ', $level) . $category['name'];
            }
            $result[] = $category;
            $result = array_merge(
                $result,
                self::getAllCategories($category['id'], $level+1, $exclude)
            );
        }
        return $result;
    }

    /**
     * get Tree with Categories
     */

    public static function getTree($exclude = 0, $root = false) {
        $data = self::getAllCategories(0, 0, $exclude);
        $tree = [];
        if ($root) {
            $tree[0] = 'No Parent';
        }
        foreach ($data as $item) {
            $tree[$item['id']] = $item['name'];
        }
        return $tree;
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
