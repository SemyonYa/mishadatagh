<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "good_group".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $thickness_of
 * @property int $category_id
 * @property string $img
 *
 * @property Good[] $goods
 * @property Category $category
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
            [['name', 'thickness_of', 'category_id'], 'required'],
            [['description'], 'string'],
            [['category_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['thickness_of'], 'string', 'max' => 50],
            [['img'], 'string', 'max' => 100],
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
            'name' => 'Наименование',
            'description' => 'Описание',
            'thickness_of' => 'Толщина',
            'category_id' => 'Категория',
            'img' => 'Картинка',
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
}
