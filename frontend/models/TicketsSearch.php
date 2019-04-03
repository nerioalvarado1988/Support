<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tickets;

/**
 * TicketsSearch represents the model behind the search form of `app\models\Tickets`.
 */
class TicketsSearch extends Tickets
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nro_Ticket'], 'integer'],
            [['Estatus'], 'integer'],
            [['Departamento', 'Prioridad', 'Detalle', 'Usuario', 'FechaRegistro', 'FechaSolucion'], 'safe'],
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
        $query = Tickets::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Nro_Ticket' => $this->Nro_Ticket,
            'Estatus' => $this->Estatus,
            'FechaRegistro' => $this->FechaRegistro,
            'FechaSolucion' => $this->FechaSolucion,
        ]);

        $query->andFilterWhere(['like', 'Departamento', $this->Departamento])
            ->andFilterWhere(['like', 'Prioridad', $this->Prioridad])
            ->andFilterWhere(['like', 'Detalle', $this->Detalle])
            ->andFilterWhere(['like', 'Usuario', $this->Usuario]);

        return $dataProvider;
    }
}
