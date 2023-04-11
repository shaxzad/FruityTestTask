<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fruits".
 *
 * @property int $id
 * @property string $name
 * @property string|null $genus
 * @property string|null $family
 * @property string|null $order
 * @property int|null $carbohydrates
 * @property int|null $protein
 * @property int|null $fat
 * @property int|null $calories
 * @property int $is_favourite
 */
class Fruits extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fruits';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['carbohydrates', 'protein', 'fat', 'calories', 'is_favourite'], 'integer'],
            [['name', 'genus', 'family', 'order'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'genus' => 'Genus',
            'family' => 'Family',
            'order' => 'Order',
            'carbohydrates' => 'Carbohydrates',
            'protein' => 'Protein',
            'fat' => 'Fat',
            'calories' => 'Calories',
            'is_favourite' => 'Is Favourite',
        ];
    }
}
