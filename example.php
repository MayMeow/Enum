<?php

use MayMeow\Enum\Enum;

require_once 'vendor/autoload.php';

class Pet extends Enum
{
    const TYPE_CAT = 'cat';
    const TYPE_DOG = 'dog';
    const TYPE_RAT = 'rat';
    const TYPE_BIRD = 'bird';
}

var_dump(Pet::cache());