// Модуль модального окна
var modal = (function () {

    var init = function () {
        console.log('Инициализация модуля modal');
        _setUpListeners();
    };

    // Слушатель событий
    var _setUpListeners = function () {
        $('form').on('click touchstart', '.server-message.close', _removeServerMessage);
            //.on('keydown', 'input, textarea', _removeError)
            //.on('change', '#load_image', _removeError);
        $('.modal').on('click', '.icon-close', hide);

        // добавление файла
        $('.modal-input-file').change(_getFileName);
    };

    // Убрать серверные сообщения
    function _removeServerMessage(event) {

        event.preventDefault();

        $(this).parents('.server-message').hide();
    }

    // Функция вывода имя прикрепленого файла
    function _getFileName(event) {

        var path = event.target.value;
        var title = event.target.title;
        var $file = $('#load_image');
        if (!path) return $file.val(title);

        var i = path.lastIndexOf('\\') + 1;
        var filename = path.slice(i);

        $file.val(filename);
    }

    var show = function (name) {
        $('.modal[data-name="' + name + '"]').show();
    };

    var hide = function (name) {
        if (typeof name === 'string'){
            $('.modal[data-name="' + name + '"]').hide();
        } else {
            // name - ie.Event object
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