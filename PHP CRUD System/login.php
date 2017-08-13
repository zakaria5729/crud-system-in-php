<?php
session_start();
include_once'all_in_one_classes.php';
$obj = new all_in_one_classes();

if(isset($_POST['loginSave'])){
    $log =$obj->login($_POST['emailText'],$_POST['passwordText']);
    if (mysqli_num_rows($log) > 0) {
        while($row = mysqli_fetch_array($log)){
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['userSession'] = $_POST['emailText'];
            echo"<script>window.location.href='profile.php'</script>";
        }
    }
}
?>
<h2 align="center">User Login</h2><p><a href="index.php">Back Home</a> </p>
<form action="" method="post">

    <table align="center">
        <tr>
            <td>Email:</td>
            <td><input type="text" name="emailText"> </td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="passwordText"> </td>
        </tr>
        <tr>
            <td colspan="4" align="center"><input type="submit" value="Login" name="loginSave"> </td>
        </tr>
    </table>
</form>