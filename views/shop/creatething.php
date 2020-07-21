<?php
    if($success){
        $chtoto =Yii::$app->request->getCsrfToken();
        print <<<_HTML_
            <p>Вещь добавлена в магазин!</p><br/>
            <form method="POST" action="/?r=shop/create" enctype="multipart/form-data">
                <input type="hidden" name="_csrf" value="{$chtoto}" />
                <input type="text" class="form-control mb-2" name="name" placeholder="Название"/><br/>
                <textarea class="form-control mb-2" name="description" placeholder="Описание"></textarea><br/>
                <select class="form-control mb-2" name="have">
                    <option active>В наличии</option>
                    <option>Под заказ</option>
                </select><br/>
                <input class="form-control mb-2" type="file" name="image"/><br/>
                <input class="form-control mb-2" type="number" name="price"/><br/>
                <input class="btn btn-primary" type="submit" value="Добавить"/><br/>
            </form>
        _HTML_;
    }else{
        $chtoto =Yii::$app->request->getCsrfToken();
        print <<<_HTML_
            <form method="POST" action="/?r=shop/create" enctype="multipart/form-data">
                <input type="hidden" name="_csrf" value="{$chtoto}" />
                <input type="text" class="form-control mb-2" name="name" placeholder="Название"/><br/>
                <textarea class="form-control mb-2" name="description" placeholder="Описание"></textarea><br/>
                <select class="form-control mb-2" name="have">
                    <option active>В наличии</option>
                    <option>Под заказ</option>
                </select><br/>
                <input class="form-control mb-2" type="file" name="image"/><br/>
                <input class="form-control mb-2" type="number" name="price"/><br/>
                <input class="btn btn-primary" type="submit" value="Добавить"/><br/>
            </form>
        _HTML_;
    }
?>