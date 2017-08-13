<?php session_start(); ?>
<?php
//session_start();

include_once "all_in_one_classes.php";
$obj = new all_in_one_classes();
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $addressErr = $passwordErr = $mobileErr = "";
$name = $email =$password = $gender = $address = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nameText"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["emailText"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
    }
    if (empty($_POST["passwordText"])) {
        $passwordErr = "Password is required";
    } else {
        $email = test_input($_POST["email"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<?php
if(isset($_POST['registrationSave'])){
    if(!empty($_POST['nameText'])&& !empty($_POST['emailText'])&& !empty($_POST['passwordText'])){
        $obj->registration($_POST['nameText'],$_POST['emailText'],$_POST['passwordText'],$_FILES['imageText']);
    }
}
?>
<html>
<head>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body><br>
<h1 align="center">Hello Every body This is Your <span class="error">Php</span> and <span class="error">MySQLi</span>Tutorial <span class="error">All in One.</span></h1>
<h2 align="center">Registration Form</h2>
<form action="" method="post" enctype="multipart/form-data">
    <table align="center">
        <tr>
            <td>Name</td>
            <td>:</td>
            <td><input type="text" name="nameText"> <span class="error">* <?php echo $nameErr;?></span></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="text" name="emailText"><span class="error">* <?php echo $emailErr;?></span></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="text" name="passwordText"><span class="error">*<?php echo $passwordErr;?></span> </td>
        </tr>
        <tr>
            <td>Image</td>
            <td>:</td>
            <td><input type="file" name="imageText"></td>
        </tr>
        <tr>
            <td colspan="4" align="center"><input type="submit" value="Save" name="registrationSave"></td>
        </tr>
    </table>
</form>
<ul>
    <li><a href="all_users.php">Click For Show Users</a> </li>
    <li><a href="login.php">Click For Login</a> </li>
</ul>
</body>
</html>

