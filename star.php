<html>
       <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Five Stars</title>

 	<!-- Including style for tooltip if necessary -->
        <link type="text/css" rel="stylesheet" href="css/tooltip.css"/>
        
        <!-- Including jQuery 1.7 or higher and rating plugin -->
        <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="jquery"></script>
        <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="jquery.cycle.all.js"></script>
        <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <style>
            .rating {
              unicode-bidi: bidi-override;
              direction: rtl;
            }
            .rating > span {
              display: inline-block;
              position: relative;
              width: 1.1em;
            }
            .rating > span:hover:before,
            .rating > span:hover ~ span:before {
               content: "\2605";
               position: absolute;
            }
        </style>
    </head>
    <body>
        <div class="rating">
            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
        </div>

    </body>
</html>