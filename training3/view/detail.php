<!doctype html>
<html>
    <head>
        <style>
            .title
            {
                font-size:      40px;
                font-weight:    bold;
                padding: 30px;
            }
            .button
            {
                float: right;
                margin-right: 20%;
                margin-top: 2%;
            }
            .thumb
            {
                display: inline-block;
                width: 500px;
                height: 300px;
                
            }
            .description
            {
                display: inline-block;
                float: right;
                width: 700px;
                height: 300px;
                text-align: left;
            }
        </style>
    </head>
    <body>
    <?php
              while ($row = mysqli_fetch_assoc($result)){
                echo "<div class=\"title\">
            ".$row['title']."
            <button class=\"button\" onclick=\"window.history.back()\">
                Back
            </button>
        </div>
        <img class=\"thumb\" src=\"".$row['image']."\">
        </img>
        <div class=\"description\">".$row['description']."
        </div>";  }
        
    ?>
    </body>
</html>