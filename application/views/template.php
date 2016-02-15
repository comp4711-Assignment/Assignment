<?php
/***
 * Base template for all pages to us. Always generated based on render function in 
 * Base_Controller.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{title}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="/assets/css/bootstrap.css" rel="stylesheet" media="screen"/>
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css"/>
        <script src ="/assets/js/bootstrap.js"></script>
    </head>
    <body>
        

        <div class="container">
            {menubar}
            
            <div id="content">
                
                
                {content}
            </div>
            <div id="footer" class="span12">
                Copyright &copy; 2015-2016,  John, Cameron, Austin.
            </div>
        </div>
        <script src="/assets/js/jquery-1.11.1.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
    </body>
</html>

