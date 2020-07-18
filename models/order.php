<?php
    namespace app\models;
     
    use app\models\clients;
    use app\models\orders;
    use app\controllers\ShopController;

    class order{
        public $name;
        public $phone;
        public $orderitems;

        public function __construct($data)
        {
            $this->orderitems = $data;
        }

        public function setattr(){
            $this->name = $_POST['name'];
            $ph = $_POST['phone'];
            $phi = str_replace(['(', '-', ' ', ')'], '', $ph);
            $this->phone = $phi;
        }
        public function addtodb(){
            
            $idshka = clients::find()->where(['phone' => $this->phone])->asArray()->one();
            $id = 0;
            if($idshka){
                $id = $idshka['id'];
            }else{
            $order = new clients();
            $order->name = $this->name;
            $order->phone = $this->phone;
            $time = date("Y-m-d H:i:s");
            $order->time = $time;
            if($order->validate()){
                $order->save();
            }else{
                header('Location: /?r=shop/');
            }
            $idshka = clients::find()->where(['phone' => $this->phone, 'name' => $this->name, 'time' => $time])->asArray()->orderBy(['id' => SORT_DESC])->limit(1)->all();
            $id = $idshka[0]['id'];
            }
            foreach($this->orderitems as $value){
                $items = new orders();
                $items->id = $id;
                $items->name = $value['name'];
                $items->price = $value['price'] * $value['count'];
                $items->count = $value['count'];
                $items->save();
            }
        }
    }
?>