<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use yii\web\Response;
use common\models\Fruit;

class FruitController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Fruit';


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        return $behaviors;
    }

    public function actionIndex($name = null, $family = null)
    {
        $query = Fruit::find();
        if ($name !== null) {
            $query->andWhere(['like', 'name', $name]);
        }
        if ($family !== null) {
            $query->andWhere(['like', 'family', $family]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $dataProvider;
    }
}
