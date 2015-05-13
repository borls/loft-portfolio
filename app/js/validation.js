// Модуль валидации
var validation = (function () {

    var init = function () {
        console.log('Инициализация модуля validation');
        _setUpListeners();
    };

    // Прослушивает все события
    var _setUpListeners = function () {
        $('form')
            .on('click touchstart', '.form-error.close, .form-success.close', _removeInfoBox)
            .on('keydown', '.has-error > .field', _removeError) // удаляем красную обводку у элементов форм
            .on('reset', _clearForm); // при сбросе формы удаляем также: тултипы, обводку, сообщение от сервера
    };

    // Проверяет, чтобы все поля формы были не пустыми. Если пустые - вызывает тултипы
    var validateForm = function ($form) {
        console.log('Проверяем форму');

        var $elements = $form.find('.field-required input, .field-required textarea');//.not('input[type="file"], input[type="hidden"]');
        var valid = true;

        //$.each($elements, function (index, element) {
        $elements.each(function (index, element) {
            var $element = $(element);
            var val = $element.val();

            if (val.length === 0) {
                // делаем поле красным и показываем тултип-ошибку
                $element.parent().addClass('has-error');
                valid = false;
            }

        }); // each

        return valid;
    };


    // Убирает красную обводку у элементов форм
    var _removeError = function () {
        console.log('Красная обводка у элементов форм удалена');

        $(this).parent().removeClass('has-error');
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

    // Очищает форму
    var _clearForm = function () {
        console.log('Очищаем форму');

        $(this)
            //.find('.input, .textarea').trigger('hideTooltip').end() // удаляем тултипы
            .find('.has-error').removeClass('has-error').end() // удаляем красную подсветку
            .find('.server-message').text('').hide(); // очищаем и прячем сообщения с сервера
    };

    return {
        init: init,
        validateForm: validateForm
    };

})();

validation.init();