﻿<!DOCTYPE html>
<html lang="zh-tw">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>反賄選影片票選</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <!-- Services -->
  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
      
      <img class="img-fluid" src="img/portfolio/thanks.gif" alt="">


      <?php
require_once("db.php");
// Let's pass in a $_GET variable to our example, in this case
// it's film_id for actor_id in our Sakila database. Let's make it
// default to 1, and cast it to an integer as to avoid SQL injection
// and/or related security problems. Handling all of this goes beyond
// the scope of this simple example. Example:
//   http://example.org/script.php?film_id=4
   if (isset($_GET['film_id']) && is_numeric($_GET['film_id'])) {
      $film_id = (int) $_GET['film_id'];
   } else {
       $film_id = 1;
   }
$fid = $_GET['film_id'];
//var_dump($fid);
// Connecting to and selecting a MySQL database named sakila
// Hostname: 127.0.0.1, username: your_user, password: your_pass, db: sakila

//資料庫連接後，第一個工作
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$uip=getUserIpAddr();
//echo '<br>';
//var_dump($uip);//exit;

//資料庫連接後，第二個工作
$getDate= date("Y-m-d");
//echo '<br>';
//var_dump($getDate);//exit;

// Perform an SQL query
$sql = "SELECT * FROM films WHERE film_id ='$fid'";
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
//echo "Sometimes I see " . $films['film_no'] . " " . $films['film_owner'] . " on TV.";
//echo '<br>';

$v_num =(int) $films['vote_total'];
//var_dump($v_num);
$new_num =(int) ($v_num +1);
//echo '<br>';
//var_dump($new_num);//exit;
//$total = (v_total +1);
//echo '<br>';
//var_dump($total);exit;

// Now, let's fetch five random actors and output their names to a list.
// We'll add less error handling here as you can do that on your own now
$sql = "SELECT * FROM vote_records  where user_ip ='$uip' and vote_date = '$getDate'";

if (!$result = $mysqli->query($sql)) {
    echo "Sorry, 網站遇到了問題！";
    exit;
}

if ($result->num_rows< 5) {

     $sql = "INSERT INTO vote_records (user_ip, vote_date)
               VALUES ('$uip', '$getDate')";
               $result = mysqli_query($link, $sql);


     $sql = "UPDATE films SET vote_total = '$new_num' where  film_id = '$fid'";
               $result = mysqli_query($link, $sql);
               
               echo "<br>" . "<br>" . '影片編號：' . $films['film_no'] . '&nbsp;&nbsp;作者：' . $films['film_owner'];
               echo "<br>";
               echo '目前得票：' . $new_num;  
}
else
{
               echo "<br>" . "<br>" . '影片編號：' . $films['film_no'] . '&nbsp;&nbsp;作者：' . $films['film_owner'];
               echo "<br>";
               echo '目前得票：' . $v_num;  
               
               echo  "<br>" . "<br>" . "<br>" . "您的投票額度已經滿了喔！謝謝！";
}
// The script will automatically free the result and close the MySQL
// connection when it exits, but let's just do it anyways
//$result->free();
$mysqli->close();
?>

                  <br><br>
                  <form class="btn btn-primary" method = 'GET' action = 'vote-01.php'>
                  <button name="film_id" value="1">真的很讚！我再+1</button>
                  </form>
                  
                  <form class="btn btn-primary" action = 'index.php#portfolio'>
                  <button >看其他作者的影片</button>
                  </form>
      </div>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; 臺中地方檢察署2019</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="https://www.tcc.moj.gov.tw/295804/295856/295857/Lpsimplelist">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://zh-tw.facebook.com/pages/category/Political-Organization/%E8%87%BA%E4%B8%AD%E5%9C%B0%E6%AA%A2%E7%BD%B2%E5%8F%8D%E8%B3%84%E9%81%B8%E5%B0%88%E9%A0%81-653771195010443/">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://zh-tw.facebook.com/pages/category/Government-Organization/I%E5%B9%B8%E7%A6%8F%E8%A1%8C%E5%8B%95%E8%81%AF%E7%9B%9F-324412234389809/">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">隱私權政策</a>
            </li>
            <li class="list-inline-item">
              <a href="#">網站使用規範</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>

</body>

</html>
