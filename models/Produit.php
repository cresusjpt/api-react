<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produit".
 *
 * @property int $id
 * @property string $nom
 * @property string $description
 * @property float $prix
 * @property int $quantite
 * @property string $couleur
 * @property string $image
 * @property int $categorie
 * @property int $bestsell
 * @property string $other
 *
 * @property Categorie $categorie0
 */
class Produit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom', 'description', 'prix', 'quantite', 'couleur', 'image', 'categorie', 'bestsell', 'other'], 'required'],
            [['prix'], 'number'],
            [['quantite', 'categorie', 'bestsell'], 'integer'],
            [['couleur'], 'safe'],
            [['nom', 'description', 'image'], 'string', 'max' => 255],
            [['other'], 'string', 'max' => 11],
            [['categorie'], 'exist', 'skipOnError' => true, 'targetClass' => Categorie::className(), 'targetAttribute' => ['categorie' => 'id']],
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
            'prix' => 'Prix',
            'quantite' => 'Quantite',
            'couleur' => 'Couleur',
            'image' => 'Image',
            'categorie' => 'Categorie',
            'bestsell' => 'Bestsell',
            'other' => 'Other',
        ];
    }

    /**
     * Gets query for [[Categorie0]].
     *
     * @return \yii\db\ActiveQuery|CategorieQuery
     */
    public function getCategorie0()
    {
        return $this->hasOne(Categorie::className(), ['id' => 'categorie']);
    }

    /**
     * {@inheritdoc}
     * @return ProduitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProduitQuery(get_called_class());
    }
}
