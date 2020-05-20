<?php
$link = mysql_connect("localhost","root","") or die("SErver not found");
mysql_select_db("test") or die("DB not found");
error_log("Hahaha...");
listCategory(0,0);

function listCategory($parent_id,$level=0) {
    $query = "SELECT `name`, id , parent_id FROM category  WHERE  parent_id=".$parent_id;
    $res = mysql_query($query) or die($query.'<br/>'.  mysql_error());
    if(mysql_num_rows($res) == 0) return;
    echo '<ul>';
    while (list ($name, $id) = mysql_fetch_row($res))
    {   
        if ($level==0)
        {
           echo '<li><a href="#" class="menulink">'.$name.'</a>';
        }
        else
        {
           echo '<li><a class="sub_'.$level.'" href="#">'.$name.'</a>';
        }
        listCategory($id,$level+1);
        echo '</li>';
    }
    echo '</ul>';
}



function getPath($id, &$path = array(),$level=0) {
    $sql = "SELECT * FROM aqbae_mymessages where id = '$id'";
	$res = mysql_query($sql) or die($sql.'<br/>'.  mysql_error());
    if(mysql_num_rows($res) == 0) return;
    
    while ($data = mysql_fetch_assoc($res))
    {   array_push($path,$data['id']);        
        getPath($data['parent_id'],$path, $level+1);        
    }
	
    
}