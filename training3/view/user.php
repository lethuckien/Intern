<!doctype html>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
      <h1>
        USER PANEL
      </h1>
      <style type="text/css">
        .tg  {border-collapse:collapse;border-color:#ccc;border-spacing:0;width:90%;margin-left:auto;margin-right:auto;margin-top:10%}
        .tg td{background-color:#fff;border-color:#ccc;border-style:solid;border-width:1px;color:#333;
          font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg th{background-color:#f0f0f0;border-color:#ccc;border-style:solid;border-width:1px;color:#333;
          font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
        .tg .tg-buh4{background-color:#f9f9f9;text-align:left;vertical-align:top}
        .tg .tg-0lax{text-align:left;vertical-align:top}
      </style>
      <table class="tg">
        <thead>
          <tr>
            <th class="tg-0lax">ID</th>
            <th class="tg-0lax">Thumb</th>
            <th class="tg-0lax">Title</th>
          </tr>
        </thead>
        <tbody>
          <?php
              while ($row = mysqli_fetch_assoc($r->result)){
                echo "<tr>
            <td class=\"tg-buh4\"><a href=\"?action=detail&postid=".$row['id']."\">".$row['id']."</a></td>
            <td class=\"tg-buh4\"><a href=\"?action=detail&postid=".$row['id']."\"><img src=\"".$row['image']."\" style=\"max-width:300px;width:100%;float:left\"><img></a></td>
            <td class=\"tg-buh4\"><a href=\"?action=detail&postid=".$row['id']."\">".$row['title']."</a></td>
          </tr>"
            ;}
          ?>
        </tbody>
      </table>
      <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($r->pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($r->pageno <= 1){ echo '#'; } else { echo "?pageno=".($r->pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($r->pageno >= $r->total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($r->pageno >= $r->total_pages){ echo '#'; } else { echo "?pageno=".($r->pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $r->total_pages; ?>">Last</a></li>
        </ul>
    </body>
</html>