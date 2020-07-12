<?php
    use yii\helpers\Html;
    //var_dump($data);
    //exit;
    if($data['success'] ?? true){   
        //var_dump( $data['name']);   
        print <<<_HTML_
            <b> {$data['name']} </b>
            <img src=" {$data['imagepath']} " width=30%/><br/>
            {$data['have']} <br/>
            {$data['description']} <br/>
            <pre> {$data['price']} руб</pre><br/>
            <form method="POST" action="/?r=shop/thing&id={$data['id']} ">
                <input type="number" name="count" value="1"/>
                <input type="submit"/>
            </form>
        _HTML_;
        $a = 'll';
        //var_dump($a);
        //exit;
    }else{
        print <<<_HTML_
            <b>We do not have this thing</b>
        _HTML_;
        $a = 'll';
        //var_dump($a);
        //exit;
    }
?>