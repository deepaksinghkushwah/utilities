<?php
$myArray = array(
    'Level1' => 'a',
    'Level2' => array('subA', 'subB', array(0 => 'subsubA', 1 => 'subsubB', 2 => array(0 => 'deepA', 1 => 'deepB'))),
    'Level3' => 'b',
    'Level4' => array('subA', 'subB', 'subC'),
    'Level5' => 'c'
);

$iter = new RecursiveArrayIterator($myArray);

foreach(new RecursiveIteratorIterator($iter) as $key => $value){    
    echo $key." => ".$value."<Br/>";
}