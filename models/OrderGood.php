<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_good".
 *
 * @property int $order_id
 * @property int $good_id
 * @property int $quantity
 * @property int $current_price
 *
 * @property Good $good
 * @property Order $order
 */
class OrderGood extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_good';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'good_id', 'quantity', 'current_price'], 'required'],
            [['order_id', 'good_id', 'quantity', 'current_price'], 'integer'],
            [['order_id', 'good_id'], 'unique', 'targetAttribute' => ['order_id', 'good_id']],
            [['good_id'], 'exist', 'skipOnError' => true, 'targetClass' => Good::className(), 'targetAttribute' => ['good_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Заказ',
            'good_id' => 'Товар',
            'quantity' => 'Количество',
            'current_price' => 'Цена',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGood()
    {
        return $this->hasOne(Good::className(), ['id' => 'good_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}
