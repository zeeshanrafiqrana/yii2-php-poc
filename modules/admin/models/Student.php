<?php

namespace app\modules\admin\models;
use yii\db\Query;
use Yii;
/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $name
 * @property string|null $email
 * @property string $phone_no
 * @property string|null $profile_pic
 * @property string $password
 * @property string $created_at
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone_no', 'password'], 'required'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 40],
            [['email'], 'string', 'max' => 20],
            [['phone_no'], 'string', 'max' => 14],
            [['profile_pic', 'password'], 'string', 'max' => 200],
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
            'email' => 'Email',
            'phone_no' => 'Phone No',
            'profile_pic' => 'Profile Pic',
            'password' => 'Password',
            'created_at' => 'Created At',
        ];
    }
 
}
