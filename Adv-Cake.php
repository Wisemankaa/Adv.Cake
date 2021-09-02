<!DOCTYPE html>
<html lang="ru-ru">
<head>
    <meta charset="utf-8" />
</head>
<body>
<?php

echo revertCharacters("Привет! Давно не виделись.") . '<BR />';
echo revertCharacters("Привет! ДавНо не виде-лись.") . '<BR />';
echo revertCharacters("Проверка, киРИлицы! как-То тАк.") . '<BR />';

function revertCharacters (string $incstr) : string {
  $res = preg_split('/\W/u', $incstr, -1, PREG_SPLIT_OFFSET_CAPTURE);
  $resstr = '';
  foreach ($res as $value) {
    if ($value[1] == 0) {
      $resstr = my_strrev($value[0]);
    } else {
      $resstr = $resstr . $incstr[$value[1]-1] . my_strrev($value[0]);
    }
  }
  return $resstr;
}

function my_strrev(string $incomeStr, string $encoding = null): string
{
  $chars_i = mb_str_split($incomeStr, 1, $encoding ?: mb_internal_encoding());
  $chars = array_reverse(mb_str_split(mb_strtolower($incomeStr), 1, $encoding ?: mb_internal_encoding()));
  for ($i = 0; $i < count($chars); $i++) {
    if (mb_strtolower($chars_i[$i]) != $chars_i[$i]) {
      $chars[$i] = mb_strtoupper($chars[$i]);
    }
  }
  return implode('', $chars);
}

?>

</body>
</html>