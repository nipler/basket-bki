<?php

namespace app\controllers;
use Yii;
use yii\web\Response;
use yii\web\Cookie;

class BaseController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }
        
        $cookies = Yii::$app->request->cookies;
        if (!$cookies->has('cartid')) {
           $cookies = Yii::$app->response->cookies;

            $cookies->add(new Cookie([
                'name' => 'cartid',
                'value' => uniqid(),
                //'domain' => '/',
                'expire' => time() + 86400,
            ]));
        }
        
        
        return true;
    }
}