<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `app\models\Products`.
 */
class ProductsSearch extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['_id', 'product_id', 'productName', 'productPrice', 'productImage', 'productDescrip', 'inStock', 'status', 'type_id', 'brand_id'], 'safe'],
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
        $query = Products::find();

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
        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'product_id', $this->product_id])
            ->andFilterWhere(['like', 'productName', $this->productName])
            ->andFilterWhere(['like', 'productPrice', $this->productPrice])
            ->andFilterWhere(['like', 'productImage', $this->productImage])
            ->andFilterWhere(['like', 'productDescrip', $this->productDescrip])
            ->andFilterWhere(['like', 'inStock', $this->inStock])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'type_id', $this->type_id])
            ->andFilterWhere(['like', 'brand_id', $this->brand_id]);

        return $dataProvider;
    }
}
