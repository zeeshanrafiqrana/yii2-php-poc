<?php

namespace app\components;

use yii\validators\Validator;

class CountryValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {   echo $model->$attribute; die;
        if (in_array($model->$attribute, ['USA', 'Indonesia'])) {
            $this->addError($model, $attribute, 'The country must be either "{name}" or "{country2}".', ['name' => 'USA', 'country2' => 'Indonesia']);
        }
    }
}