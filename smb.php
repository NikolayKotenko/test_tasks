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
//$string="chmod 711 cgi";
//echo preg_replace("/(\w+)\s+(\d+)/", "$1", $string);

$text="Дана строка из минимум восьмидесяти символов, содержащая фразу
на русском языке, после каждого слова в которой идут один или   несколько пробелов. Подсчитать количество безударных
слогов в этой фразе.";

$RusA = "[абвгдеёжзийклмнопрстуфхцчшщъыьэюя]";
$RusV = "[аеёиоуыэюя]";
$RusN = "[бвгджзклмнпрстфхцчшщ]";
$RusX = "[йъь]";

$regs[] = "~(". $RusX . ")(" . $RusA . $RusA . ")~iu";
var_dump($regs);
echo "<br>";
$text = preg_replace( $regs , "$1-$2" , $text);

var_dump($text);