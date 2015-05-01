<?php
// Задаем константы:
define ('DS', DIRECTORY_SEPARATOR); // разделитель для путей к файлам
$sitePath = realpath(dirname(__FILE__) . DS) . DS;
define ('SITE_PATH', $sitePath); // путь к корневой папке сайта

// для подключения к бд
define('DB_USER', 'root');
define('DB_PASS', '1234');
define('DB_HOST', 'mvc');
define('DB_NAME', 'reg');
define('ADMIN_LOGIN', 'admin');
define('ADMIN_PASS', '1234');