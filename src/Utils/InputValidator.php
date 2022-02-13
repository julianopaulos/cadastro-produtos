<?php
namespace App\Utils;

class InputValidator{
    static function inputSanitizer($input){
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
}