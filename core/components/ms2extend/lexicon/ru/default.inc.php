<?php
$files = scandir(dirname(__FILE__));
foreach ($files as $file) {
    if (strpos($file, '.inc.php')) {
        @include_once($file);
    }
}


//Common
$_lang['ms2extend'] = 'ms2Extend';
$_lang['ms2extend.management'] = 'Расширение Minishop2';