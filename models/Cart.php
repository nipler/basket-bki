<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property string $cartid
 * @property string $created
 * @property string $goods
 */
class Cart extends \yii\db\ActiveRecord
{
    
    
    public static $worktimes = array(
        1 => array('9:00', '20:00'), 
        2 => array('9:00', '20:00'),
        3 => array('9:00', '20:00'),
        4 => array('9:00', '20:00'),
        5 => array('9:00', '20:00'), 
        6 => null, 
        0 => null
    );

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created', 'updated'], 'safe'],
            [['cartid'], 'string', 'max' => 32],
            [['goods'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cartid' => 'Cartid',
            'created' => 'Created',
            'goods' => 'Goods',
        ];
    }
    
    public function afterFind()
    {
        $this->goods = json_decode($this->goods, true);
    }
    
    public static function checkWorkTime() {
        $now = getdate();	
        // День недели
        $v = self::$worktimes[$now['wday']];
        if (null == $v) {
            // Если выходной
            return false;
        }
        else {
            $time_begin = strtotime(self::$worktimes[$now['wday']][0]);
            $time_end = strtotime(self::$worktimes[$now['wday']][1]);
            if((time() < $time_begin ) || (time() > $time_end)) {
                return false;
            }
            else {
                return true;
            }
        }
    }
  
  
    
}
