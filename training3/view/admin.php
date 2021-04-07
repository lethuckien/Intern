<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <h1>ADMIN PANEL</h1>
      <style type="text/css">
        .tg  {border-collapse:collapse;border-color:#ccc;border-spacing:0;width:90%;margin-left:auto;margin-right:auto;margin-top:10%;}
        .tg td{background-color:#fff;border-color:#ccc;border-style:solid;border-width:1px;color:#333;
          font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg th{background-color:#f0f0f0;border-color:#ccc;border-style:solid;border-width:1px;color:#333;
          font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg .tg-buh4{background-color:#f9f9f9;text-align:left;vertical-align:top}
        .tg .tg-0lax{text-align:left;vertical-align:top}
        .button
        {
            float: right;
            margin-right: 200px;
            margin-top: 50px;
            margin-bottom: 50px;
        }
      </style>
      <a href="?action=add"><button class="button" >
          New
      </button></a>
      <div>
        <table class="tg">
            <thead>
            <tr>
                <th class="tg-0lax">ID</th>
                <th class="tg-0lax">Thumb</th>
                <th class="tg-0lax">Title</th>
                <th class="tg-0lax">Status</th>
                <th class="tg-0lax">Action</th>
            </tr>
            </thead>
            <tbody>
                <?php
                      while ($row = mysqli_fetch_assoc($r->result)){
                        echo "<tr>
                        <td class=\"tg-buh4\">".$row['id']."</td>
                        <td class=\"tg-buh4\"><img src=\"".$row['image']."\"style=\"max-width:300px;width:100%;float:left\"></img></td>
                        <td class=\"tg-buh4\">".$row['title']."</td>
                        <td class=\"tg-buh4\">".$row['status']."</td>
                        <td class=\"tg-buh4\">
                            <a href=\"?action=detail&postid=".$row['id']."\">Show</a> |
                            <a href=\"?action=edit&postid=".$row['id']."\">Edit</a> |
                            <a href=\"change.php?action=delete&postid=".$row['id']."\">Delete</a>
                        </td>
                    </tr>";}
                ?>
                
            </tbody>
        </table>
        <ul class="pagination">
        <li><a href="?action=admin&pageno=1">First</a></li>
        <li class="<?php if($r->pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($r->pageno <= 1){ echo '#'; } else { echo "?action=admin&pageno=".($r->pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($r->pageno >= $r->total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($r->pageno >= $r->total_pages){ echo '#'; } else { echo "?action=admin&pageno=".($r->pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?action=admin&pageno=<?php echo $r->total_pages; ?>">Last</a></li>
        </ul>
      </div>
    </body>
</html>