<html>
    <head>
        <meta charset="utf-8">
        <title>stars</title>
        <!--<link rel = "stylesheet" href = "style.css">-->
        
        <style>
            .rating {
              display: inline-block;
              position: relative;
              bottom: 500px;
              top: 50px;
              left : 60px;
              height: 25px;
              width: 400px;
              line-height: 25px;
              font-size: 25px;
            }

            .rating label {
              position: absolute;
              bottom: 500px;
              top: 0;
              left: 100px;
              height: 0;
              cursor: pointer;
            }

            .rating label:last-child {
              position: absolute;
            }

            .rating label:nth-child(1) {
              z-index: 5;
            }

            .rating label:nth-child(2) {
              z-index: 4;
            }

            .rating label:nth-child(3) {
              z-index: 3;
            }

            .rating label:nth-child(4) {
              z-index: 2;
            }

            .rating label:nth-child(5) {
              z-index: 1;
            }

            .rating label input {
              position: absolute;
              top: 0px;
              left: 10%;
              opacity: 0;
            }

            .rating label .icon {
              float: center;
              color: transparent;
            }

            .rating label:last-child .icon {
              color: #dddddd;
            }

            .rating:not(:hover) label input:checked ~ .icon,
            .rating:hover label:hover input ~ .icon {
              color: #ffdd6b;
            }

            .rating label input:focus:not(:checked) ~ .icon:last-child {
              color: #dddddd;
              text-shadow: 0 0 5px #ffdd6b;
            }
        </style>
        <script>$(':radio').change(function() {
              console.log('New star rating: ' + this.value);
            });
        </script>
    </head>
    <body>
        <form class="rating" action="post_function.php">
          <label>
            <input type="radio" name="stars" value="1" />
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="stars" value="2" />
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="stars" value="3" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>   
          </label>
          <label>
            <input type="radio" name="stars" value="4" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="stars" value="5" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
        </form>
    </body>
</html>