<?php
if (isset($_GET['idedit'])) {
    $id = $_GET['idedit'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>BackBencher's Shop</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body> 
        <?php require("menu.php"); ?>
        <section>
            <h2 style="text-align: center;margin-bottom: 0; font-weight: bold;">Updating Member</h2>
            <?php
            if (isset($_POST['button'])) {

                $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                $name = $_POST['name'];
                $present_address = $_POST['present_address'];
                $permanent_address = $_POST['permanent_address'];
                $phone = $_POST['phone'];
                $nid = $_POST['nid'];
                $email = $_POST['email'];
                $available_balance = $_POST['available_balance'];
                $total_due = $_POST['total_due'];
                $g_id = $_POST['g_id'];


                $query = "UPDATE g_customer SET name='$name',present_address='$present_address',permanent_address='$permanent_address',phone='$phone',nid='$nid',email='$email',available_balance='$available_balance',total_due='$total_due' where g_id='$id'";
                $sucess = mysqli_query($con, $query);
                if ($sucess) {
                    header("Location:view_customer.php?action=yes");
                } else {
                    header("Location:view_customer.php? action=no");
                }
            }
            ?>

            <form class="form" action="edit_customer.php" method="POST">
                <input type="hidden" name="g_id" value="<?php echo $id; ?>" />
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'dbpos') or die('Database not Found.');
                $query = "SELECT * FROM g_customer where g_id='$id'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <table width="90%;" style="margin-left: 40px;">
                        <tr>
                            <td width="30%">Name</td>
                            <td><input type="text" name="name" value="<?php echo $row['name']; ?>" required></td>
                        </tr>
                        <tr>
                            <td width="30%">Present Address</td>
                            <td><input type="text" name="present_address" value="<?php echo $row['present_address']; ?>" placeholder="" required></td>
                        </tr>
                        <tr>
                            <td width="30%">Permanent Address</td>
                            <td><input type="text" name="permanent_address" value="<?php echo $row['permanent_address']; ?>" placeholder="" required></td>
                        </tr>
                        <tr>
                            <td width="30%">Phone</td>
                            <td><input type="number" name="phone" value="<?php echo $row['phone']; ?>" placeholder="" required></td>
                        </tr>
                        <tr>
                            <td width="30%">National ID</td>
                            <td><input type="number" name="nid" value="<?php echo $row['nid']; ?>" required></td>
                        </tr>
                        <tr>
                            <td width="30%">Email</td>
                            <td><input type="text" name="email" value="<?php echo $row['email']; ?>" placeholder="" required></td>
                        </tr>
                        <tr>
                            <td width="30%">Available Balance</td>
                            <td><input type="number" name="available_balance" value="<?php echo $row['available_balance']; ?>" placeholder="" required></td>
                        </tr>
                        <tr>
                            <td width="30%">Total Due</td>
                            <td><input type="number" name="total_due" value="<?php echo $row['total_due']; ?>" required></td>
                        </tr>
                        <tr>
                            <td>
                            <td><input class="addsubmit" type="submit" name="button" value="UPDATE"></td>
                            </td>
                        </tr>

                    </table>
                <?php } ?>
            </form>
        </section>

        <footer><h6 style="text-align: right;margin: 0;padding: 5px 0px;color: silver">Developed by &copy; BackBenchers  </h6></footer>

    </body>
</html>
