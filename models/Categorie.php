<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categorie".
 *
 * @property int $id
 * @property string $nom
 * @property string $description
 *
 * @property Produit[] $produits
 */
class Categorie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorie';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom', 'description'], 'required'],
            [['nom', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nom' => 'Nom',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Produits]].
     *
     * @return \yii\db\ActiveQuery|ProduitQuery
     */
    public function getProduits()
    {
        return $this->hasMany(Produit::className(), ['categorie' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CategorieQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategorieQuery(get_called_class());
    }
}
