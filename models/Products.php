<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property string $time_stamp
 * @property string $photo
 * @property int $quantity
 * @property int $id_talisman
 * @property int $id_category
 *
 * @property Category $category
 * @property ProductsOrder[] $productsOrders
 * @property Talismans $talisman
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price', 'photo', 'quantity', 'id_talisman', 'id_category'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['time_stamp'], 'safe'],
            [['quantity', 'id_talisman', 'id_category'], 'integer'],
            [['name', 'photo'], 'string', 'max' => 255],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id']],
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
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'time_stamp' => 'Time Stamp',
            'photo' => 'Photo',
            'quantity' => 'Quantity',
            'id_talisman' => 'Id Talisman',
            'id_category' => 'Id Category',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[ProductsOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsOrders()
    {
        return $this->hasMany(ProductsOrder::class, ['id_product' => 'id']);
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
