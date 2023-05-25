<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_order".
 *
 * @property int $id
 * @property int $id_order
 * @property int $id_product
 * @property int $quantity
 *
 * @property Orders $order
 * @property Products $product
 */
class ProductsOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_order', 'id_product', 'quantity'], 'required'],
            [['id_order', 'id_product', 'quantity'], 'integer'],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::class, 'targetAttribute' => ['id_order' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['id_product' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_order' => 'Id Order',
            'id_product' => 'Id Product',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::class, ['id' => 'id_order']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::class, ['id' => 'id_product']);
    }
}
