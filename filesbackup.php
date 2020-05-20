<?php
/**
 * @author Deepak Singh Kushwah
 * This file backup directory in which
 * this file exists
 */
$phar = new PharData('project.tar');
$phar->buildFromDirectory(dirname(__FILE__));
