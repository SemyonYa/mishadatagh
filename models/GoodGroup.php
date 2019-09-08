<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "good_group".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 *
 * @property Good[] $goods
 * @property Category $category
 * @property GoodGroupImg[] $goodGroupImgs
 * @property Img[] $imgs
 */
class GoodGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'good_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods()
    {
        return $this->hasMany(Good::className(), ['good_group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodGroupImgs()
    {
        return $this->hasMany(GoodGroupImg::className(), ['good_group_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImgs()
    {
        return $this->hasMany(Img::className(), ['id' => 'img_id'])->viaTable('good_group_img', ['good_group_id' => 'id']);
    }
}
