<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="lib/jquery/jquery.js"></script>
        <script>
        $(document).ready(function(){
            $('#search').on('click',function(){                
                $.ajax({
                   url: 'curl.php',
                   data: $('#sform').serialize(),
                   dataType: 'json',
                   type: 'post',
                   success: function(data){
                       console.log(data);
                   }
                });
            });
        });
        </script>
    </head>
    <body>
        <form method="post" id="sform" action="">
            <input type="hidden" name="apifunc" value="station_by_name"/>            
                      
            <table>
                <tr>
                    <td>Station From </td>
                    <td><input type="text" name="name" id="name"/></td>                    
                </tr>
                <tr>
                    <td><input type="hidden" name="partial" value="1"/>            
            <input type="hidden" name="format" value="josn"/>  </td>
                    <td><input type="button" name="search" id="search" value="Search"/></td>                    
                </tr>
            </table>
        </form>
    </body>
</html>
