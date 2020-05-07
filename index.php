<!DOCTYPE html>
<html>
<head> 
<img src="hb2.jpg" alt="Pic" style="float:right;width:350px;height:500px;">
<h2> <p class="sansserif">Hi Friends! </p></h2>
<style>
.error {color: #0000FF;}

.sansserif {
  font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>
<body>

<?php
//Setting background color
echo "<body style='background-color: #ffe4e1'>";

// define variables and set to empty values
$nameErr = $lnameErr = $monthErr =  $dayErr =  $yearErr = $gift_prefErr = $restaurantErr = $storeErr = "";
$id = $fname = $lname  =$month = $year = $day=  $gift_pref = $restaurant = $store = "";
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $nameErr = "First name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
    if (empty($_POST["lname"])) {
    $lnameErr = "Last name is required";
  } else {
	$lname = test_input($_POST["lname"]);
   // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed"; 
    }
  }
   
   if (empty($_POST["month"])) {
    $monthErr = "Month is required";
  } else {
	$month = test_input($_POST["month"]);
    // check if month address is well-formed
    if (!preg_match("/^[0-9]/",$month)) {
      $monthErr = "Only numbers between 1 and 12 are allowed"; 
    }
  }
  
      if (empty($_POST["day"])) {
    $dayErr = "Day is required";
  } else {
	$day = test_input($_POST["day"]);
    // check if day address is well-formed
    if (!preg_match("/[1-31]/",$day)) {
      $dayErr = "Only numbers from 1 to 31 are allowed"; 
    }
  }
  
      if (empty($_POST["year"])) {
    $yearErr = "Year is required";
  } else {
	$year = test_input($_POST["year"]);
    // check if year address is well-formed
    if (!preg_match("/^[0-9]/",$year)) {
      $yearErr = "Only numbers allowed"; 
    }
  }
    
	if (empty($_POST["gift_pref"])) {
    $gift_prefErr = "Gift preference is required";
  } else {
    $gift_pref= test_input($_POST["gift_pref"]);
  }
}

  if (empty($_POST["store"])) {
    $store = "";
  } else {
	$store = test_input($_POST["store"]);
  }

  if (empty($_POST["restaurant"])) {
    $restaurant = "";
  } else {
    $restaurant = test_input($_POST["restaurant"]);
  }



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>


<h3><p class="sansserif">Please enter your birthday information below</p></h3>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  
  <p class="sansserif">First Name: <input type="text" name="fname" value="
  <?php echo $fname;?>">
  <span class="error">* 
  <?php echo $nameErr;?></span></p>
 
   <p class="sansserif">Last Name: <input type="text" name="lname" value="
   <?php echo $lname;?>">
  <span class="error">* 
  <?php echo $lnameErr;?></span></p>
  <br>
  
  <p class="sansserif">Birth Date (M D YYYY, i.e. 6 5 1982): <br> </p>
  <p class="sansserif">Month <input type="number" name="month" value="
  <?php echo $month;?>">
  <span class="error">
  <?php echo $monthErr;?></span>
  <class="sansserif">Day <input type="number" name="day" value="
  <?php echo $day;?>">
  <span class="error">
  <?php echo $dayErr;?></span>
  <class="sansserif">Year <input type="number" name="year" value="
  <?php echo $year;?>">
  <span class="error">* 
  <?php echo $yearErr;?></span></p>

  <br>
 <p class="sansserif"> Gift preference:
 <input type="radio" name="gift_pref" <?php if (isset($gift_pref) && $gift_pref=="Cash") echo "checked";?> value="Prefer Cash">Cash
 <input type="radio" name="gift_pref" <?php if (isset($gift_pref) && $gift_pref=="Giftcard") echo "checked";?> value="Prefer a Giftcard">Gift card
 <input type="radio" name="gift_pref" <?php if (isset($gift_pref) && $gift_pref=="Homemade") echo "checked";?> value="Homemade">Homemade Gift
 <input type="radio" name="gift_pref" <?php if (isset($gift_pref) && $gift_pref=="Gift") echo "checked";?> value="Prefer a Gift"> Surprise me
  
  <span class="error">* <?php echo $gift_prefErr;?></span> </p>

  <p class="sansserif">Favorite Store: <input type="text" name="store" value="
  <?php echo $store;?>">
  <span class="error">
  <?php echo $storeErr;?></span></p>

  
  <p class="sansserif">Favorite restaurant: <input type="text" name="restaurant" value="
  <?php echo $restaurant;?>">
  <span class="error">
  <?php echo $restaurantErr;?></span> </p>
  
  <br>
  
  <input type="submit" name="submit" value="Submit">  
</form>

<br><br>

<h2> <p class="sansserif">Thank you!</p> </h2>
</body>
</html>

<?php include 'database.php'; ?>

<?php
mysqli_query($connect, "INSERT INTO friend(fname, lname) 
VALUES ('$fname', '$lname')");

mysqli_query($connect, "INSERT INTO birthdate(id, month, day, year) 
VALUES (LAST_INSERT_ID(), '$month', '$day', '$year')");

mysqli_query($connect, "INSERT INTO gifts(id, giftpref, store, restaurant) 
VALUES (LAST_INSERT_ID(), '$gift_pref', '$store', '$restaurant')");

 ?>
 
<hr SIZE=2 NOSHADE WIDTH=“100%”>
<i>Katy Torres</i></font><br>
<i>URL: https://ktorressd.github.io/</i></font><br>































