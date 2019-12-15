<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InstallItemGood;

/**
 * InstallItemGoodSearch represents the model behind the search form of `app\models\InstallItemGood`.
 */
class InstallItemGoodSearch extends InstallItemGood
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['install_item_id', 'good_id', 'quantity'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = InstallItemGood::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'install_item_id' => $this->install_item_id,
            'good_id' => $this->good_id,
            'quantity' => $this->quantity,
        ]);

        return $dataProvider;
    }
}
