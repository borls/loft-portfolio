// Модуль "связаться со мной"
var feedback = (function () {

    var init = function () {
            console.log('Инициализация модуля feedback');
            _setUpListeners();
        },
        _setUpListeners = function () {
            $('.form[name="feedback"]').on('submit', _submitForm); // отправка формы "связаться со мной"
        },
        _submitForm = function (event) {
            console.log('Работаем с формой связи');

            // отменяем родной сабмит
            event.preventDefault();

            var $form = $(this);
            var url = 'backend/feedback.php';
            var defObject = _ajaxForm($form, url);

            if (typeof defObject === 'object') {
                defObject.done(function (response) {
                    var message = response.message;
                    var status = response.status;

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

            // Возвращает false, если не проходит валидацию
            // html5 required - не работает в IE8
            //if (!validation.validateForm($form)) return false;

            // собираем данные из формы в объект data
            var data = $form.serialize();

            return $.ajax({ // Возвращает Deferred Object
                type: 'post',
                url: 'backend/feedback.php',
                dataType: 'json',
                data: data
            }).done(function (response, textStatus, jqXHR){
                // Log a message to the console
                console.log("Hooray, it worked!");
            }).fail(function (response) {
                console.error('Проблемы в PHP');
                $form
                    .find('.server-error').show()
                    .find('.message-body').text('На сервере произошла ошибка');
            });
        };

    return {
        init: init
    };
})();

feedback.init();
