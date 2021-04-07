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
                margin-right: 10px;
                margin-top: 2%;
            }
            .tg  {border-collapse:collapse;border-color:#ccc;border-spacing:0;width:90%;margin-left:auto;margin-right:auto;margin-top:10px}
            .tg td{background-color:#fff;border-bottom-width:1px;border-color:#ccc;border-style:solid;border-top-width:1px;
            border-width:0px;color:#333;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;
            word-break:normal;}
            .tg th{background-color:#f0f0f0;border-bottom-width:1px;border-color:#ccc;border-style:solid;border-top-width:1px;
            border-width:0px;color:#333;font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;
            padding:10px 5px;word-break:normal;}
            .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
            .tg .tg-btxf{background-color:#f9f9f9;border-color:inherit;text-align:left;vertical-align:top}
            
        </style>
    </head>
    <body>
        <div class="title">
            <?php
            $action = $_GET['action'];  
            if ($action == "add"){
                echo "Add";
                echo "<button class=\"button\">
                Back
            </button>";
            }
            else {
                echo "Edit";
                echo "<button class=\"button\" onclick=\"window.history.back()\">
                Back
            </button>
            <a href=\"?action=detail&postid=".$post_id."\">
                <button class=\"button\">
                Show
                </button>
            </a>";
            }
            ?>
            
        </div>
        <form action="change.php">
            <table class="tg">
            <thead>
              <tr>
                <th class="tg-0pky">Title</th>
                <th class="tg-0pky">
                    <input type="text" name="title"<?php echo "value=\"".$title."\"" ?> >
                    </input>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="tg-btxf">Description</td>
                <td class="tg-btxf">
                    <input type="text" name="description" <?php echo "value=\"".$description."\"" ?>>
                    </input>
                </td>
              </tr>
              <tr>
                <td class="tg-0pky">Image</td>
                <td class="tg-0pky">
                    <label for="image_url">Enter image url:</label>
                    <input type="url" id="image_url" name="newimage" <?php echo "value=\"".$image."\"" ?>></input>
                </td>
              </tr>
              <tr>
                <td class="tg-btxf">Status</td>
                <td class="tg-btxf">
                    <select name="status" id="status">
                        <?php
                        if ($status == 1){
                            echo "<option selected value=\"1\">Enable</option>
                        <option value=\"0\">Disable</option>";
                        }
                        else{
                            echo "<option  value=\"1\">Enable</option>
                            <option selected value=\"0\">Disable</option>";
                        }
                        
                        ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td class="tg-0pky"></td>
                <td class="tg-0pky">
                    <input type="submit">
                    </input>
                </td>
              </tr>
            </tbody>
            </table>
            <?php
                echo "<input type=\"hidden\" name=\"postid\" value=\"".$post_id."\" />";
                echo "<input type=\"hidden\" name=\"action\" value=\"".$action."\" />";
            ?>
        </form>
    </body>
</html>