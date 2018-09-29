
<!DOCTYPE html>
<html>
    <head>
        <title>BackBencher's Shop</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <?php require("menu.php"); ?>
        <section>
            <h2 style="text-align: center;margin-bottom: 0; font-weight: bold;">Add New Customer</h2>
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


                $query = "INSERT INTO g_customer(name,present_address,permanent_address,phone,nid,email,available_balance)VALUES('$name','$present_address','$permanent_address',' $phone','$nid','$email','$available_balance')";
                $sucess = mysqli_query($con, $query);
                if ($sucess) {
                    echo "<span style='display:block;text-align:center;color:green;font-size:18px;'>Data inserted.</span>";
                } else {
                    echo "<span style='display:block;text-align:center;color:green;font-size:18px;'>Data not inserted.</span>";
                    //echo mysqli_error($con);
                }
            }
            ?>

            <form class="form" action="" method="POST">
                <table width="90%;" style="margin-left: 40px;">
                    <tr>
                        <td width="30%">Name</td>
                        <td><input type="text" name="name" placeholder="Name" required></td>
                    </tr>
                    <tr>
                        <td width="30%">Present Address</td>
                        <td><input type="text" name="present_address" placeholder="Present Address" required></td>
                    </tr>
                    <tr>
                        <td width="30%">Permanent Address</td>
                        <td><input type="text" name="permanent_address" placeholder="Permanent Address" required></td>
                    </tr>
                    <tr>
                        <td width="30%">Phone</td>
                        <td><input type="number" name="phone" placeholder="Phone" required></td>
                    </tr>
                    <tr>
                        <td width="30%">NID</td>
                        <td><input type="number" name="nid" placeholder="NID" required></td>
                    </tr>
                    <tr>
                        <td width="30%">Email</td>
                        <td><input type="text" name="email" placeholder="Email" required></td>
                    </tr>
                    <tr>
                        <td width="30%">In Advance Amount</td>
                        <td><input type="number" name="available_balance" placeholder="Amount" required></td>
                    </tr>

                    <tr>
                        <td>
                        <td><input class="addsubmit" type="submit" name="button" value="Add"></td>
                        </td>
                    </tr>

                </table>
            </form>
        </section>

       <footer><h6 style="text-align: right;margin: 0;padding: 5px 0px;color: silver">Developed by &copy; BackBenchers  </h6></footer>

    </body>
</html>