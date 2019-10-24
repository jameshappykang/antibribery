<?php
require_once("db.php");

//$sql = "SELECT film_owner FROM films where (film_id = 11)";
$sql = "SELECT * FROM films WHERE film_id ='12'";

               $result = mysqli_query($link, $sql);

if (!$result = $mysqli->query($sql)) {
    // Oh no! The query failed. 
    echo "Sorry, 網站遇到了問題！";

    // Again, do not do this on a public site, but we'll show you how
    // to get the error information
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}
// Phew, we made it. We know our MySQL connection and query 
// succeeded, but do we have a result?
if ($result->num_rows === 0) {
    // Oh, no rows! Sometimes that's expected and okay, sometimes
    // it is not. You decide. In this case, maybe actor_id was too
    // large? 
    echo "查詢不到任何資料";
    exit;
}
// Now, we know only one result will exist in this example so let's 
// fetch it into an associated array where the array's keys are the 
// table's column names
$films = $result->fetch_assoc();
echo $films['film_no'] . '&nbsp;&nbsp;&nbsp;&nbsp;' . $films['film_owner'];
echo "<br>" . "<br>";
echo '目前得票：' . $films['vote_total'];

?>  
