<?php

namespace frontend\controllers;

use Yii;
use common\models\Fruits;
use common\models\FruitsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FruitController implements the CRUD actions for Fruits model.
 */
class FruitController extends Controller
{

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Fruits models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FruitsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Add the condition for filtering out favorite fruits
        $dataProvider->query->andWhere(['is_favourite' => 0]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionFavoritelist()
    {
        $searchModel = new FruitsSearch();
        $dataProvider = $searchModel->search(['FruitsSearch' => ['is_favourite' => 1]]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing Fruits model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     */
    
     public function actionFavorite($id)
    {
        $model = $this->findModel($id);
        $model->is_favourite = 1;
      
        if ($model->save(false)) {
            Yii::$app->session->setFlash('success', 'Added to favorites.');
        } else {
            Yii::$app->session->setFlash('error', 'Failed to add to favorites.');
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Fruits model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Fruits the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fruits::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
