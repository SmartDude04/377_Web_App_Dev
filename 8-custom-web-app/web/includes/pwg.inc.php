<?php

function passwordGenerator($length, $numNumbers, $numSpecial)
{
    $password = "";

    $password = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz", $length - $numNumbers - $numSpecial)), 0, $length - $numNumbers - $numSpecial);
    $password .= substr(str_shuffle(str_repeat("0123456789", $numNumbers)), 0, $numNumbers);
    $password .= substr(str_shuffle(str_repeat("!@#$%^&*()_-+={[]}|:;,.?", $numSpecial)), 0, $numSpecial);

    $password = str_shuffle($password);

    return $password;

}