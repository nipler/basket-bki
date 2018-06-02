$(document).ready(function(){
    
    
    $('.addtoBasket').click(function(){
        var good = $(this).attr('data-good');
        addToBasket(good)
    })
    
    
    if($('.basket').length) {
        getBasket()
    }
})

function addToBasket(good) {
    $.post('/basket/add', {id: good}, function(data){
        var n = 0;
        var count = 0;
        var sum = 0;
        var str = '';
        $.each(data, function(k, v) {
            count += v.count;
            sum += parseInt(v.price)*v.count;
            n++;
        })
        if(n == 0) {
            str = 'В вашей корзине нет товаров';
        }
        else {
            str = 'В вашей корзине товаров '+n+' на сумму '+sum+' руб. <p><a href="/basket">Перейти в корзину</a></p>';
        }
        $('.basket').html(str)
     
     }, "json")
}

function getBasket() {
    $.post('/basket/get', {}, function(data){
        //
        var n = 0;
        var count = 0;
        var sum = 0;
        var str = '';
        $.each(data, function(k, v) {
            count += v.count;
            sum += parseInt(v.price)*v.count;
            n++;
        })
        if(n == 0) {
            str = 'В вашей корзине нет товаров';
        }
        else {
            str = 'В вашей корзине товаров '+n+' на сумму '+sum+' руб. <p><a href="/basket">Перейти в корзину</a></p>';
        }
        $('.basket').html(str)
     }, "json")
}