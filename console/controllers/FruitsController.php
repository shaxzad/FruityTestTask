<?php

// namespace app\commands;
namespace console\controllers;


use Yii;
use yii\console\Controller;
use yii\helpers\Json;
use yii\helpers\Console;
use yii\rest\ActiveController;

class FruitsController extends Controller
{
    /**
     * This command fetches all fruits from https://fruityvice.com/ and saves them into local DB MySQL.
     * Example usage: php bin/console fruits:fetch
     */
    public function actionFetch()
    {
        // Fetch fruits data from API
        $url = 'https://fruityvice.com/api/fruit/all';
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);

        if ($response->getStatusCode() == 200) {
            $fruits = Json::decode($response->getBody());

            $db = Yii::$app->db;
            
            $tableExists = Yii::$app->db->schema->getTableSchema('fruits');
            if (!$tableExists) {
                echo "Fruits table does not exist. Creating...\n";
                Yii::$app->runAction('migrate/up');
            }

            // Save fruits to MySQL database
            foreach ($fruits as $fruit) {
                $db = Yii::$app->db;
                $db->createCommand()->insert('fruits', [
                    'name' => $fruit['name'],
                    'genus' => $fruit['genus'],
                    'family' => $fruit['family'],
                    'order' => $fruit['order'],
                    'carbohydrates' => $fruit['nutritions']['carbohydrates'],
                    'protein' => $fruit['nutritions']['protein'],
                    'fat' => $fruit['nutritions']['fat'],
                    'calories' => $fruit['nutritions']['calories'],
                ])->execute();
            }
            
            // // Get the environment variables
            // $fromAddress = env('MAIL_FROM_ADDRESS');
            // $fromName = env('APP_NAME');
            // $setTo = env('MAIL_TO_SET');

            // var_dump($fromAddress, $fromName);

            // // Send email notification
            // Yii::$app->mailer->compose()
            //     ->setTo($setTo)
            //     ->setFrom([$fromAddress => $fromName])
            //     ->setSubject('Fruits fetch complete')
            //     ->setTextBody('All fruits have been fetched and saved to the database.')
            //     ->send();

            $this->stdout("Fruits fetch complete!\n", Console::FG_GREEN);
        } else {
            $this->stdout("Failed to fetch fruits!\n", Console::FG_RED);
        }
    }
}