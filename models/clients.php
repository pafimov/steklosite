<?php
    namespace app\models;

    use yii\db\ActiveRecord;

    class clients extends ActiveRecord{
        public function rules(){
            return [
                [['name', 'phone'], 'required'],
                ['name', 'string', 'length' => [2, 14]],
                ['phone', 'string', 'length' => [12]],
                ['phone', 'match', 'pattern' => '$\+[0-9]{11}$', 'message' => 'Введите номер в указанном формате']
            ];
        }
    }
?>