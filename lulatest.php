<?php
$link = mysql_connect('localhost', 'root', 'deepak');
mysql_select_db('lula');

function query($sql) {
    $res = mysql_query($sql) or die(mysql_error());
    return $res;
}

function getCategory() {
    $sql = "SELECT * FROM `category`";
    $res = query($sql);
    return $res;
}

function getMenu($catid) {
    $sql = "SELECT m.*, cms.group_name FROM `menu` m JOIN `cat_menu_assoc` cms ON cms.menu_id = m.id WHERE cms.cat_id = '$catid'";
    //echo $sql."<Br/>";
    $res = query($sql);
    return $res;
}

$categories = getCategory();
if ($categories && mysql_num_rows($categories) > 0) {
    while ($category = mysql_fetch_object($categories)) {
        ?>
        <ul>
            <li>
                <a href=""><?php echo $category->cat_name ?></a>
                <?php
                $menus = getMenu($category->id);
                if (menus && mysql_num_rows($menus) > 0) {
                    ?>
                    <ul>
                        <?php
                        while ($menu = mysql_fetch_object($menus)) {
                            ?>
                            <li><a href="<?php echo $menu->group_name ?>"><?php echo $menu->menu_name ?></a></li>
                            <?php
                        }
                        ?>
                    </ul>
                    <?php
                }
                ?>
            </li>

        </ul>
        <?php
    }
}


