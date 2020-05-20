<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculator</title>

        <style>
            body{
                margin: auto;
                padding: auto;
            }

            #maintable {
                margin-top: 50px;
            }
        </style>
        <script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
        <script type="text/javascript">

            $(document).ready(function() {
                $('#calc').on('click',function(){
                    var th = $('#total_hours').val();
                    var pph = $('#price_per_hours').val();
                    var whpd = $('#whpd').val();
                    var total_days_working = Math.floor(th / whpd);
                    var amount = Math.floor(th * pph);
                    $('#twd').html(total_days_working);
                    $('#ta').html(amount);
                });
            });
        </script>
    </head>
    <body>
        <table id="maintable" width="50%" align="center">
            <tr>
                <td valign="top">Total Hours</td>
                <td><input type="text" name="total_hours" id="total_hours"/></td>
            </tr>
            <tr>
                <td valign="top">Working Hours Per Day</td>
                <td><input type="text" name="whpd" id="whpd"/></td>
            </tr>
            <tr>
                <td valign="top">Price Per Hours</td>
                <td><input type="text" name="price_per_hours" id="price_per_hours"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="button" name="calc" id="calc" value="Calculate"/></td>
            </tr>
            <tr>
                <td valign="top">Details</td>
                <td>
                    
                        <table border="0">
                            <tr>
                                <td>Total Working Days</td>
                                <td id="twd"></td>                                
                            </tr>
                            <tr>
                                <td>Total Amount</td>
                                <td id="ta"></td>                                
                            </tr>
                        </table>
                    
                </td>
            </tr>
        </table>
    </body>
</html>
