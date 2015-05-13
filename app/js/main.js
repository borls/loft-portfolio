// Для старых браузеров подключаем jquery.placeholder
if (!Modernizr.input.placeholder){
    $('input, textarea').placeholder();
}

var model = (function () {

    // Слушатель событий
    function _setUpListeners() {
        console.log('_setUpListeners');
        // Нажатие на кнопку меню
        $('.btn-menu').on('click touchstart', _toggleMenu);

        // Изменение размеров окна
        $(window).resize(_closeMenu);

        // Событие появления окна "Добавление нового проекта"
        $('.project-append').on('click touchstart', _appendProject);
        console.log($('.project-append').length, $('.project-append').click())

        // Добавление файла проекта
        $('#load_image').change(function (e) {
            _getName(this.value, this.title)
        });

        // Форма
        $('form')
            .on('click touchstart', '.form-error.close, .form-success.close', _closeError)
            // Валидация формы
            .on('submit', _submitForm)
            .on('click touchstart', '.reset', _resetForm)
            .on('keydown', 'input, textarea', _removeError)
            .on('change', '#load_image', _removeError);
    }

    // Убрать индикаторы ошибки
    function _closeError(event) {
        console.log('_closeError');
        event.preventDefault();
        var boxError = $(this).parents('.form-error');
        var boxSuccess = $(this).parents('.form-success');

        if (boxError.length) {
            boxError.hide();
        } else if (boxSuccess.length) {
            boxSuccess.hide();
            //...
        }
    }

    // Показать/свернуть меню
    function _toggleMenu(event, visibility) {
        console.log('_toggleMenu');
        event.preventDefault();
        $(this).toggleClass('active');
        $('.navigation').toggle();
    }

    // Скрыть меню при изменении размера окна
    function _closeMenu(event) {
        console.log('_closeMenu');
        var windowWidth = $(window).width();
        var sandwichMenu = $('.btn-menu');

        if (windowWidth > 900) {
            $('navigation').show();
        } else {
            $('navigation').hide();
            // Удаляем класс active, если он есть
            sandwichMenu.removeClass('active');
        }
    }

    // Открытие модального окна "Добавление нового проекта"
    function _appendProject(event) {
        console.log('_appendProject');
        event.preventDefault();
        var modal = $(this).data('modal');
        $(modal).show().find('.modal-content').fadeIn(300);
    }

    // Закрытие модального окна "Добавление нового проекта"
    function _closeModal(event) {
        console.log('_closeModal');
        event.preventDefault();
        var modal = $(this).data('modal');
        var modalForm = modal.find('form');
        if (modalForm.length) {
            modalForm[0].reset();
            //modalForm.find('.file-name').text(modalForm.find('input[typr="g'))
            // ...
        }
    }

    // Вывод имени прикрепленного файла в форме "Добавление нового проекта"
    function _getName(str, title) {
        console.log('_getName');
    }

    // ВАЛИДАЦИЯ ФОРМЫ
    // ===============

    function _submitForm(event) {
        console.log('_submitForm');
        event.preventDefault();

        var $form = $(this);
        switch ($form.data('name')) {
            // Обработка добавления проекта
            case 'append_project':
                var url = 'backend/append_project.php';
                var defObj = _ajaxForm($form, url);

                if (defObj.done(function (response) {
                        var message = response.message;
                        var status = response.status;
                        if (status === 'OK') {
                            // ...
                        } else {
                            // ...
                        }
                    }))
                    break;
            // Отправка сообщения обратной связи
            case 'feedback':
                break;
            // Authorization
            case 'authorization':
                break;
            default :
                console.error('Неизвестный тип формы');
        }
    }

    function _ajaxForm($form, url) {
        console.log('_ajaxForm');
        var submitBtn = $form.find('button[type="submit"');
        if (_validateForm($form) === false) return false;
        submitBtn.attr('disabled', 'disabled')

        var data = form.serialize();

        return $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: data
        })
            .fail(function () {
                console.log("Проблемы с php");
            })
            .always(function () {
                submitBtn.attr('disabled', false);
            });

    }

    // Валидация формы
    function _validateForm(form) {
        console.log('_validateForm');
        var inputs = form.find('.form-group').find('input.require, textarea.require'),
            valid = true;

        $.each(inputs, function (index, val) {
            var input = $(val),
                val = input.val(),
                formGroup = input.parents('.form-group');

            if ((val.length < 1) || (val === input.attr('placeholder'))) {
                formGroup.addClass('has-error');
                formGroup.find('.tooltip').fadeIn(300);

                valid = false;
            } else {
                formGroup.removeClass('has-error');
                formGroup.find('.tooltip').fadeOut(300);
            }
        });

        return valid;
    }

    // Удаление эффектов ошибки
    function _removeError() {
        console.log('_removeError');
        $(this).parents('.form-group').removeClass('has-error');
        $(this).parents('.form-group').find('.tooltip').fadeOut(500);
    }

    // Reset формы
    function _resetForm(event) {
        console.log('_resetForm');
        event.preventDefault();
        var form = $(this).parents('form');
        form[0].reset();
        form.find('.form-group').find('.tooltip').fadeOut();
        form.find('.has-error').removeClass('has-error');
    }

    return {

        // Инициализация модуля
        init: function () {
            console.log('init');
            _setUpListeners();
        }
    }
}());

//model.init();