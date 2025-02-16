<?php
include "koneksi.php";

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Halaman Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            }

            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color:#4facfe;
            }

            .login-container {
                background-color: ;
                padding: 30px;
                border-radius: 8px;
                shadow: 1px;
                width: 100%;
                max-width: 400px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 1);
                background-color: #A1E3F9;
            }

            h2{
                text-align: center;
                margin-bottom: 20px;
            }

            .input-grup {
                margin-bottom: 20px;
            }

            label {
                margin-bottom: 15px;
                display: block;
            }

            .btn {
                background-color: #D1F8EF;
            }

            .input-with-icon {
            position: relative;
            
            }

            .input-with-icon input {
                width: 100%;
                padding-left: 40px; 
            }

            .i {
                position: absolute; 
                left: 10px; 
                top: 50%;
                transform: translateY(-50%);   
            }


        </style>
    </head>
    <body>

    <div class="login-container">
        <form action="" method="post" class="form">

            <h2>Login</h2>

                <div class=" input-grup">
                    <label class="form-label">Username</label>

                    <div class="input-with-icon">
                        
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill i" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                        
                        <input type="text" class="form-control" name="username" autofocus>
                    </div>
                    
                </div>

                <div class=" input-grup">
                    <label class="form-label">Password</label>

                    <div class="input-with-icon">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill i" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                    </svg>

                        <input type="password" class="form-control" name="password">
                    </div>
                    
                </div>
                
                <button type="submit" class="btn form-control" name="login">Login</button>
            
    </form>
    </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
<?php
if(isset($_POST['login'])){
    //echo "proses";
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query=mysqli_query($koneksi,"select * from users where username='$username' AND password='$password'"); 
    $cek = mysqli_num_rows($query);
    // echo $cek;
    if($cek>0){
        //berhasil login
        session_start();
        $_SESSION['status']="sukses";
        $_SESSION['username']=$_POST['username'];
        $_SESSION['password']=$_POST['password'];
        header('location:index.php');
    }
}

?>