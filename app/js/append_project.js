// Модуль добавления проекта
var appendProject = (function () {

    var init = function () {
        console.log('Инициализация модуля appendProject');
        _setUpListeners();
    };

    // Слушатель событий
    var _setUpListeners = function () {
        $('.project-append').on('click', _showModal); // открыть модальное окно
        $('.form[name="project-append"]').on('submit', _appendProject); // добавление проекта
    };

    // Показать модальное окно
    var _showModal = function () {
        console.log('Вызов модального окна');

        modal.show('project-append');
    };

    var _appendProject = function (event) {
        console.log('Работаем с формой добавления проекта');

        event.preventDefault();

        var $form = $(this);
        var url = '/php/project-append.php';
        var defObject = _ajaxForm($form, url);

        if (defObject) {
            defObject.done(function (response) {
                console.log('ajax response', response);
                var message = response.message;
                var status = response.status;

                if (status === 'OK') {
                    $form.trigger('reset');
                    $form.find('.success-message').text(message).show();
                } else {
                    $form.find('.error-message').text(message).show();
                }
            });
        }
    };

    var _ajaxForm = function ($form, url) {

        if (!validation.validateForm($form)) return false;  // Возвращает false, если не проходит валидацию
        var data = $form.serialize(); // собираем данные из формы в объект data

        console.log(data);
        return $.ajax({ // Возвращает Deferred Object
            type: 'POST',
            url: url,
            dataType: 'JSON',
            data: data
        }).fail(function (response) {
            console.log('Проблемы в PHP', response);
            $form.find('.error-mes').text('На сервере произошла ошибка').show();
        }).always(function () {
            //submitBtn.attr('disabled', false);
        });
    };

    return {
        init: init
    };

})();

appendProject.init();