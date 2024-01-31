<?php

function passwordGenerator($length, $numNumbers, $numSpecial)
{
    $password = "";

    $letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $numbers = "0123456789";
    $special = "!@#$%^&*()-+={[]}|:;,.?";

    $password = substr(str_shuffle(str_repeat($letters, $length - $numNumbers - $numSpecial)), 0, $length - $numNumbers - $numSpecial);
    $password .= substr(str_shuffle(str_repeat($numbers, $numNumbers)), 0, $numNumbers);
    $password .= substr(str_shuffle(str_repeat($special, $numSpecial)), 0, $numSpecial);

    $password = str_shuffle($password);

    $returnPass = "";

    // Go through and add spans for coloring
    for ($i = 0; $i < strlen($password); $i++)
    {
        $char = substr($password, $i, 1);

        if ($i % 2 == 0)
        {
            $returnPass .= '<span id="pw-dark">';
        }
        else
        {
            $returnPass .= '<span id="pw-light">';
        }

        if (strpos($letters, $char) !== false)
        {
            $returnPass .= '<span id="pw-letter">' . $char . '</span>';
        }
        elseif (strpos($numbers, $char) !== false)
        {
            $returnPass .= '<span id="pw-number">' . $char . '</span>';
        }
        elseif (strpos($special, $char) !== false)
        {
            $returnPass .= '<span id="pw-special">' . $char . '</span>';
        }

        $returnPass .= '</span>';
    }

    return $returnPass;

}