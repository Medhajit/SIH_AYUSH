<?php
error_reporting(0);
function stopWords($text, $stopwords) {
  // Remove line breaks and spaces from stopwords
  $stopwords = array_map(function($x){return trim(strtolower($x));}, $stopwords);
  // Replace all non-word chars with comma
  $pattern = '/[0-9\W]/';
  $text = preg_replace($pattern, ',', $text);
  $text = preg_replace("/,+/", ",", $text);
  $text = trim($text, ",");
  // Create an array from $text
  $text_array = explode(",",$text);
  // remove whitespace and lowercase words in $text
  $text_array = array_map(function($x){return trim(strtolower($x));}, $text_array);
  foreach ($text_array as $term) {
    if (!in_array($term, $stopwords)) {
      $keywords[] = $term;
    }
  };
  return array_filter($keywords);
}
$stopwords = file('library/stop_words.txt');
$text =  $_GET['abstract'];
$arrayall =stopWords($text, $stopwords);
$array=array_unique($arrayall);
/*
var_dump($array);

for($i=0; $i<sizeof($array); $i++)
{
    if($array[$i]!="" && $array[$i]!=" ")
    echo "<span class='mdl-chip' style='margin: 2px 2px 2px 2px'><span class='mdl-chip__text' style='font-size: 18px;' onclick='addtotextbox(\"$array[$i]\")'>$array[$i]</span></span>";
}
*/
foreach($array as $ele)
{
    if($ele!="" && $ele!=" ")
    echo "<span class='mdl-chip' style='margin: 2px 2px 2px 2px'><span class='mdl-chip__text' style='font-size: 18px;' onclick='addtotextbox(\"$ele\")'>$ele</span></span>";

}
?>

