<?php
if (isset($_POST['url']) && !filter_var($_POST['url'], FILTER_VALIDATE_URL) === false) {
     echo("$url is a valid URL");
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
  $short = 'http://shortener/'. substr(sha1($url),0,6);

  $ipaddress = $_SERVER['REMOTE_ADDR'];
  $datetime = date('Y-m-d H:i:s')
  $sql = "INSERT INTO `URLShortServices`(`url`, `short`, `ipaddress`, `datetime`)
  VALUES ('".$sortcode."', '".$short."', '".$ipaddress."', '".$datetime."')";

  if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "\n" . $conn->error;
  }

$sql = "SELECT * FROM ukbank";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      print "<pre>";
      print_r($row);
      print "</pre>";
    }
} else {
    echo "0 results";
}


$conn->close();
}
} else {
     echo("$url is not a valid URL");
}
?>
