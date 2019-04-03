<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respuesta".
 *
 * @property int $Nro_Ticket
 * @property string $Respuesta
 */
class respuesta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'respuesta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nro_Ticket', 'Respuesta'], 'required'],
            [['Nro_Ticket'], 'integer'],
            [['Respuesta'], 'string', 'max' => 400],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Nro_Ticket' => 'Nro Ticket',
            'Respuesta' => 'Respuesta',
        ];
    }
}
