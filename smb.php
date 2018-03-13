<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
<?
$str = "Дана строка из минимум восьмидесяти символов, содержащая фразу
на русском языке, после каждого слова в которой идут один или   несколько пробелов. Подсчитать количество безударных
слогов в этой фразе.";
$count = str_word_count($_POST['mytextarea'], 1,"АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя");
print_r($count);
echo '<br>';
print_r ($str);
