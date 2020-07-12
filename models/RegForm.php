<?php
    namespace app\models;
    use yii\base\Model;

    class RegForm extends Model{
        public $name;
        public $phone;
        public $email;
        
        public function rules(){
            return[
                [['name', 'phone', 'email'], 'required'],
                ['email', 'email'],
                [['phone', 'name'], 'string'],
                ['phone', 'match', 'pattern' => '$\+[0-9]{11}$', 'message' => 'Введте номер в указанном формате']
            ];
        }
    }
?>