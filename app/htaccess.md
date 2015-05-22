#htaccess.net.ru
AddDefaultCharset UTF-8 # Указание кодировки по умолчанию
# Options [-|+]Indexes # Указание на открытие (закрытие) просмотра файлов директории
#<FilesMatch "\.(gif|png|jpe?g)">
#    Order Deny,Allow
#    Deny from all
#</FilesMatch>
# IndexIgnore *.php* *.pl # Исключение просмотра файлов определенного формата
# DirectoryIndex index.html index.php default.shtml my.xhtml # Указание интексного файла по умолчанию
RewriteEngine on

RewriteCond %(HTTP_HOST) ^www\.(.*) [NC]
RewriteRule ^(.*)$ http://%1/$1 [R=301,L]
RewriteRule ^([0-9a-z-]+)$ /$1.php [L]

# Переопределение своих страниц ошибок
#ErrorDocument 401 /401.html
#ErrorDocument 403 /403.html
#ErrorDocument 404 /404.html # файл не найден


# Настройка сессии
#php_value session.use_cookies 1
#php_value session.use_only_cookies 1
#php_value session.save_path "/Users/borls/loftschool/homework/portfolio/loft-portfolio/sessions/"
#php_value session.trans_sid 0