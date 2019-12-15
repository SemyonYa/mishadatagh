<?php

namespace app\controllers;

use Yii;
use app\models\InstallItemGood;
use app\models\InstallItemGoodSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InstallItemGoodController implements the CRUD actions for InstallItemGood model.
 */
class InstallItemGoodController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all InstallItemGood models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InstallItemGoodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InstallItemGood model.
     * @param integer $install_item_id
     * @param integer $good_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($install_item_id, $good_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($install_item_id, $good_id),
        ]);
    }

    /**
     * Creates a new InstallItemGood model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InstallItemGood();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'install_item_id' => $model->install_item_id, 'good_id' => $model->good_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing InstallItemGood model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $install_item_id
     * @param integer $good_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($install_item_id, $good_id)
    {
        $model = $this->findModel($install_item_id, $good_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'install_item_id' => $model->install_item_id, 'good_id' => $model->good_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing InstallItemGood model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $install_item_id
     * @param integer $good_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($install_item_id, $good_id)
    {
        $this->findModel($install_item_id, $good_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InstallItemGood model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $install_item_id
     * @param integer $good_id
     * @return InstallItemGood the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($install_item_id, $good_id)
    {
        if (($model = InstallItemGood::findOne(['install_item_id' => $install_item_id, 'good_id' => $good_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
