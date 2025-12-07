<?php

$passwords_planos = array (
    'pass_mikel' => 'Abcd1234',
    'pass_vero' => 'Veronica38.',
    'pass_luis' => 'Abcd1234'
);

foreach($passwords_planos as $key => $pass){
    $hash = password_hash($pass, PASSWORD_BCRYPT);
    echo $key . ' '. $hash . '<br>';
}