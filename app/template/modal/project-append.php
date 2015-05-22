<div class="modal" data-name="project-append">
    <div class="modal-wrapper">
        <div class="modal-header">
            Добавление проекта
            <span class="icon-close"></span>
        </div>

        <div class="modal-body">
            <form class="form" name="project-append" action="../../php/project-append.php" enctype="multipart/form-data" method="post">
                <div class="field-box">
                    <div class="field field-red server-message server-error">
                        <span class="close">&times;</span>
                        <span class="message-title">Ошибка!</span>
                        <span class="message-body">Невозможно добавить проект.</span>
                    </div>
                    <div class="field field-green server-message server-success">
                        <span class="close">&times;</span>
                        <span class="message-title">Well Done!</span>
                        <span class="message-body">Операция прошла успешно.</span>
                    </div>
                </div>
                <div class="field-box tooltip-left field-required">
                    <div class="field-label">Название проекта</div>
                    <div class="field-field">
                        <span class="arrow-box">Введите название</span>
                        <input class="field field-blue" type="text" name="name"
                               placeholder="Название проекта">
                    </div>
                </div>
                <div class="field-box tooltip-left field-required">
                    <div class="field-label">Картинка проекта</div>
                    <div class="field-field">
                        <span class="arrow-box">Изображение</span>
                        <input class="field field-blue" type="text" name="image" id="load_image" placeholder="Загрузите изображение" readonly="">
                        <input class="modal-input-file transparent0" type="file" name="project-image">

                        <div class="modal-input-file-icon"></div>
                    </div>
                </div>
                <div class="field-box tooltip-left field-required">
                    <div class="field-label">URL проекта</div>
                    <div class="field-field">
                        <span class="arrow-box">Ссылка на проект</span>
                        <input class="field field-blue" type="text" name="url"
                               placeholder="Добавьте ссылку">
                    </div>
                </div>
                <div class="field-box tooltip-left field-required">
                    <div class="field-label">Описание</div>
                    <div class="field-field">
                        <span class="arrow-box">Описание проекта</span>
                        <textarea class="field field-blue" name="description" cols="20" rows="4"
                                  placeholder="Пара слов о Вашем проекте"></textarea>
                    </div>
                </div>

                <div class="field-box field-field field-center">
                    <input type="submit" class="btn btn-lightblue" value="Добавить">
                </div>
            </form>
        </div>
    </div>
</div>
