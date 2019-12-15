<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "install_item".
 *
 * @property int $id
 * @property string $name
 * @property string $works
 * @property string $recommendations
 * @property string $as_result
 * @property string $img
 *
 * @property InstallItemGood[] $installItemGoods
 * @property Good[] $goods
 */
class InstallItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'install_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'works', 'recommendations', 'as_result'], 'required'],
            [['works', 'recommendations', 'as_result'], 'string'],
            [['name', 'img'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'works' => 'Работы',
            'recommendations' => 'Рекомендации',
            'as_result' => 'Результаты',
            'img' => 'Картинка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstallItemGoods()
    {
        return $this->hasMany(InstallItemGood::className(), ['install_item_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Good::className(), ['id' => 'good_id'])->viaTable('install_item_good', ['install_item_id' => 'id']);
    }
}
