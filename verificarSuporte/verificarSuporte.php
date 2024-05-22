<?php

function verificarSuportesBalanceados($str) {
    $stack = [];
    $pairs = [
        ')' => '(',
        ']' => '[',
        '}' => '{'
    ];

    foreach (str_split($str) as $char) {
        if (isset($pairs[$char])) {
            if (array_pop($stack) !== $pairs[$char]) {
                return false;
            }
        } elseif (in_array($char, $pairs)) {
            $stack[] = $char;
        }
    }

    return empty($stack);
}

// Teste da função
$str1 = '(){}{';
$str2 = '[{()}](){}';
$str3 = '[]{}()';
$str4 = '[](){';
$str5 = '[{)}';

echo "String 1: " . (verificarSuportesBalanceados($str1) ? "Válida" : "Inválida") . "\n";
echo "String 2: " . (verificarSuportesBalanceados($str2) ? "Válida" : "Inválida") . "\n";
echo "String 3: " . (verificarSuportesBalanceados($str3) ? "Válida" : "Inválida") . "\n";
echo "String 4: " . (verificarSuportesBalanceados($str4) ? "Válida" : "Inválida") . "\n";
echo "String 5: " . (verificarSuportesBalanceados($str5) ? "Válida" : "Inválida") . "\n";
