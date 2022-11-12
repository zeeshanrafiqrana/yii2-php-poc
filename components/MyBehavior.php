<?php

namespace app\components;

use yii\base\Behavior;
use yii\db\ActiveRecord;
use Yii;
Class MyBehavior extends Behavior{

    public $prop1;

    private $_prop2;

    public function getProp2()
    {   
        return $this->_prop2.'-';
    }

    public function setProp2($value)
    {
        $this->_prop2 = $value.'-z';
    }
 
    public function events()
    {
        echo  $this->prop1.'=============='.$this->_prop2;  
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
        ];  
    }

    public function beforeValidate($event)
    {
        //
    }
}