<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Employee;

/**
 * EmployeeCrud represents the model behind the search form of `app\models\Employee`.
 */
class EmployeeCrud extends Employee
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ref_id'], 'integer'],
            [['name', 'surename', 'phone', 'tag', 'address', 'created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Employee::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
           /*  'pagination'=>[
                 'pageSize'=>2
             ],   */
           //  'pagination'=>false,
        /*    'sort'=>[
               'attributes'=>['name','email'],
               'defaultOrder'=>['name'=>SORT_DESC,'email'=>SORT_ASC]
           ],
           'sort'=>false */
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'ref_id' => $this->ref_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surename', $this->surename])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }

    public function genderData($data,$key,$index){
        $newData = ucwords($data->tag);
        return $newData;
    }
}
