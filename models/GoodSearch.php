<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Good;

/**
 * GoodSearch represents the model behind the search form of `app\models\Good`.
 */
class GoodSearch extends Good
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price', 'good_group_id'], 'integer'],
            [['name', 'thickness', 'size', 'square', 'length', 'width'], 'safe'],
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
        $query = Good::find();

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
            'id' => $this->id,
            'price' => $this->price,
            'good_group_id' => $this->good_group_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'thickness', $this->thickness])
            ->andFilterWhere(['like', 'size', $this->size])
            ->andFilterWhere(['like', 'square', $this->square])
            ->andFilterWhere(['like', 'length', $this->length])
            ->andFilterWhere(['like', 'width', $this->width]);

        return $dataProvider;
    }
}
