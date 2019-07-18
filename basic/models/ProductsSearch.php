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
    public $categories;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'categoryId', 'price', 'hidden'], 'integer'],
            [['categories'], 'safe'],
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
         /* $query->joinWith('categories'); */
         $query->joinWith(['categories' => function($query) { $query->from(['cat' => 'categories']); }]);
        $dataProvider->sort->attributes['categories'] = [
            'asc' => ['cat.name' => SORT_ASC],
            'desc' => ['cat.name' => SORT_DESC],
          ]; 

           
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
             /* 'categoryId' => $this->categoryId, */
            'price' => $this->price,
             /* 'hidden' => $this->hidden,  */
        ]);
        $query->andFilterWhere(['like', 'cat.name', $this->categories]); 

        return $dataProvider;
    }
}
