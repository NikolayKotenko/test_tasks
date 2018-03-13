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
<form action="" method="post">
    <textarea  name="mytextarea" cols="150" rows="4">Дана строка из минимум восьмидесяти символов, содержащая фразу
на русском языке, после каждого слова в которой идут один или   несколько пробелов. Подсчитать количество безударных
слогов в этой фразе.</textarea>
    <br>
    <button type="submit">Отправить</button>
</form>
</body>
</html>
<?php
$count = str_word_count($_POST['mytextarea'], 1,"АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя");
print_r($count);
$www = $count[0];
echo '<br>'.mb_strlen($www, 'utf-8');


?>
<?php
$text="Дана строка из минимум восьмидесяти символов, содержащая фразу
на русском языке, после каждого слова в которой идут один или   несколько пробелов. Подсчитать количество безударных
слогов в этой фразе.";
#char patterns
$RusA = "[абвгдеёжзийклмнопрстуфхцчшщъыьэюя]";
$RusV = "[аеёиоуыэюя]";
$RusN = "[бвгджзклмнпрстфхцчшщ]";
$RusX = "[йъь]";

#main ruller
$regs[] = "~(". $RusX . ")(" . $RusA . $RusA . ")~iu";
$regs[] = "~(". $RusV . ")(" . $RusV . $RusA  . ")~iu";
$regs[] = "~(". $RusV . $RusN . ")(" . $RusN . $RusV . ")~iu";
$regs[] = "~(". $RusN . $RusV . ")(" . $RusN . $RusV . ")~iu";
$regs[] = "~(". $RusV . $RusN . ")(" . $RusN . $RusN. $RusV . ")~iu";
$regs[] = "~(". $RusV . $RusN . $RusN . ")(". $RusN . $RusN . $RusV . ")~iu";
$regs[] = "~(". $RusX . ")(" . $RusA . $RusA . ")~iu";
$regs[] = "~(". $RusV . ")(" . $RusA . $RusV  . ")~iu";
?>
<pre>
<?
foreach($regs as $cur_regxp) {
        $text = preg_replace( $cur_regxp , "$1-$2" , $text);
        print_r($text);
        echo "<br>";
        echo "<br>";
        print_r($cur_regxp);
        echo "<br>";
        echo "<br>";
        print_r($regs);
        echo "<br>";
        echo "<br>";
}
//var_dump($text);
?>
</pre>
<br><br>
<?php


echo "<br>". $text;
$explode = explode(" ", $text);
?>
<pre>
    <?var_dump($explode);?>
</pre>
