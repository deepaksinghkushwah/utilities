<html>
    <head>
        <title>JavaScript toLocaleFormat Method</title>
    </head>
    <body>
        <script type="text/javascript">
            var ds = "2014-00-06";
            var d = ds.split("-");
            var dt = new Date(d[0], d[1], d[2], 0, 0, 0);
            document.write("Formated Date : " + dt.toLocaleFormat("%m/%Y"));
        </script>
    </body>
</html>