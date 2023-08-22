<?php

$text = <<<TXT
<p class="big">
	Год основания:<b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>.
</p>
<p class="float">
	<img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград" width="300" height="200" itemprop="image">
	<span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span>
</p>
<p>
	<i><b>Великая Отечественная война в истории города</b></i></p>
	<p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a> 
	(17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона Сталинграда и разгром действовавшей на сталинградском направлении группировки 
	противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i>
</p>
TXT;
// Как было
echo $text;

echo '<hr>';

// получаем текст выше описания
preg_match('/^.+(<\/i><\/p>)/us' , $text, $headText);
// получаем текст, который нужно обрезать
preg_match('/<p><i>.+/us', $text, $textToCut);

// разбиваем строку с помощью пробела
$textToCut = explode(' ', implode($textToCut));
// Вырезаем все слова после 29 слова
$textToCut = array_slice($textToCut, 0 , 29);
// Собираем строку из получившегося массива
$mainText = implode(' ', $textToCut);

$text = implode($headText) . $mainText . "...";
echo $text;












//// получили ссылку
//preg_match('/(?<=<a).+?(?=a>)/us', $text, $link);
//// получили текст ссылки
//preg_match('/(?<=>).+\b/u', implode('',$link), $linkText);
////получаем текст выше описания
//preg_match('/^.+?(?=(<\/i>))/us', $text, $headText);
//// поулчили текст который необходимо обрезать
//preg_match('/(<p><i>).+(<\/p>)$/us', $text, $textToCut);
//
//$textToCut = strip_tags($textToCut[0]);
//
//// разбиваем строку с помощью пробела
//$textToCut = explode(' ',$textToCut);
////debug($textToCut);
//// Оставляем только 29 слов
//$textToCut = array_slice($textToCut, 0 , 29);
//// Собираем строку из получившегося массива
//$mainText = implode(' ', $textToCut);
//
//$mainText = str_replace(implode('',$linkText), implode('',$link), $mainText);
//
//$text = $headText[0] . $mainText . "...";
//echo $text;