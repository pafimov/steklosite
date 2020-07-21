<?php
    print '<div class="row shadow-sm">';
    if(($data) && (count($data ?? []) > 0)){
    $chtoto =Yii::$app->request->getCsrfToken();
    print <<<_HTML_
        
                    <div class="col-5"><small class="text-muted">Название</small></div>
                    <div class="col-2"><small class="text-muted">Количество</small></div>
                    <div class="col-3"><small class="text-muted">Цена</small></div>
    _HTML_;
    foreach ($data as $key => $value){
        $price = $value['price'] * $value['count'];
        print <<<_HTML_
                    <p class="col-5">{$value['name']}</p>
                    <p><div class="col-2">{$value['count']}</div>
                    <p><div class="col-3">{$price} руб.</div>
                    <form class="col-2" action="/?r=shop/cart" method="POST"><input type="hidden" name="_csrf" value="{$chtoto}" /><button class="btn" name="delfromcart" value="{$key}"><p>X</p></button></form>          
        _HTML_;
    }
    print <<<_HTML_
            <form class="col-12" action="/?r=shop/cart" method="POST">
                <input type="hidden" name="_csrf" value="{$chtoto}" />
                <input class="btn btn-secondary col-12 col-sm-4 col-md-3" type="submit" name="cleancart" value="Очистить корзину"/>
                <input class="btn btn-primary col-12 col-sm-4 col-md-3" type="submit" name="processorder" value="Оформить заказ"/>
            </form>
        _HTML_;
    }else{
        print '<p class="ml-3 my-2">Корзина пуста</p>';
    }
?>