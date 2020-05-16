function megMenuInit(){
    $('.megamenu').on('click', function(e) {
        e.stopPropagation();
    });
}
var insertAppend    = true;
var ajaxContainer   =  $('.js-pagination-ajax_content');

function ajaxPagination(){
    $('.js-pagination a').click( function (e) {
        e.preventDefault();

        var activeNumber    = $('.js-pagination .page-item:not(.disabled).active').index(),
            thisPageNumber = $(this).parent().index();

        if(thisPageNumber === 0){
            thisPageNumber = activeNumber-1;
        }
        //console.log(thisPageNumber ,activeNumber);
        if( thisPageNumber < activeNumber ){
            var elem = $('.js-page-'+thisPageNumber);
            if( typeof(elem) !=='undefined' && elem.lenth ){
                setTimeout( function () {
                    var scrollTop = elem.offset().top - 100;
                    $('html, body').animate({scrollTop: scrollTop}, 500);
                    //$(document).scrollTop(scrollTop);
                }, 1500 );
                insertAppend    = true;
                return false;
            }else{
                //console.log('no page');
                insertAppend = false;
                //console.log(insertAppend);
            }

        }

        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'GET',
            error: function (e) {
                console.log(e);
                window.location = url;
            },
            beforeSend: function(){

                if(!insertAppend){
                    var scrollTop = ajaxContainer.offset().top-100;
                    $('html, body').animate({scrollTop: scrollTop}, AjaxDuration);
                }

            },
            success: function (resalt) {

                if(!insertAppend){
                    setTimeout( function () {
                        appendHtml(resalt['content'], insertAppend);
                    }, AjaxDuration+300);
                }else{
                    appendHtml(resalt['content'], insertAppend);
                }

                var pageBefore  = url.split('?page='), pageAfter = pageBefore[1].split('&');
                if(pageAfter == '1')
                    url = pageBefore[0];

                history.pushState(null, null, url);
                $('.js-pagination').html(resalt['pagination']);
                ajaxPagination();
            }
        });
    });
}

/* Элемент руководящей загрузкой - в его полях содержим все опции необходимые
  для выборки очередной порции данных или прекращения загрузки */
var loaderManagerElementId = '#loader-manager'; // элемент, руководящий загрузкой

var loadAjax = false; // индикатор выполняения запроса подгрузки ленты

function initScrollingLoad() {

    $loadManager = $(loaderManagerElementId);
    $(window).scroll(function() {

        // Проверяем пользователя, находится ли он в нижней части страницы

        if (($(window).scrollTop() + $(window).height() > $(document).height() - distanceFromBottomToStartLoad) && !loadAjax) {

           // console.log('infinit load event!!');

            // Идет процесс
            loadAjax = true;

            // Сообщить пользователю что идет загрузка данных
            // $this.find('.loading-bar').html('Загрузка данных');

            // Запустить функцию для выборки данных с установленной задержкой
            // Это полезно, если у вас есть контент в футере
            setTimeout(function() {

                var url  = $('.js-pagination .page-item.active').next().find('a').attr('href');
                //console.log('url = '+url);
                if( typeof(url) !== 'undefined' )
                    sendAjax(url); // передаём необходимые данные функции отправки запроса

            }, 30);

        }
    });
}


function sendAjax(url, data)
{
    // showLoaderIdenity(); //  показываем идентификатор загрузки
    $.ajax({ //  сам запрос
        type:   'GET',
        url:    url,
        dataType: "json" // предполоижтельный формат ответа сервера
    }).done(function(resalt) { // если успешно
        // hideLoaderIdenity(); // скрываем идентификатор загрузки
        appendHtml(resalt['content'], insertAppend);
        //history.pushState(null, null, url);
        $('.js-pagination').html(resalt['pagination']);
        if (resalt.finished) { // если получили признак завершения прокрутки
            stopLoadTrying();
        }

        loadAjax = false; // укажем, что данный цикл загрузки завершён
        //console.log('Ответ получен: ', resalt);

        if (resalt.success) { // если все хорошо
            //console.log('ОК!)');
            ajaxPagination();

        } else { // если не нравится результат
            console.log('Пришли не те данные!');
           // alert(resalt.message);
        }
    }).fail(function() { // если ошибка передачи
        //hideLoaderIdenity();
        loadAjax = false;
        console.log('Ошибка выполнения запроса!');
    });
}

function appendHtml(html) {

    //console.log(insertAppend);

    if(insertAppend){
        ajaxContainer.append(html);
    }else{
        ajaxContainer.html(html);
        initScrollingLoad();
    }

    if( typeof DISQUSWIDGETS != 'undefined')
        DISQUSWIDGETS.getCount({reset: true});

}


function stopLoadTrying() {
    $(window).off('scroll'); // отвязываем обработку прокрутки от окна
}


function scrollTopButtonInit(){
    $(window).scroll(function(){
        if($(window).scrollTop() > 100) {
            $('#scroll_top').show();
        } else {
            $('#scroll_top').hide();
        }
    });

    $('#scroll_top').click(function(){
        $('html, body').animate({scrollTop: 0}, 600);
        return false;
    });
}



$(document).ready(function(){
    megMenuInit();
    ajaxPagination();
    initScrollingLoad();
    multiImagesInit();
   // scrollTopButtonInit();

});
