<?php

namespace app\modules\api;

use Yii;
use yii\web\Response;

class Api extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\api\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        Yii::$app->response->format = Response::FORMAT_JSON;
        // ...  other initialization code ...
        \Yii::$app->user->enableSession = false;
        \Yii::$app->user->loginUrl = null;
        \Yii::$app->language='es';
    }
}