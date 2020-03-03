<?php
$stack = array('first', 'second', 'third', 'fourth', 'fifth');

foreach($stack AS $v){
    if($v == 'first')continue;
    if($v == 'second')continue;
    if($v == 'fourth')break;
    echo $v.'<br>';
}