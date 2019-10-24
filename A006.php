<?php
include "db.php";
// Perform an SQL query
$sql = "SELECT film_id, film_owner, film_no, vote_total FROM films WHERE film_id = 6";
if (!$result = $mysqli->query($sql)) {
    // Oh no! The query failed. 
    echo "Sorry, 您的查詢發生錯誤";

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
    echo "查無此資料！";
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