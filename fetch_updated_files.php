<?php
/**
 * @author Deepak Singh Kushwah
 * This script extract recent files from a directory and copy them to destination
 * folder same as source hirarcy
 */
set_time_limit(0);

$source = "d:/xampp/htdocs/mywork/jobs"; // set the source path, do not add trailing slash
$destination = 'C:/Users/Developer/Desktop/backup'; // destination path, do not add trailing slash

$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
@mkdir($destination, 0777, true);
foreach ($objects as $name => $object) {
    if (is_file($name)) {
        if (date('Y-m-d', filemtime($name)) == date('Y-m-d')) {
            $name = str_replace("\\", "/", $name);
            $p = explode($source, $name);
            @mkdir(dirname($destination . $p[1]), 0777, true);
            copy($name, $destination . $p[1]);
            echo "$name, [Last Modified: " . date('Y-m-d', filemtime($name)) . "]<hr/>";
        }
    }
}
?>
