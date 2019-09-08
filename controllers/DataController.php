<?php

namespace app\controllers;

use app\models\Category;
use app\models\Good;
use app\models\GoodGroup;
use app\models\InstallItem;
use app\models\InstallItemGood;
use app\models\InstallItemGoodView;
use yii\helpers\Json;
use yii\web\Controller;


class DataController extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors() {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    // Разрешаем доступ с указанных доменов.
                    'Origin' => ['http://localhost:4200', 'http://vikar.injini.ru'],
                    'Access-Control-Allow-Origin' => true,
                    // Куки от кроссдоменного запроса
                    // будут установлены браузером только при заголовке
                    // "Access-Control-Allow-Credentials".
                    'Access-Control-Allow-Credentials' => true,
                    // Разрешаем только метод POST.
                    'Access-Control-Request-Method' => ['POST'],
                    'Access-Control-Allow-Headers' => ['Origin', 'Content-Type', 'X-Auth-Token', 'Authorization', 'ngAuthorization', 'x-compress']
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCategories() {
        $cats = Category::find()->asArray()->all();
        return Json::encode($cats);
    }

    public function actionCategory($id) {
        $cat = Category::find()->where(['id' => $id])->asArray()->all();
        return Json::encode($cat);
    }

    public function actionGoods() {
        $goods = Good::find()->asArray()->all();
        return Json::encode($goods);
    }

    public function actionGoodGroups() {
        $good_groups = GoodGroup::find()->asArray()->all();
        return Json::encode($good_groups);
    }


    public function actionInstallItems() {
        $install_items = InstallItem::find()->asArray()->all();
        return Json::encode($install_items);
    }

    public function actionInstallItem($id) {
        $install_item = InstallItem::find()->where(['id' => $id])->asArray()->one();
        return Json::encode($install_item);
    }

    public function actionInstallItemGoods($iiId) {
        $goods = [];
        $ii_goods = InstallItemGood::find()->where(['install_item_id' => $iiId])->all();
        foreach ($ii_goods as $ii_good) {
            $goods[] = new InstallItemGoodView($ii_good->good, $ii_good->quantity);
        }
        return Json::encode($goods);
    }
}
