<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;

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
 * @property Category $parent
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
//            [
//                'class' => SluggableBehavior::class,
//                'attribute' => 'title',
//                'slugAttribute' => 'slug',
//            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'user_id',
                'updatedByAttribute'=> false
            ]
        ];

    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
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
            'title' => 'Заголовок',
            'slug' => 'Идентификатор',
            'user_id' => 'Пользователь ID',
            'parent_id' => 'Головная Рубрика',
            'description' => 'Описание',
            'updated_at' => 'Обновлено',
            'created_at' => 'Создано',
        ];
    }

    /**
     * get All Categories
     */

    public static function getAllCategories($parent = 0, $level = 0, $exclude = 0) {
        $children = self::find()
            ->where(['parent_id' => $parent])
            ->with('articles')
            ->asArray()
            ->orderBy('title ASC')
            ->all();
        $result = [];
        foreach ($children as $category) {
            if ($category['id'] == $exclude) {
                continue;
            }
            $category['level'] = $level;
            if ($level) {
                $category['name'] = str_repeat('— ', $level) . $category['title'];
            } else {
                $category['name'] = $category['title'];
            }
            $category['articles_count'] = count($category['articles']);
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
            $tree[0] = 'Корневая Рубрика';
        }
        foreach ($data as $item) {
            $tree[$item['id']] = $item['name'];
        }
        return $tree;
    }

    //
    public static function getTreeCategories(array &$tree, $parent_id = 0) {
    $branch = array();

    foreach ($tree as $element) {
        if ($element['parent_id'] == $parent_id) {
            $children = self::getTreeCategories($tree, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }

    return $branch;
}
    //
    public static function printTreeCategories($tree, $parent_id = 0) {
        $output = "<ul>";
        foreach ($tree as $element) {
            $output .= "<li><a href='#'>".$element['title']."</a></li>";
            if ($element['parent_id'] == $parent_id) {
                $children = self::getTreeCategories($tree, $element['id']);
                if ($children) {
                    $output .= "<li><ul>";
                    foreach ($children as $child) {
                        $output .= "<li>".$child['title']."</li>";
                    }
                    $output .= "</ul></li>";
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }
        $output .= "</ul>";
        return $output;
    }

    public static function getParentCategories($parent_id) {
        $result = [];
        $parent = self::find()->where(['id'=>$parent_id])->orderBy('title ASC')->asArray()->one();
        if($parent) {
            $result[] = $parent;
            $result = array_merge(
                $result,
                self::getParentCategories($parent['parent_id'])
            );
        }
        return array_reverse($result);
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

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::class, ['id' => 'parent_id']);
    }

    public function getChildren()
    {
        return $this->hasMany(Category::class, ['parent_id' => 'id']);
        //return self::find()->where(['parent_id'=>'id'])->all();
    }

    public function getArticles() {
        return $this->hasMany(Article::class,['id'=>'article_id'])
            ->viaTable('article_category',['category_id'=>'id']);
    }

    public function getEncodedText($param) {
        return Html::encode($this->$param);
    }
}
