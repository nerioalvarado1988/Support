<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $Usuario;
    public $email;
    public $password;
    public $Departamento;
    public $Rol;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['Usuario', 'trim'],
            ['Usuario', 'required'],
            ['Usuario', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este Usuario ya se encuentra registrado'],
            ['Usuario', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este email ya se encuentra en uso por otro usuario'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['Rol', 'required'],
            ['Rol', 'string', 'max' => 1],

            ['Departamento', 'required'],
            ['Departamento', 'string', 'min' => 8, 'max' => 255],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->Usuario = $this->Usuario;
        $user->email = $this->email;
        $user->Rol = $this->Rol;
        $user->Departamento = $this->Departamento;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
