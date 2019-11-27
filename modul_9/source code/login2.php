<html>
    <head>
        <title>laman login</title>
    </head>
    <body>
    <?php
        session_start();
        error_reporting(E_ALL^ E_NOTICE ^E_DEPRECATED);
        $conn = mysqli_connect('localhost','root','','informatika');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $submit = $_POST['submit'];

        if($submit){
            $sql = "select * from user where username = '$username' and password = '$password'";
            $query = mysqli_query($conn,$sql);
            $cek = mysqli_num_rows($query);

            if($cek > 0){
                $row= mysqli_fetch_assoc($query);
                if($row['status']=='administrator'){
                    $_SESSION['username']=$row['username'];
                    $_SESSION['status']="administrator";
                    header("location: halaman_admin.php");}
                elseif($row['status']=='member'){
                    $_SESSION['username']=$row['username'];
                    $_SESSION['status']="member";
                    header("location: halaman_member.php");}    
                }
                else{
                    echo "<script>
                            alert('gagal login');
                            documet.location = 'loginn.php'
                        </script>";
                    }
            }
        ?>
        <form action = "loginn.php" method = 'POST'>
            <p align = 'center'>
            username : <input type="text" name='username'></br>
            password : <input type="password" name='password'></br>
            <input type="submit" name='submit' value='submit'>
            </p>
        </form>
    </body>
</html>