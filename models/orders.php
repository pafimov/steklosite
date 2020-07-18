<?php
    namespace app\models;

    use yii\db\ActiveRecord;

    class orders extends ActiveRecord{
        public static function tableName(){
            return 'ordee';
        }
    }
?>