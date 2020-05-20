<?php
$myArray = array(
    'Level1' => 'a',
    'Level2' => array('subA', 'subB', array(0 => 'subsubA', 1 => 'subsubB', 2 => array(0 => 'deepA', 1 => 'deepB'))),
    'Level3' => 'b',
    'Level4' => array('subA', 'subB', 'subC'),
    'Level5' => 'c'
);
$iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($myArray));

foreach ($iterator as $key => $value) {
    // loop through the subIterators... 
    $keys = array();
    // in this case i skip the grand parent (numeric array)
    for ($i = $iterator->getDepth()-1; $i>0; $i--) {
        $keys[] = $iterator->getSubIterator($i)->key();
    }
    $keys[] = $key;
    echo implode(' ',$keys).': '.$value.'<br>';

}