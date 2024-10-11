<?php
include 'header.html';
?>
<?php
include 'config.php';
$name = $email = $phone = $message = ""; 
$nameErr = $emailErr = $phoneErr = $messageErr = ""; 
$successMessage = ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
if (empty($_POST["name"])) { 
$nameErr = "Name is required"; 
} else { 
$name = test_input($_POST["name"]); 
} 
if (empty($_POST["email"])) { 
$emailErr = "Email is required"; 
} else { 
$email = test_input($_POST["email"]); 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
$emailErr = "Invalid email format"; 
} 
} 
if (empty($_POST["phone"])) { 
$phoneErr = "Phone is required";
} else { 
$phone = test_input($_POST["phone"]); 
} 
if (empty($_POST["message"])) { 
$messageErr = "Message is required"; 
} else { 
$message = test_input($_POST["message"]); 
} 
if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && 
empty($messageErr)) { 
$stmt = $conn->prepare("INSERT INTO contact (name, email, phone, message) 
VALUES 
(?,?,?,?)"); 
$stmt->bind_param("ssss", $name, $email, $phone, $message); 
if ($stmt->execute()) { 
$successMessage = "Thank you for your feedback!";
$name = $email = $phone = $message = ""; 
} else { 
echo "Error: ". $stmt->error; 
} 
$stmt->close(); 
} 
} 
function test_input($data) { 
$data = trim($data); 
$data = stripslashes($data); 
$data = htmlspecialchars($data); 
return $data; 
} 
$conn->close(); 
?>

<!DOCTYPE html>
<html>
<head>
<title>CONTACT Form</title>
<style>
    /* Add some basic styling to the form */
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        font-family: Arial, sans-serif;
  padding-top: 60px; 
    }
    form {
        max-width: 400px;
        margin: 40px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.5s; /* Add transition effect */
    }
    form.submitting {
        transform: scale(0.9); /* Scale down the form on submission */
        opacity: 0.5; /* Reduce opacity on submission */
    }
    input[type="text"], input[type="tel"], textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
    }
    input[type="submit"] {
        background-color: #23297F;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #585AB3;
    }
    .error {
        color: #red;
        font-size: 12px;
    }
    .success {
        color: #green;
        font-size: 12px;
    }
    .center-align {
  text-align: center;
  color: #23297F;
}
footer {
      background-color: #f7f7f7;
      padding: 20px;
      text-align: center;
      clear: both;
    }
    .footer-copyright {
      font-size: 14px;
      color: #666;
    }
    .footer-social-links {
      margin-top: 10px;
    }
    .footer-social-links a {
      margin-right: 20px;
      color: #666;
      transition: color 0.2s ease;
    }
    .footer-social-links a:hover {
      color: #333;
    }
</style>
</head>

<body>
<h2 class="thq-heading-2 center-align">Contact</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error"><?php echo $nameErr;?></span>
    <br><br>
    Email: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error"><?php echo $emailErr;?></span>
    <br><br>
    Phone: <input type="tel" name="phone" value="<?php echo $phone;?>">
    <span class="error"><?php echo $phoneErr;?></span>
    <br><br>
    Message: <textarea name="message" rows="5" cols="40"><?php echo $message;?></textarea>
    <span class="error"><?php echo $messageErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>
<span class="success"><?php echo $successMessage;?></span>
</body>
<footer>
    <div class="footer-container">
      <div class="footer-copyright">
        &copy; 2024 VrJHQ
      </div>
      <div class="footer-social-links">
        <a href="https://www.instagram.com/yourinstagramhandle" target="_blank">
          <i class="fa-brands fa-instagram"></i>
        </a>
        <a href="https://www.facebook.com/yourfacebookpage" target="_blank">
          <i class="fa-brands fa-facebook-f"></i>
        </a>
        <a href="https://www.x.com/yourxprofile" target="_blank">
          <i class="fa-brands fa-x"></i>
        </a>
      </div>
    </div>
  </footer>
</html>
