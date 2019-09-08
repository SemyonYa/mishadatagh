<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "install_item_good".
 *
 * @property int $install_item_id
 * @property int $good_id
 * @property int $quantity
 *
 * @property Good $good
 * @property InstallItem $installItem
 */
class InstallItemGood extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'install_item_good';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['install_item_id', 'good_id', 'quantity'], 'required'],
            [['install_item_id', 'good_id', 'quantity'], 'integer'],
            [['install_item_id', 'good_id'], 'unique', 'targetAttribute' => ['install_item_id', 'good_id']],
            [['good_id'], 'exist', 'skipOnError' => true, 'targetClass' => Good::className(), 'targetAttribute' => ['good_id' => 'id']],
            [['install_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => InstallItem::className(), 'targetAttribute' => ['install_item_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'install_item_id' => 'Install Item ID',
            'good_id' => 'Good ID',
            'quantity' => 'Quantity',
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
    public function getInstallItem()
    {
        return $this->hasOne(InstallItem::className(), ['id' => 'install_item_id']);
    }
}
