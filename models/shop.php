<?php
    namespace app\models;

use Yii;
use yii\db\ActiveRecord;
    use yii\web\UploadedFile;

     class shop extends ActiveRecord{
        //public $name;
        //public $imgpath;
        //public $price;
        //public $have;
        public $pth;
        //public $description;
        public $image;

        public static function tableName(){
            return 'things';
        }

        public function rules()
        {
                return [
                    [['name', 'image', 'price', 'have', 'description'], 'required'],
                    [['name', 'description'], 'string'],
                    [['price'], 'integer'],
                    [['have'], 'string', 'max' => 30],
                    [['image'], 'file', 'skipOnEmpty' => false, 'extensions' =>'png, jpg', 'maxSize' => 16000000]
                ];
        }
        public function setattr(){
            $this->image = UploadedFile::getInstanceByName('image');
            $path = explode('/', tempnam('uploads/' , $this->image->basename));
            $this->pth = 'uploads/' . $path[count($path)-1] . '.' . $this->image->extension;
        }
        public function savetodb(){
            $this->name = $_POST['name'];
            $this->have = $_POST['have'];
            $this->price = (int)$_POST['price'];
            $this->description = $_POST['description'];
            $this->imagepath = $this->pth;
            if($this->validate()){
                $this->save();
                $this->image->saveAs($this->pth);
            }
        }
        //public function getall(){
          //  $data = $this->find()->orderBy('name')->all();
            //return $data;
        //}
        //public function search($name){
          //  $data = $this->find()->orderBy('name')->where(['name' => $name])->all();
            //return $data;
        //}public function searchbyid($idt){
          //  $data = $this->find()->where(['id' => $idt])->one();
            //return $data;
        //}
     }
?>