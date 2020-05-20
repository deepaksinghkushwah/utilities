<?php

$myArray = array(
    0 => 'a',
    1 => array('subA', 'subB', array(0 => 'subsubA', 1 => 'subsubB', 2 => array(0 => 'deepA', 1 => 'deepB'))),
    2 => 'b',
    3 => array('subA', 'subB', 'subC'),
    4 => 'c'
);
$iterator = new RecursiveArrayIterator($myArray);
iterator_apply($iterator, 'traverseStructure', array($iterator));

function traverseStructure($iterator, $level = 0) {

    while ($iterator->valid()) {

        if ($iterator->hasChildren()) {
            $level++;
            traverseStructure($iterator->getChildren(), $level);
        } else {
            echo str_repeat("> ", $level). $iterator->key() . ' : ' . $iterator->current() . '<br/>';
        }

        $iterator->next();
    }
}
