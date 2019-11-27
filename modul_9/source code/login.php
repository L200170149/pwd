<html>
    <head>
        <title>login</title>
    </head>
    <body>
        <form action="login.php" method="post">
            <table border="0">
                <tr>
                    <td>username</td>
                    <td>:</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td>:</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="submit" name="submit"></td>
                </tr>
            </table>
        </form>
        <?php
            error_reporting(E_ALL^E_NOTICE);
            session_start();
            $conn = mysqli_connect("localhost","root","","informatika");
            $user = $_POST["username"];
            $pass = $_POST["password"];
            $submit = $_POST["submit"];

            if($submit){
                $sql = "select * from user where username = '$user' and password = '$pass'";
                $query = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($query);

                if($row["username"]!=""){
                    $_SESSION["username"]=$row["username"];
                    $_SESSION["status"] = $row["status"];
                    echo "<script>
                            alert('anda berhasil login sebagai $row[username]');
                            document.location = 'hasillogin.php';
                          </script>
                        ";
                }
                else{
                    echo"<script>
                    alert('login gagal');
                    document.location = 'login.php';
                    </script>";
                }
            }
        ?>
    </body>
</html>