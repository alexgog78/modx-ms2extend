<?php

if (!class_exists('msCartInterface')) {
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/minishop2/model/minishop2/mscarthandler.class.php';
}

class ms2extendCartHandler extends msCartHandler implements msCartInterface
{

}
