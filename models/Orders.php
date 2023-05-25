<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $fio_kl
 * @property string $time_stamp
 * @property int $id_user
 * @property string $dismiss
 * @property string $status
 *
 * @property ProductsOrder[] $productsOrders
 * @property Users $user
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio_kl', 'id_user', 'dismiss'], 'required'],
            [['time_stamp'], 'safe'],
            [['id_user'], 'integer'],
            [['dismiss', 'status'], 'string'],
            [['fio_kl'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio_kl' => 'Fio Kl',
            'time_stamp' => 'Time Stamp',
            'id_user' => 'Id User',
            'dismiss' => 'Dismiss',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[ProductsOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsOrders()
    {
        return $this->hasMany(ProductsOrder::class, ['id_order' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'id_user']);
    }
}
