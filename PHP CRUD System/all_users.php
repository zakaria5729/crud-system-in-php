<?php session_start(); ?>
<h1 align="center">All user are here</h1><p><a href="index.php">Back Home</a> </p>
    <?php
    echo $_SESSION['update'];
    ?>
 <table border="1" align="center">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Email</td>
                <td>Password</td>
                <td>Image</td>
            </tr>
            <?php
                include_once 'all_in_one_classes.php';
                $obj= new all_in_one_classes();


                /*Delete Cheeck */
                   if(!empty($_GET['row_id'])){
                       $del = $obj->dataDelete($_GET['row_id']);
                       if($del){
                           echo"Data Deleted";
                       }else{
                           echo"Data Not Deleted";
                       }
                   }

               $re= $obj->dataShow($_POST);
               while ($row = mysqli_fetch_array($re)) {
            ?>


            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><img src="image_folder/<?php echo $row['image']; ?>" width="100" height="100"></td>

                <td>
                    <a href="all_users.php?row_id=<?php echo $row['id']; ?>"> Delete</a>
                    <a href="update_data.php?row_id=<?php echo $row['id'] ?>">Edit</a>
                </td>
            </tr>
               <?php
               }
               ?>
        </table>