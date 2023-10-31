<?php

function clean($text)
{

    $text = str_ireplace('<' ,'_' ,$text);
    $text = str_ireplace('>' ,'_' ,$text);
    $text = str_ireplace('?' ,'_' ,$text);
    $text = str_ireplace('#' ,'_' ,$text);

    return $text;

}
