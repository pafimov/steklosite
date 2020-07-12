<?php
    namespace app\models;

    //use app\models\shop;

    class shopsearch extends shop{
        public function getall(){
            $data = parent::find()->orderBy('name')->asArray()->all();
            return $data;
        }
        public function byid($id){
            $data = parent::find()->where(['id' => $id])->asArray()->one();
            return $data;
        }
        public function byname($name){
            $data = parent::find()->orderBy('name')->where(['like', 'name', $name])->asArray()->all();
            return $data;
        }
    }
?>