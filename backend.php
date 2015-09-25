<?php
if (isset($_POST['url']) && !filter_var($_POST['url'], FILTER_VALIDATE_URL) === false) {
  $servername = "localhost";
  $username = "root";
  $password = 'Pa$$w0rd';
  $dbname = "URLss";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $url = $_POST['url'];
  $short = 'http://short.ener/'. substr(sha1($url),0,6);
  //echo "URL " . $url . "\n";
  $ipaddress = $_SERVER['REMOTE_ADDR'];
  $datetime = date('Y-m-d H:i:s');
  $sql = "INSERT INTO `URLShortServices`(`url`, `short`, `ipaddress`, `datetime`)
  VALUES ('".$url."', '".$short."', '".$ipaddress."', '".$datetime."')";

  if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    //echo "Error: " . $sql . "\n" . $conn->error;
  }

  $sql = "SELECT * FROM URLShortServices";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    $return_arr = Array();
    while($row = $result->fetch_assoc()) {
      array_push($return_arr,$row);
    }
      /*print "<pre>";
      echo json_encode($return_arr);
      print "</pre>";*/
  } else {
    //echo "0 results";
  }


  $conn->close();
  header('Content-type:application/json;');
  echo json_encode($return_arr);
} else {
  echo("$url is not a valid URL");
}
?>
