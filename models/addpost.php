<?php
    namespace app\models;

    use yii\base\Model;
    use app\models\posts;
    use Yii;
    
    class addpost extends Model{
        public $text;
        public $image;
        public $timer;
        public $imgpath;
        public function rules()
        {
            return [
                ['text', 'required'],
                [['image'], 'file', 'skipOnEmpty' => false, 'extensions' =>'png, jpg']
            ];
        }
        public function savephoto()
        {
            if($this->validate()){
                $bn = $this->image->basename;
                $this->imgpath = 'uploads/' . $bn . '.' . $this->image->extension;
                $this->image->saveAs($this->imgpath);
                return true;
            }else{
                return false;
            }
        }
        public function addtodb(){
            $post = new posts();
            $post->time = $this->timer;
            $post->text = $this->text;
            $post->imgpath = $this->imgpath;
            $post->save();
        }
    }
?>