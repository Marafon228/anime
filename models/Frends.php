<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "frends".
 *
 * @property int $id
 * @property int $id_user_1
 * @property int $id_user_2
 *
 * @property Users $user1
 * @property Users $user2
 */
class Frends extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'frends';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user_1', 'id_user_2'], 'required'],
            [['id_user_1', 'id_user_2'], 'integer'],
            [['id_user_1'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['id_user_1' => 'id']],
            [['id_user_2'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['id_user_2' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user_1' => 'Id User 1',
            'id_user_2' => 'Id User 2',
        ];
    }

    /**
     * Gets query for [[User1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser1()
    {
        return $this->hasOne(Users::class, ['id' => 'id_user_1']);
    }

    /**
     * Gets query for [[User2]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser2()
    {
        return $this->hasOne(Users::class, ['id' => 'id_user_2']);
    }
}
