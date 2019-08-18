<?php

$cultureKey = basename(dirname(__FILE__));
$baseLexicons = MODX_CORE_PATH . 'components/abstractmodule/lexicon/lexicon.class.php';
if (file_exists($baseLexicons)) {
    require_once $baseLexicons;
    $abstractLexicon = new amLexicon('ms2extend', $cultureKey);
    $_abstract_lang = $abstractLexicon->loadLanguageTopics();
    $_lang = array_merge($_abstract_lang, $_lang ?? []);
}

$files = scandir(dirname(__FILE__));
foreach ($files as $file) {
    if (strpos($file, '.inc.php')) {
        @include_once($file);
    }
}

//Common
$_lang['ms2extend'] = 'ms2Extend';
$_lang['ms2extend.management'] = 'Расширение Minishop2';