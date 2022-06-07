<?php

namespace app\models;

use \app\models\base\User as BaseUser;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user".
 */
class User extends BaseUser
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {

        
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
                ['email', 'email'],
                ['fecha_nacimiento', 'validarEdad']
            ]
        );
    }

    public function validarEdad($attribute, $params){
        $max_age = date('Y-m-d',strtotime(date('Y-m-d').' -18 year'));
        if($this->$attribute > $max_age){
            $this->addError($attribute,'El usuario debe ser mayor o igual a 18 años de edad');
        }
    }

    public function fields()
    {
        return ArrayHelper::merge(parent::fields(), [
            'fecha_nacimiento' => function($model){
                return Yii::$app->formatter->asDate($this->fecha_nacimiento, 'php:Y-m-d');
            }
        ]);
        
    }
}
