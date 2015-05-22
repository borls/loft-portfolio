> Site-Portfolio (Yuzhakov Boris)

## Старт проекта

* Установите `gulp` и `bower` глобально:

```bash
npm i -g gulp bower
```

* Склонируйте себе репозиторий и перейдите в папку проекта:

```
git clone https://github.com/borls/loft-portfolio.git && cd loft-portfolio;
```

* Установите зависимости, запустив `hook.sh` (находится в папке проекта) или вручную:

```
npm i && bower i
```

* Запустите Gulp.js:

```
gulp
```

* Откройте в браузере [`http://localhost:7777/`](http://localhost:7777/).

## Быстрый старт
git clone https://github.com/borls/loft-portfolio.git; cd loft-portfolio; npm i; bower i; gulp

## Composer

1. Установить composer `https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx`

2. Поставить пакеты
```
cd loft-portfolio
composer init && install
```
## Структура папок и файлов

```
├── app/                               # Исходники
│   ├── images/                        # Папка изображений
│   │   ├── sprite/                    # PNG изображения для генерации спрайта
│   │   └── sprite.png                 # Генерируемый спрайт, по умолчанию спрайта нет
│   ├── resources/                     # Статические файлы для копирования в dist/
│   ├── scripts/                       # Папка со скриптами
│   │   └── common.js                  # Главный скрипт
│   ├── css/                           # Папка со стилями Stylus
│   │   ├── base/                      # Базовые стили
│   │   │   ├── base.styl              # Базовый стилевой файл
│   │   │   ├── fonts.styl             # Подключение шрифтов
│   │   │   └── normalize.styl         # Сброс стилей
│   │   └── font/                      # Шрифты
│   └── template/                      # Папка с шаблонами Jade
├── .bowerrc                           # Конфигурация Bower с установкой папки для скриптов
├── .gitignore                         # Список исключённых файлов из Git
├── bower.json                         # Список библиотек для установки с помощью Bower
├── gulpfile.js                        # Файл для запуска Gulp.js
├── package.json                       # Список пакетов и прочей информации
├── humans.txt                         # Описание проекта
├── robots.txt                         # Для поисковых роботов
└── README.md                          # Документация шаблона
```

Описание для некоторых папок:
* `app/` - папка с иходниками, из которой генерируюется `dist/`.
* `app/images/` - папка с фонами, паттернами и прочими стилевыми изображениями.
* `app/images/sprite/` - папка с PNG-изображениями для генерации спрайта в `app/images/sprite.png` и файла стилей с CSS-переменными в `app/styles/sprite.styl`.