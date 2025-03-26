<?php

namespace app\modules\account\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Favorite;
use Yii;

/**
 * FavoriteSearch represents the model behind the search form of `app\models\Favorite`.
 */
class FavoriteSearch extends Favorite
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'product_id'], 'integer'],
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
        // $query = Favorite::find()
        // ->with('product')
        // ->where([
        //     'user_id' => Yii::$app->user->id,
        //     'status' => 1
        // ]);

        $query = Favorite::find()
        ->joinWith([
            'product' => fn($q) => $q->joinWith('category')
            ])
        ->where([
            'user_id' => Yii::$app->user->id,
            'status' => 1
        ]);

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
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
        ]);

        return $dataProvider;
    }
}

	