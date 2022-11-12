<?php

namespace app\models;

use Yii;
use app\components\CountryValidator;
/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $name
 * @property string $surename
 * @property string $phone
 * @property string $tag
 * @property string $address
 * @property string $created_at
 * @property int $ref_id
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone','ref_id'], 'required'], 
            [['tag', 'address'], 'string'],   
            //['address','compare','compareAttribute'=>'email','message'=>'Not match'],
           // ['ref_id','compare','compareValue'=>'30','operator'=>'>=','type'=>'number'],
            ['name','required','message'=>'User Name must be filled'],
            ['surename','required','message'=>'Email ID must be filled'],
            [['created_at'], 'safe'], 
            [['ref_id'], 'integer'],
            ['profile','file'], // extension=>'jpg,pnf,pdf'
            [['name', 'surename'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 12,'min'=>6],      
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
            'surename' => 'Surename',
            'phone' => 'Phone',
            'tag' => 'Tag',
            'address' => 'Address',
            'created_at' => 'Created At',
            'ref_id' => 'Ref ID', 
            'profile'=>'Profile'
        ];
    }
}
