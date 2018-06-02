<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Cart;
use app\models\Goods;


class BasketController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    public function actionIndex() {
        $cookies = Yii::$app->request->cookies;
        $cartid = $cookies->getValue('cartid');

        $model = $this->findModelByCartid($cartid);
        
        $items = [];
        if($model->goods) {
            foreach($model->goods as $good_id=>$item) {
                $items[] = [
                    'good'=>Goods::findOne($good_id),
                    'count'=>$item['count']
                ];
            }
        }

        return $this->render('index', [
            'items' => $items,
        ]);
    }
    
    
    public function actionOrder() {
        $cookies = Yii::$app->request->cookies;
        $cartid = $cookies->getValue('cartid');

        $model = $this->findModelByCartid($cartid);
        
        $items = [];
        foreach($model->goods as $good_id=>$item) {
            $items[] = [
                'good'=>Goods::findOne($good_id),
                'count'=>$item['count']
            ];
        }
        // To.Do.
        // Создаем заказ в отдельную таблицу orders
        
        
        // Очищаем корзину
        $model->delete();
        
        // Оповещаем менджера
        Yii::$app
            ->mailer
            ->compose(
                ['html' => 'neworder-html', 'text' => 'neworder-text'],
                ['items' => $items]
            )
            ->setFrom([Yii::$app->params['adminEmail'] => 'Новый заказ на сайте '. Yii::$app->name])
            ->setTo(Cart::checkWorkTime()?Yii::$app->params['worktime']:Yii::$app->params['noworktime'])
            ->setSubject('Новый заказ на сайте' . Yii::$app->name)
            ->send();
        
        return $this->render('order', [
            
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionAdd()
    {
        
        $cookies = Yii::$app->request->cookies;
        $cartid = $cookies->getValue('cartid');

        $model = $this->findModelByCartid($cartid);
        
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        if(Yii::$app->request->post()) {
            $id = Yii::$app->request->post('id');
            $flag = false;
            if($model->goods) {
                $goods = $model->goods;
                foreach($goods as $good=>$count) {
                    // Если в корзине уже есть такой товар то обновим кол-во
                    if($id == $good) {
                        $good_model = Goods::findOne($id);
                        $goods[$id] = ['price'=>floatval($good_model->price), 'count'=>($count['count']+1)];
                        $flag = true;
                        break;
                    }
                }
            }
            else {
                $goods = [];
            }

            // Если в корзине не найден товар то добавим
            if(!$flag) {
                $good_model = Goods::findOne($id);
                $goods[$id] = ['price'=>floatval($good_model->price), 'count'=>1];
            }
            
            $model->goods = json_encode($goods);
            $model->cartid = $cartid;
            $model->save();

        }
        
        
        return $goods;
        
    }
    
    
     public function actionGet()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $cookies = Yii::$app->request->cookies;
        $cartid = $cookies->getValue('cartid');

        $model = $this->findModelByCartid($cartid);
        
        
        return ($model->goods?$model->goods:[]);
        
    }
    
    
    public function findModelByCartid($id) {
        $model = Cart::find()->where(['cartid'=>$id])->orderBy('created DESC')->one();
        if(!$model) {
            $model = new Cart;
        }
        
        return $model;
    }

}
