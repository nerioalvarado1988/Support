<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tickets".
 *
 * @property number $Nro_Ticket
 * @property string $Departamento
 * @property string $Prioridad
 * @property string $Detalle
 * @property string $Usuario
 * @property string $FechaRegistro
 * @property number $Estatus
 * @property string $FechaSolucion
 */
class Tickets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tickets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Departamento', 'Prioridad', 'Detalle', 'Usuario', 'FechaRegistro', 'FechaSolucion'], 'required'],
            [['FechaRegistro', 'FechaSolucion'], 'safe'],
            [['Nro_Ticket'], 'number', 'max' => 6],
            [['Estatus'], 'number', 'max' => 1],
            [['Departamento', 'Usuario'], 'string', 'max' => 100],
            [['Prioridad'], 'string', 'max' => 20],
            [['Detalle'], 'string', 'max' => 800],
            [['Nro_Ticket'], 'unique'],
        ];
    }




    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Nro_Ticket' => 'Nro Ticket',
            'Departamento' => 'Departamento',
            'Prioridad' => 'Prioridad',
            'Detalle' => 'Detalle del Problema',
            'Usuario' => 'Usuario',
            'FechaRegistro' => 'Fecha Registro',
            'Estatus' => 'Estatus',
            'FechaSolucion' => 'Fecha Solucion',
        ];
    }
}
