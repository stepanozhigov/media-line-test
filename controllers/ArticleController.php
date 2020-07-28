<?php

namespace app\controllers;

use app\models\Category;
use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\Console;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class'=>AccessControl::class,
                'only'=>['create','update','delete'],
                'rules'=>[
                    [
                        'actions'=>['create','update','delete'],
                        'allow'=>true,
                        'roles'=>['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $params = [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ];
        if(array_key_exists('filterCategory',Yii::$app->request->queryParams)) {
            $category = Category::findOne(['slug' => Yii::$app->request->queryParams['filterCategory']]);
            $params = array_merge($params,
            [
                'category'=>$category
            ]);

        }
        return $this->render('index', $params);
    }

    /**
     * Displays a single Article model.
     * @param string $slug
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($slug)
    {
        return $this->render('view', [
            'model' => $this->findModel($slug),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
        if($model->load(Yii::$app->request->post()) && $model->save()) {
            $category_ids = array_values(Yii::$app->request->post('Article')['categories']);
            foreach ($category_ids as $category_id) {
                $category = Category::findOne($category_id);
                $model->link('categories',$category);
            }
            return $this->redirect(['view', 'slug' => $model->slug]);
        }
        return $this->render('create', [
            'model' => $model,
            'categories'=>Category::getAllCategories()
        ]);
    }

    public function actionUpdate($slug)
    {
        $model = $this->findModel($slug);
        if($model->user_id !== Yii::$app->user->id) {
            throw new ForbiddenHttpException('You do not have permissions to update this article');
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->unlinkAll('categories',true);
            $updated_category_ids = array_values(Yii::$app->request->post('Article')['categories']);
            foreach ($updated_category_ids as $category_id) {
                $category = Category::findOne($category_id);
                $model->link('categories',$category);
            }
            return $this->redirect(['view', 'slug' => $model->slug]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($slug)
    {
        $model = $this->findModel($slug);
        if($model->user_id !== Yii::$app->user->id) {
            throw new ForbiddenHttpException('You do not have permissions to update this article');
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($slug)
    {
        if (($model = Article::findOne(['slug'=>$slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
