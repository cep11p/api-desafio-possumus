<?php
namespace app\modules\api\controllers;

use app\models\User;
use Yii;
use yii\rest\ActiveController;
use yii\web\HttpException;
use yii\web\Response;


class UserController extends ActiveController{
    
    public $modelClass = 'app\models\User';
    
    public function behaviors()
    {

        $behaviors = parent::behaviors();     

        $auth = $behaviors['authenticator'];
        unset($behaviors['authenticator']);

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className()
        ];

        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;

        $behaviors['authenticator'] = $auth;

    //    $behaviors['authenticator'] = [
    //        'class' => \yii\filters\auth\HttpBearerAuth::className(),
    //    ];

        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator']['except'] = ['options'];     

    //    $behaviors['access'] = [
    //        'class' => \yii\filters\AccessControl::className(),
    //        'only' => ['@'],
    //        'rules' => []
    //    ];



        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['update']);
        unset($actions['delete']);
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }
    
    public function prepareDataProvider() 
    {
        $searchModel = new \app\models\UserSearch();
        $params = \Yii::$app->request->queryParams;
        $resultado = $searchModel->search($params);

        return $resultado;
    }

    public function actionModificar($nro_documento)
    {
        $param = Yii::$app->request->post();
        $transaction = Yii::$app->db->beginTransaction();
        try {
            
            /************ Persona *************/
            $model = User::findOne(['nro_documento'=>$nro_documento]);
            
            if($model==NULL){
                $msj = 'El usuario no existe!';
                throw new HttpException($msj);
            }            
            $model->setAttributes($param);       
                 
            if(!$model->save()){
                throw new HttpException(400,json_encode($model->getErrors()));
            }
            
           
            $transaction->commit();
            
            $resultado['success'] =  true;
            $resultado['data']['id'] =  $model->id;
            return $resultado;
           
        }catch (HttpException $exc) {            
            $transaction->rollBack();
            $mensaje =$exc->getMessage();
            $code = (empty($exc->getCode()))?400:$exc->getCode();
            throw new \yii\web\HttpException($code,$mensaje);

        }

    }

    public function actionBorrarUsuario($nro_documento)
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            
            /************ Persona *************/
            $model = User::findOne(['nro_documento'=>$nro_documento]);
            
            #chequeamos si el usuario existe
            if($model==NULL){
                $msj = "Usuario $nro_documento no encontrado";
                throw new HttpException(400,$msj);
            }            
             
            #chequeamos si por algun motivo no se pudo borrar el usuario
            if(!$model->delete()){
                throw new HttpException(400,json_encode($model->getErrors()));
            }
           
            $transaction->commit();
            
            $resultado['message'] =  "Se borra el usuario $nro_documento";
            return $resultado;
           
        }catch (HttpException $exc) {            
            $transaction->rollBack();
            $mensaje =$exc->getMessage();
            $code = (empty($exc->getCode()))?400:$exc->getCode();
            throw new \yii\web\HttpException($code,$mensaje);

        }

    }
    
}