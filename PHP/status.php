<?php
include_once '..\assets\config.php';


switch (connection_status()) {
    case CONNECTION_NORMAL:
        $txt = 'Connection is in a normal state';
        break;
    case CONNECTION_ABORTED:
        $txt = 'Connection aborted';
        break;
    case CONNECTION_TIMEOUT:
        $txt = 'Connection timed out';
        break;
    case (CONNECTION_ABORTED & CONNECTION_TIMEOUT):
        $txt = 'Connection aborted and timed out';
        break;
    default:
        $txt = 'Unknown';
        break;
}
echo $txt;

