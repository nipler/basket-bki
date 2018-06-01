<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Goods;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class Basket extends Model
{
    
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
        ];
    }
    
    public static function addTo($id) {
        
        $session = Yii::$app->session;
        
        if ($session->has('basket')) {
            $basket = $session->get('basket');
            $flag = false;
            foreach($basket as $good=>$count) {
                if($id == $good) {
                    $good_model = Goods::findOne($id);
                    $basket[$id] = ['price'=>floatval($good_model->price), 'count'=>($count['count']+1)];
                    $flag = true;
                    break;
                }
            }
            
            if(!$flag) {
                $good_model = Goods::findOne($id);
                $basket[$id] = ['price'=>floatval($good_model->price), 'count'=>1];
            }
        }
        else {
            $basket = [];
            $good_model = Goods::findOne($id);
            $basket[$id] = ['price'=>floatval($good_model->price), 'count'=>1];
        }
        $session->set('basket', $basket);
        
        return $basket;
    }
    
    
    public static function getGoods() {
        
        $session = Yii::$app->session;
        
        if ($session->has('basket')) {
            $basket = $session->get('basket');
        }
        else {
            $basket = [];

        }
        
        return $basket;
    }

   
}
