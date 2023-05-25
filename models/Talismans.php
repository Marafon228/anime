<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "talismans".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $photo
 * @property int $mes
 *
 * @property Products[] $products
 * @property Users[] $users
 */
class Talismans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'talismans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'photo', 'mes'], 'required'],
            [['description'], 'string'],
            [['mes'], 'integer'],
            [['name', 'photo'], 'string', 'max' => 255],
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
            'photo' => 'Photo',
            'mes' => 'Mes',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['id_talisman' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::class, ['id_talisman' => 'id']);
    }
}
