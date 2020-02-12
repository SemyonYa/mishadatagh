<?php

namespace app\controllers;

use app\models\Category;
use app\models\Good;
use app\models\GoodGroup;
use app\models\InstallItem;
use app\models\InstallItemGood;
use app\models\Shop;
use yii\helpers\Json;
use yii\web\Controller;


class Data2Controller extends Controller
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    'Origin' => ['http://localhost:4200', 'http://localhost:8100', 'http://vikar.injini.ru', 'http://vikar-auto.injini.ru'],
                    'Access-Control-Allow-Origin' => true,
                    'Access-Control-Allow-Credentials' => true,
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
    public function actionFullCategories()
    {
        $categories = Category::find()->asArray()->all();
        foreach ($categories as $cid => $category) {
            $good_groups = GoodGroup::find()->where(['category_id' => $category['id']])->asArray()->all();
            $goods = [];
            foreach ($good_groups as $ggid => $good_group) {
                $goods = Good::find()->where(['good_group_id' => $good_group['id']])->asArray()->all();
                $good_groups[$ggid]['goods'] = $goods;
            }
            $categories[$cid]['good_groups'] = $good_groups;
        }
        return Json::encode($categories);
    }

    public function actionFullInstallItems()
    {
        $install_items = InstallItem::find()->asArray()->all();
        foreach ($install_items as $ii_id => $ii) {
            $install_item_goods = InstallItemGood::find()
                ->where(['install_item_id' => $ii['id']])
                ->asArray()
                ->all();
            foreach ($install_item_goods as $iig_id => $ii_good) {
                $install_item_goods[$iig_id]['good'] = Good::findOne($ii_good['good_id']);
            }
            $install_items[$ii_id]['install_item_goods'] = $install_item_goods;
        }
        return Json::encode($install_items);
    }

    // OLD
    public function actionCategories()
    {
        return Json::encode(Category::find()->all());
    }

    public function actionGoodGroups($category_id)
    {
        return Json::encode(GoodGroup::find()->where(['category_id' => $category_id])->all());
    }

    public function actionGoods($good_group_id)
    {
        return Json::encode(Good::find()->where(['good_group_id' => $good_group_id])->all());
    }

    public function actionGood($id)
    {
        return Json::encode(Good::findOne($id));
    }

    public function actionInstallItems()
    {
        return Json::encode(InstallItem::find()->all());
    }

    public function actionInstallItem($id)
    {
        return Json::encode(InstallItem::findOne($id));
    }

    public function actionInstallItemGoods($install_item_id)
    {
        $ii = InstallItem::findOne($install_item_id);
        $goods = [];
        foreach ($ii->installItemGoods as $ii_good) {
            $goods[] = [
                'good' => $ii_good->good,
                'q' => $ii_good->quantity
            ];
        }
        return Json::encode($goods);
    }

    public function actionShops()
    {
        return Json::encode(Shop::find()->all());
    }
}
