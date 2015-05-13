// Модуль авторизации
var authorization = (function () {

    var init = function () {
        console.log('Инициализация модуля authorization');
        _setUpListeners();
    };
    var _setUpListeners = function () {
        $('.form[name="authorization"]').on('submit', _submitForm); // отправка формы "связаться со мной"
    };
    var _submitForm = function (event) {
            console.log('Работаем с формой связи');

            event.preventDefault();

            var $form = $(this);
            var url = '/php/authorization.php';
            var defObject = _ajaxForm($form, url);

            if (defObject) {
                defObject.done(function (response) {
                    var message = response.message,
                        status = response.status;

                    if (status === 'OK') {
                        $form.trigger('reset');
                        $form.find('.server-success').text(message).show();
                    } else {
                        $form.find('.server-error').text(message).show();
                    }
                });
            }
        },
        _ajaxForm = function ($form, url) {

            if (!validation.validateForm($form)) return false;  // Возвращает false, если не проходит валидацию
            var data = $form.serialize(); // собираем данные из формы в объект data

            return $.ajax({ // Возвращает Deferred Object
                type: 'POST',
                url: url,
                dataType: 'JSON',
                data: data
            }).fail(function (ans) {
                console.error('Проблемы в PHP');
                $form.find('.server-error').show().find('.message-body').text('На сервере произошла ошибка');
            });
        };

    return {
        init: init
    };

})();

authorization.init();