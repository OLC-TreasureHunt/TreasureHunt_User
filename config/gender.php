<?php

if (!defined('GENDER_MALE')) {
    define('GENDER_MALE', 0);
    define('GENDER_FEMALE', 1);
}

return [
    GENDER_MALE         => ['app.gender.male', 0],
    GENDER_FEMALE       => ['app.gender.female', 1],
];