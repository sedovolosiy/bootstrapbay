<?php

namespace backend\controllers;

use Yii;
use common\models\Skills;
use backend\models\SkillsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use developeruz\db_rbac\behaviors\AccessBehavior;

/**
 * SkillsController implements the CRUD actions for Skills model.
 */
class SkillsController extends Controller
{
    public $modelClass = 'common/models/Skill';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ]
            ],
            'as AccessBehavior' => [
                'class' => AccessBehavior::className(),
            ]
        ];
    }

    /**
     * Lists all Skills models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SkillsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Skills();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Skills model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Skills model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Skills();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Skills model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Skills model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Skills model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Skills the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Skills::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionChangeVisible()
    {
        $status = Yii::$app->request->post('status');
        $id = Yii::$app->request->post('id');
//        print_r($_POST);
//        exit;
        /** @var  $model  Skills */
        $model = Skills::find()->where(['id' => $id])->one();
        $model->changeVisible($status);
    }
}
