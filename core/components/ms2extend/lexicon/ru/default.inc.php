<?php

$prefix = 'ms2extend.';

$_lang['ms2extend'] = 'ms2Extend';
$_lang[$prefix . 'management'] = 'Расширение Minishop2';

$files = scandir(dirname(__FILE__));
foreach ($files as $file) {
    if (strpos($file, '.inc.php')) {
        @include_once $file;
    }
}
