<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods_images".
 *
 * @property int $id
 * @property int $good_id
 * @property string $file
 *
 * @property Goods $good
 */
class GoodsImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goods_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['good_id'], 'integer'],
            [['file'], 'string', 'max' => 250],
            [['good_id'], 'exist', 'skipOnError' => true, 'targetClass' => Goods::className(), 'targetAttribute' => ['good_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'good_id' => 'Good ID',
            'file' => 'File',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGood()
    {
        return $this->hasOne(Goods::className(), ['id' => 'good_id']);
    }

    /**
     * {@inheritdoc}
     * @return GoodsImagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GoodsImagesQuery(get_called_class());
    }
}
