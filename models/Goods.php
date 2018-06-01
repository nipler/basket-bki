<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $price
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['title'], 'string', 'max' => 250],
            [['description'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
        ];
    }
    
    /**
    * @return \yii\db\ActiveQuery
    */
    public function getGoodImages()
    {
        return $this->hasMany(GoodsImages::className(), ['good_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\GoodsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\GoodsQuery(get_called_class());
    }
}
