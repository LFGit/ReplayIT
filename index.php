<html>
<head>
<title>ReplayITSc the Starcraft II replay center</title>



  <![if !IE]>
    <link rel="stylesheet" type="text/css" href="Styles/Style.css"/>
  <![endif]>

  <!--[if gte IE 6]>
    <link rel="stylesheet" type="text/css" href="Styles/Style_IE.css"/>
  <![endif]-->

</head>
<body>
  <div class="menu_bar">
  <a href="Index.php" style="text-decoration:none; color: #FFFFFF; "><b>ReplayITSc</b></a>
   <a style="text-decoration:none; color: #FFFFCC;" href="Index.php?action=Upload"> <li> Upload </li> </a>

  </div>
  
  <div class="main_content">
  </br>



 <table border="0">
 

    <?php
//comment
if(isset($_REQUEST['action'])){

    if($_REQUEST['action'] == 'Upload'){
      echo "<h3>Upload your replays</h3>";
      echo "<form method='post' action='Php_Scripts/Upload_to_db.php' enctype='multipart/form-data'>
      <input type='file' name='file' id='file' /> 
      <input type='submit' name='Upload' value='Upload file' />
      </form> </br>";

    }

  }else{

    echo "<h3>All Uploaded Replays</h3>";
    echo " <tr>
      <td> <b>Filename</b> </td>
      <td> <b>Size</b> </td>
      </tr>
      </br>";
      require_once("Php_Scripts/Connection.php");
      if(connect_to_db()){
         $query = "SELECT * FROM uploads;";
    
         $qry_result = mysql_query($query);
    
      if(mysql_num_rows($qry_result) > 0){
           while($data = mysql_fetch_assoc($qry_result)){
              echo "<tr>";
              echo "<td><a href='Download.php?id=".$data['id']."''>".explode(".",$data['filename'])[0] ."</a></td> <td> " . $data['filesize'] . " Bytes </td>";
              echo "</tr>";
           }
       }
    }
}
    ?>
  </table>
  </div>
  
  <div class="site_footer">
    <font size="1" color="#CCCCCC">Patterns from http://subtlepatterns.com/ </font>
  </div>
</body>
</html>