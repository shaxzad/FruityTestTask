<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Fruits;

/**
 * FruitsSearch represents the model behind the search form about `common\models\Fruits`.
 */
class FruitsSearch extends Fruits
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'carbohydrates', 'protein', 'fat', 'calories', 'is_favourite'], 'integer'],
            [['name', 'genus', 'family', 'order'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Fruits::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'carbohydrates' => $this->carbohydrates,
            'protein' => $this->protein,
            'fat' => $this->fat,
            'calories' => $this->calories,
            'is_favourite' => $this->is_favourite,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'genus', $this->genus])
            ->andFilterWhere(['like', 'family', $this->family])
            ->andFilterWhere(['like', 'order', $this->order]);

        return $dataProvider;
    }
}
