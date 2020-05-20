 <?php
/**
 * @author Deepak Singh Kushwah
 * This script extract recent files from a directory and copy them to destination
 * folder same as source hirarcy
 */
set_time_limit(0);

$source = "D:/xampp/htdocs/mywork/YII/BASEFRAME"; // set the source path, do not add trailing slash

$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
foreach ($objects as $name => $object) {    
	$name = str_replace("\\", "/", $name);    
	$e = explode("/",$name);
	$dir = $e[count($e)-1];
	if($dir!='.' && $dir!='..'){
		rename($name, strtolower($name)); 
		
	}	
}
