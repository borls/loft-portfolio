// Модуль модального окна
var modal = (function () {

    var init = function () {
        console.log('Инициализация модуля modal');
        _setUpListeners();
    };

    // Слушатель событий
    var _setUpListeners = function () {
        $('form').on('click touchstart', '.form-error.close, .form-success.close', _removeInfoBox);
            //.on('keydown', 'input, textarea', _removeError)
            //.on('change', '#load_image', _removeError);
        $('.modal').on('click', '.icon-close', hide);
    };

    // Убрать индикаторы ошибки
    function _removeInfoBox(event) {
        console.log('Убираем индикаторы ошибки');

        event.preventDefault();

        //$(this).parents('.form-info').hide();

        var boxError = $(this).parents('.form-error');
        var boxSuccess = $(this).parents('.form-success');

        if (boxError.length) {
            boxError.hide();
        } else if (boxSuccess.length) {
            boxSuccess.hide();
            //...
        }
    }

    var show = function (name) {
        $('.modal[data-name="' + name + '"]').show();
    };

    var hide = function (name) {
        if (typeof name === 'string'){
            $('.modal[data-name="' + name + '"]').hide();
        } else {
            // name - ie.Event object
            // console.log(name);
            $('.modal').hide();
        }
    };

    return {
        // Инициализация модуля
        init: init,
        show: show,
        hide: hide
    }
}());

modal.init();