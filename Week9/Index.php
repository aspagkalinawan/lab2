<html>
<body>
<div style = "border:5px double #000000">
  <center>
<h1>Albert Pagkalinawan</h1>
<p>Class BSIT-MI211.</p>
<hr>
<p>Personal Profile</p>
<p>Full Name: Albert Damian S. Pagkalinawan</p>
<p>Nickname: Albert</p>
<p>Age: 21</p>
<p>Birthdate: September 23, 2001</p>
<p>Senior High School Graduated From? City the High School is located at: Graduated from Integrated Montesori Center</p>
<p>Course: BSIT-MI, Bachelor of Science in Information Technology with specialization in Mobile and Internet Technology</p>
<p>Scholarship? Yes / No If yes, %? type?:  Yes, APC Loyalty Discount 2021Transferee / Second Course?: None</p>
<p>Did you choose this course? Yes / NoWhy Yes?: Yes, I wanted to create my own game when I was young.</p>
<p>I.T. Experience: Programming / Gaming / Others: None </p>
<p>I.T experienceHobbies / Interests / libangan: Playing vedio games, Working out, Swimming</p>
<p>Goals in life / pangarap sa buhay: Createmy own video game, have a good source of income</p>
<p>What do you expect to learn from this course (Web Programming )?: I expect to build on my skills and learn new ones at the same time.</p>
<p>What do you want to learn to help you in your chosen Major?:I want to learn different programming tools to help me in future jobs and interviews.</p>
<p>Any other interesting aspects of your life that you would like to share;I like to build computers.</p>
  </div>
  </center>
</body>
  <body>
    <h1> Social Media </h1>
  <a href="https://www.facebook.com">Facebook</a>
    <a href="https://www.instagram.com">Instagram</a>
  </body>
  
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
