	<html>
    <head>
        <title>Simple Pagination</title>
        <style>
            .counter{
                padding: 3px;
                background-color: red;
                width: auto;
                text-align: center;
                color: white;
                font-family: arial;
                font-size: 12px;
                margin: 2px;
                border-radius: 4px;
                -moz-border-radius: 4px;
                -webkit-border-radius: 4px;
                float: left;
            }

            .counter a, .counter a:visited{
                text-decoration: none;
                font-weight: bold;
                color: white;
            }

            .active{
                color: black;
                font-weight: bold;
            }

            .disabled {
                color: grey;			
                font-weight: bold;
            }


        </style>
    </head>
    <body>
        <form method="post">
            <?php
            $link = mysqli_connect('localhost', 'root', '','country-state-city');
            

            $pagename = $_SERVER['SCRIPT_NAME'];


            $sql = "SELECT * FROM countries";
            $res = mysqli_query($link,$sql);
            $rows = mysqli_num_rows($res);

// pagination var start
            if (!(isset($_REQUEST['pagenum']))) {
                $pagenum = 1;
            } else {
                $pagenum = $_REQUEST['pagenum'];
            }
            $page_rows = 10;
            $last = ceil($rows / $page_rows);
            if ($pagenum < 1) {
                $pagenum = 1;
            } elseif ($pagenum > $last) {
                $pagenum = $last;
            }
            $max = 'limit ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;
// pagination var end
// show result
            $result = mysqli_query($link,"SELECT * FROM countries $max");
            $x = 1;
            while ($data = mysqli_fetch_object($result)) {
                echo (($page_rows * ($pagenum - 1)) + $x) . ". " . $data->name . "<br/>";
                $x++;
            }
            echo " --Total Record: $rows, Page $pagenum of $last-- <p>";

            if ($pagenum == 1) {
                echo "<div class='counter disabled'> First </div>";
                echo "<div class='counter disabled'> Previous </div>";
            } else {
                echo " <div class='counter'><a href='{$_SERVER['PHP_SELF']}?pagenum=1'> First </a></div> ";
                echo " ";
                $previous = $pagenum - 1;
                echo " <div class='counter'><a href='{$_SERVER['PHP_SELF']}?pagenum=$previous'> Previous </a> </div>";
            }


            for ($i = 1; $i <= $last; $i++) {
                if ($pagenum == $i) {
                    echo "<div class='counter active'>" . $i . "</div>";
                } else {
                    echo "<div class='counter'><a href='$pagename?pagenum=" . $i . "'>" . $i . "</a></div>";
                }
            }


//just a spacer
//This does the same as above, only checking if we are on the last page, and then generating the Next and Last links
            if ($pagenum == $last) {
                echo "<div class='counter disabled'> Next </div>";
                echo "<div class='counter disabled'> Last </div>";
            } else {
                $next = $pagenum + 1;
                echo "<div class='counter'> <a href='{$_SERVER['PHP_SELF']}?pagenum=$next'> Next </a></div> ";
                echo " ";
                echo "<div class='counter'> <a href='{$_SERVER['PHP_SELF']}?pagenum=$last'> Last </a></div> ";
            }
            ?>
            
        </form>
    </body>
</html>