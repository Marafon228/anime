<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $fio
 * @property string $date_birthday
 * @property string $address
 * @property string $email
 * @property string $login
 * @property string $password
 * @property string $phone
 * @property int $id_role
 * @property int $id_talisman
 * @property string $photo
 *
 * @property Frends[] $frends
 * @property Frends[] $frends0
 * @property Orders[] $orders
 * @property Role $role
 * @property Talismans $talisman
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'date_birthday', 'address', 'email', 'login', 'password', 'phone', 'id_role', 'id_talisman', 'photo'], 'required'],
            [['date_birthday'], 'safe'],
            [['id_role', 'id_talisman'], 'integer'],
            [['fio', 'address', 'email', 'login', 'password', 'phone', 'photo'], 'string', 'max' => 255],
            [['login'], 'unique'],
            [['email'], 'unique'],
            [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['id_role' => 'id']],
            [['id_talisman'], 'exist', 'skipOnError' => true, 'targetClass' => Talismans::class, 'targetAttribute' => ['id_talisman' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'date_birthday' => 'Date Birthday',
            'address' => 'Address',
            'email' => 'Email',
            'login' => 'Login',
            'password' => 'Password',
            'phone' => 'Phone',
            'id_role' => 'Id Role',
            'id_talisman' => 'Id Talisman',
            'photo' => 'Photo',
        ];
    }

    /**
     * Gets query for [[Frends]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFrends()
    {
        return $this->hasMany(Frends::class, ['id_user_1' => 'id']);
    }

    /**
     * Gets query for [[Frends0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFrends0()
    {
        return $this->hasMany(Frends::class, ['id_user_2' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'id_role']);
    }

    /**
     * Gets query for [[Talisman]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTalisman()
    {
        return $this->hasOne(Talismans::class, ['id' => 'id_talisman']);
    }
}
