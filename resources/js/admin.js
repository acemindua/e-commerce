import $ from 'jquery';

try {
    window.$ = window.jQuery = $;

    require('./bootstrap');
 }
 catch (e) {
    // инструкции для обработки ошибок
    console.log(e); // передать объект исключения обработчику ошибок
 }





