<?php
$servername = "sql1.njit.edu";
$username = "hk378";
$password = "friends4ever";

try {
    $conn = new PDO("mysql:host=$servername;dbname=hk378", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br><br>"; 
     $stmt = $conn->prepare("SELECT * from accounts where id < 6"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $count=0;
    $html="<table border='1'><tr>";
    $html.="<th>id</th><th>email</th><th>fname</th><th>lname</th><th>phone</th><th>birthday</th><th>gender</th><th>password</th></tr>";
    
    while($row = $stmt->fetch())
    {
    $count++;
    $rowHtml="<tr>";
    $rowHtml.="<td>";
    $rowHtml.=$row["id"];
    $rowHtml.="</td>";
    $rowHtml.="<td>";
    $rowHtml.=$row["email"];
    $rowHtml.="</td>";
    $rowHtml.="<td>";
    $rowHtml.=$row["fname"];
    $rowHtml.="</td>";
    $rowHtml.="<td>";
    $rowHtml.=$row["lname"];
    $rowHtml.="</td>";
    $rowHtml.="<td>";
    $rowHtml.=$row["phone"];
    $rowHtml.="</td>";
    $rowHtml.="<td>";
    $rowHtml.=$row["birthday"];
    $rowHtml.="</td>";
    $rowHtml.="<td>";
    $rowHtml.=$row["gender"];
    $rowHtml.="</td>";
    $rowHtml.="<td>";
    $rowHtml.=$row["password"];
    $rowHtml.="</td>";
    $rowHtml.="</tr>";
    $html.=$rowHtml;
    }
    $html.="</table>";
    echo "<b>The no. of records: </b>$count <br><br>";
    echo $html;
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>