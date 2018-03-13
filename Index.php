<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <textarea  name="mytextarea" cols="150" rows="4">Дана строка из минимум восьмидесяти символов, содержащая фразу
на русском языке, после каждого слова в которой идут один или   несколько пробелов. Подсчитать количество безударных
слогов в этой фразе.</textarea>
    <br>
    <button class="btn btn-success" type="submit">Поехали</button>
</form>
</body>
</html>
<?php
//$count = str_word_count($_POST['mytextarea'], 1,"АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя");
//print_r($count);
//$www = $count[0];
//echo '<br>'.mb_strlen($www, 'utf-8');


?>

<!--Я СМОГУ ВСЕ ЭТО ОБЪЯСНИТЬ НА СЛОВАХ !!! :O -->
<?php
$text= $_POST['mytextarea'];
//$text="Дана строка из минимум восьмидесяти символов, содержащая фразу
//на русском языке, после каждого слова в которой идут один или   несколько пробелов. Подсчитать количество безударных
//слогов в этой фразе.";
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

foreach($regs as $cur_regxp) {
        $text = preg_replace( $cur_regxp , "$1-$2" , $text);
}
echo "<br>";
var_dump($text);
?>

<br><br>

<?php
$massiv_explode = explode(" ", $text);
echo "<pre>";
  var_dump($massiv_explode);
echo "</pre>";
?>

<!--Разбиваем массив слов, отделенный -, на массив слогов из этих слов-->
<?
    foreach ($massiv_explode as $item) {
        $slog_explode = explode('-', $item);
        var_dump($slog_explode);

        echo "<br>";
        /*Посчитаем количество отделенных слогов счетчиком count и отнимем еденицу, потому что ударный слог один, остальные безударные*/
        echo "Количество безударных слогов в данном слове = ".$count_bezudahnih_slogov = count($slog_explode)-1;
        echo "<br>";
        echo "<br>";
        /*Если наш счетчик больше нуля (если это предлог,союз или слово из одного слога, то слог там точно ударный)
        тогда записываем в переменную $wtf, прибавляем результат следующей итерации (+=) */
        if ($count_bezudahnih_slogov>0){
            $wft += $count_bezudahnih_slogov;

        }

    }
echo "Количество безударных слогов в данном тексте = ".$wft;


?>

