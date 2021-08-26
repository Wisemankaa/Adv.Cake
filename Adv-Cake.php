<!DOCTYPE html>
<html lang="ru-ru">
<head>
    <meta charset="utf-8" />
</head>
<body>
<?php


echo revertCharacters("Привет! Давно не виделись.");

function revertCharacters($incomeStr) {
  $arrWords = explode(" ", $incomeStr);
  $arrReversWords = [];
  foreach ($arrWords as $word) {
    $arrReversWords[] = my_strrev($word);
  }
  // return mb_strrev($incstr);
  return implode(" ", $arrReversWords);
};

function my_strrev(string $incomeStr, string $encoding = null): string
{
    $res = preg_match('/([^!?.]*)([!?.])/',$incomeStr,$matches);
    if ($res) {
      $chars = array_reverse(mb_str_split($matches[1], 1, $encoding ?: mb_internal_encoding()));
      $chars[] = $matches[2];
    } else {
      $chars = array_reverse(mb_str_split($incomeStr, 1, $encoding ?: mb_internal_encoding()));
    }
    return implode('', $chars);
}

?>

</body>
</html>