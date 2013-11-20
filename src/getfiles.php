<?php
/**
 * Created by PhpStorm.
 * User: Gary
 * Date: 11/20/13
 * Time: 3:27 PM
 */

$result  = array();

$files = scandir($storeFolder);                 //1
if ( false!==$files ) {
    foreach ( $files as $file ) {
        if ( '.'!=$file && '..'!=$file) {       //2
            $obj['name'] = $file;
            $obj['size'] = filesize($storeFolder.$ds.$file);
            $result[] = $obj;
        }
    }
}

header('Content-type: text/json');              //3
header('Content-type: application/json');
echo json_encode($result);