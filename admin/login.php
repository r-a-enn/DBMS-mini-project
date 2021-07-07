<?php  include("../config/constants.php");?>
<html>

<head>

    <title>Login - Food Order System</title>
    
    <link rel="stylesheet" href="../css/login.css">
    <link href="../css/style.css" type="text/css" rel="stylesheet" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    

</head>


<body>

    <div class="login">
        <section class="login-block">
            <br></br>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 login-sec">
                        <h2 class="text-center">Admin Panel</h2>
                        <!-- Login Form Starts HEre -->
                        <form action="" method="POST" class="login-form" width="20px">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter Username">

                            </div>
                            <br>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter Password">
                            </div>


                            <div class="form-check">

                                <input type="submit" name="submit" value="Login" class="btn btn-login float-right">
                            </div>
                            

                        </form>
                        <!-- Login Form Ends HEre -->
                        <br></br>
                        <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
                         ?>


                    </div>

                    
                    <div class="col-md-8">
                        <img class="d-block img-fluid"
                            src="https://image.freepik.com/free-photo/top-view-delicious-fried-chicken-with-seasonings-vegetables-dark-space_140725-75663.jpg"
                            alt="First slide"   width= "100%";
 >
                        <div class="carousel-caption d-none d-md-block">
                            <div class="banner-text">
                                <h2>Freshness in every bite</h2>
                                <p>Restaurant that features nutrient rich ingredients, created by top of line chefs!</p>
                            </div>

                        </div>


                    </div>


                </div>


            </div>
            <br></br>
            <br></br>
        </section>
</body>

</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
        $username = $_POST['username'];
        $password = $_POST['password'];

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User AVailable and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>