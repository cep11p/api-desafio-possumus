<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
* userSearch represents the model behind the search form about `app\models\User`.
*/
class UserSearch extends User
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['id', 'fecha_nacimiento'], 'integer'],
            [['nombre', 'apellido', 'email', 'nro_documento'], 'safe'],
        ];
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
    * Creates data provider instance with search query applied
    *
    * @param array $params
    *
    * @return ActiveDataProvider
    */
    public function search($params)
    {
        $query = User::find();

        $paginacion = [
            "pageSize"=>$pagesize = (!isset($params['pagesize']) || !is_numeric($params['pagesize']) || $params['pagesize']==0)?10:intval($params['pagesize']),
            "page"=>(isset($params['page']) && is_numeric($params['page']))?$params['page']:0
        ];
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => $paginacion
        ]);


        $this->load($params,'');

        if (!$this->validate()) {
        // uncomment the following line if you do not want to any records when validation fails
        // $query->where('0=1');
        return $dataProvider;
        }

        $query->andFilterWhere([
            'nro_documento' => $this->nro_documento,
        ]);

        /******* Se obtiene la coleccion******/
        $coleccion = array();
        foreach ($dataProvider->getModels() as $value) {
            $coleccion[] = $value->toArray();
        }
        
        $paginas = ceil($dataProvider->totalCount/$pagesize);           
        $resultado['pagesize']=$pagesize;            
        $resultado['pages']=$paginas;            
        $resultado['total_filtrado']=$dataProvider->totalCount;
        $resultado['resultado']=$coleccion;

        return $resultado;
    }
}