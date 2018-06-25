<html>
 <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Five Stars</title>

 	<!-- Including style for tooltip if necessary -->
        <link type="text/css" rel="stylesheet" href="css/tooltip.css"/>
        
        <!-- Including jQuery 1.7 or higher and rating plugin -->
        <!--<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/jquery.5stars.min.js"></script>-->
        <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="jquery"></script>
        <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="jquery.cycle.all.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <!-- Starting rating plugin -->
        <script type="text/javascript">
            $(document).ready(function(){ 
		//start plugin with settings
                $(".stars").rating({                       
                    php : 'star.php',    //path to manager.php file relative to HTML document. Not required in Display-only and Database-free modes.
                    skin    : 'path18.png',      //path to skin file relative to HTML document
                    step                 : 0.5,           //round every 'step' stars. For example step=0.5 will cause rounding to half star on hover
                    animate           : true,       //apply animation
                    debug             : false,      //if true - debug mode will be enabled
                    onmove          : onmove      //triggers on mouse move over stars
                });                 
          });
                function onmove(value, $thisStarsObject){
                    //your code here
                    //alert('on click: '+value+'%');
                }
        </script>

    </head>
    <body>

        <p>Normal mode (stats stored in database, requires PHP)</p>
        <!-- 1. Stars will appear here. Note: unique item Id is required -->
        <div class="stars" data-id="itemId" data-title="optional short item description"></div>

        <p>Display-only mode (displays values which you provide in html)</p>
        <!-- 2. Display-only mode -->
        <div class="stars" data-value="60" data-votes="45" data-displaymode="true"></div>

        <p>Database-free mode: rate stored locally (browser MUST support <a href="http://diveintohtml5.info/storage.html">HTML5 localstorage</a>)</p>
        <!-- 3. Database-free mode (browser MUST support HTML5 localstorage) 
          Note: unique item Id is required; php MUST be set to ""  -->
        <div class="stars" data-id="itemId2" data-php="" data-textmain="you gave %ms out of %maxs stars"></div>

    </body>
</html>