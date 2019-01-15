<?php

namespace frontend\models;

use common\models\Treino;
use common\models\User;
use Yii;

/**
 * This is the model class for table "user_treino".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_treino
 *
 * @property User $user
 * @property Treino $treino
 */
class UserTreino extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'user_treino';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_treino'], 'required'],
            [['id_user', 'id_treino'], 'integer'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_treino'], 'exist', 'skipOnError' => true, 'targetClass' => Treino::className(), 'targetAttribute' => ['id_treino' => 'id_treino']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_treino' => 'Id Treino',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTreino()
    {
        return $this->hasOne(Treino::className(), ['id_treino' => 'id_treino']);
    }

    public function getNome()
    {
        return $this->treino;
    }

    public function getId_dificuldade()
    {
        return $this->treino;
    }

    public function getId_categoria()
    {
        return $this->treino;
    }


}
