<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "good".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $price
 * @property int $good_group_id
 *
 * @property GoodGroup $goodGroup
 * @property OrderGood[] $orderGoods
 * @property Order[] $orders
 */
class Good extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'good';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'good_group_id'], 'required'],
            [['description'], 'string'],
            [['price', 'good_group_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['good_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => GoodGroup::className(), 'targetAttribute' => ['good_group_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'good_group_id' => 'Good Group ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodGroup()
    {
        return $this->hasOne(GoodGroup::className(), ['id' => 'good_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderGoods()
    {
        return $this->hasMany(OrderGood::className(), ['good_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id' => 'order_id'])->viaTable('order_good', ['good_id' => 'id']);
    }
}
