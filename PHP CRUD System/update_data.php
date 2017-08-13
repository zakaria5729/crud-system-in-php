<?php session_start(); ?>
<?php
include_once"all_in_one_classes.php";
$obj = new all_in_one_classes();
$get_id = $_GET['row_id'];
$up = $obj->dataShowForUpdate($get_id);
//echo $get_id;
$row = mysqli_fetch_array($up);
if(isset($_POST['registrationSave'])){
    $obj->dataUpdate($get_id,$_POST['nameText'],$_POST['emailText'],$_POST['passwordText'],$_FILES['imageText']);
}
?>
<br>
<h1 align="center">Updata Your Account</h1>
<form action="" method="post" enctype="multipart/form-data">
    <table align="center">
        <tr>
            <td>Name</td>
            <td>:</td>
            <td><!--<input type="hidden" name="id" value="<?php /*echo $row['id']; */?>">-->
                <input type="text" name="nameText" value="<?php echo $row['name']; ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><input type="text" name="emailText" value="<?php echo$row['email']; ?>"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="text" name="passwordText" value="<?php echo$row['password']; ?>"> </td>
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