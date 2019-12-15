<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "good".
 *
 * @property int $id
 * @property string $name
 * @property string $thickness
 * @property string $size
 * @property string $square
 * @property int $price
 * @property string $length
 * @property string $width
 * @property int $good_group_id
 *
 * @property GoodGroup $goodGroup
 * @property InstallItemGood[] $installItemGoods
 * @property InstallItem[] $installItems
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
            [['price', 'good_group_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['thickness', 'size', 'square'], 'string', 'max' => 50],
            [['length', 'width'], 'string', 'max' => 20],
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
            'name' => 'наименование',
            'thickness' => 'Толщина',
            'size' => 'Размер',
            'square' => 'Площадь',
            'price' => 'Цена',
            'length' => 'Длина',
            'width' => 'Ширина',
            'good_group_id' => 'Группа',
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
    public function getInstallItemGoods()
    {
        return $this->hasMany(InstallItemGood::className(), ['good_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstallItems()
    {
        return $this->hasMany(InstallItem::className(), ['id' => 'install_item_id'])->viaTable('install_item_good', ['good_id' => 'id']);
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
