<?php
$json=file_get_contents('https:/www.googleapis.com/youtube/v3/search?part=snippet&maxResults=50&order=videoCount&q=%D0%B0%7C%D0%B1%7C%D0%B2&relevanceLanguage=ru&key=AIzaSyCiLxX7aaXclNZIDr99O4LlAkgPc-Hx4H8');
echo $json;
?>
<?php
// Получить содержимое файла в виде массива. В данном примере мы используем
// обращение по протоколу HTTP для получения HTML-кода с удаленного сервера.
$lines = file('https:/www.googleapis.com/youtube/v3/search?part=snippet&maxResults=50&order=videoCount&q=%D0%B0%7C%D0%B1%7C%D0%B2&relevanceLanguage=ru&key=AIzaSyCiLxX7aaXclNZIDr99O4LlAkgPc-Hx4H8');

// Осуществим проход массива и выведем номера строк и их содержимое в виде HTML-кода.
foreach ($lines as $line_num => $line) {
    echo "Строка #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
}

// Второй пример. Получим содержание web-страницы в виде одной строки.
// См.также описание функции file_get_contents().
$html = implode('', file ('https:/www.googleapis.com/youtube/v3/search?part=snippet&maxResults=50&order=videoCount&q=%D0%B0%7C%D0%B1%7C%D0%B2&relevanceLanguage=ru&key=AIzaSyCiLxX7aaXclNZIDr99O4LlAkgPc-Hx4H8'));
?>
