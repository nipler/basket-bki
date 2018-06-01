<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Basket;


class BasketController extends Controller
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionAdd()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        if(Yii::$app->request->post()) {
            $good = Yii::$app->request->post('id');
        }
        $basket = Basket::addTo($good);
        
        return $basket;
        
    }
    
    
     public function actionGet()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $basket = Basket::getGoods();
        
        return $basket;
        
    }

}
