<?php
require_once('connection.php');
if(isset($_POST['login']))
{
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    if(empty($email) || empty($pass))
    {
        echo '<script>alert("please fill the blanks")</script>';
    }
    else
    {
        $query="select * from users where EMAIL='$email'";
        $res=mysqli_query($con,$query);
        if($row=mysqli_fetch_assoc($res))
        {
            $db_password = $row['PASSWORD'];
            if(md5($pass) == $db_password)
            {
                session_start();
                $_SESSION['email'] = $email;
                header("location: cardetails.php");
            }
            else
            {
                echo '<script>alert("Enter a proper password")</script>';
            }
        }
        else
        {
            echo '<script>alert("enter a proper email")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>CAR RENTAL</title>
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
   
    <script type="text/javascript">
        function preventBack() {
            window.history.forward(); 
        }
          
        setTimeout("preventBack()", 0);
          
        window.onunload = function () { null };
    </script>
</head>
<body>
<style>
<body class="body">

<style>
*{
    margin: 0;
    padding: 0;

}

body {
    background: url("images/original.jpg");
    background-position: center;
    background-size: cover;
    margin: 0;
    padding: 0;
    height: 100vh;
    overflow: hidden;
    position: relative; /* Add relative positioning for overlay */
}

/* Add an overlay with reduced opacity */
body::before {
    content: "";
    background: rgba(0, 0, 0, 0.5); /* Adjust the opacity level as needed */
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1; /* Place the overlay behind the content */
}

.main {
    width: 100%;
    height: 100%;
    animation: infiniteScrollBg 50s linear infinite;
}

.navbar{
    width: 1200px;
    height: 75px;
    margin: auto;
}

.icon{
    width:200px;
    float: left;
    height : 70px;
}

.logo{
    color: #ff7200;
    font-size: 35px;
    font-family: Arial;
    padding-left: 20px;
    float:left;
    padding-top: 10px;

}
.menu{
    width: 400px;
    float: left;
    height: 70px;

}

ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
}

ul li{
    list-style: none;
    margin-left: 62px;
    margin-top: 27px;
    font-size: 14px;

}

ul li a {
    text-decoration: none;
    color: black;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;
    background: orange; /* Add a background color (in this case, orange) */
    padding: 10px 20px; /* Add padding to improve readability */
    border-radius: 10px; /* Add rounded corners for a button-like appearance */
}

ul li a:hover {
    background: white; /* Change the background color on hover */
    color: orange; /* Change the text color on hover */
}.search{
    width:330px;
    float:left;
    margin-left: 270px;

}

.srch{
    font-family: 'Times New Roman';
    width: 200px;
    height: 40px;
    background: transparent;
    border: 2px solid black;
    margin-top: 13px;
    color: black;
    border-right: none;
    font-size: 15px;
    float:left;
    
    border-bottom-left-radius: 5px;
    border-top-left-radius: 5px;
}

.btn{
    width: 100px;
    height: 40px;
    background: orange;
    border :2px solid black;
    margin-top: 13px;
    color:white;
    font-size: 15px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;

}

.btn:focus{
    outline: none;
}
.srch:focus{
    outline: none;
}

.content{
    width:1200px;
    height:auto;
    margin: auto;
    color:white;
    font-style: bold;
    position: relative;
}

.content .par{
    padding-left: 20px;
    padding-bottom: 25px;
    font-family: Arial;
    letter-spacing: 1.2px;
    line-height: 30px;
}
.content h1{
    font-family: 'Times New Roman';
    font-size: 50px;
    padding-left: 20px;
    margin-top: 9%;
    letter-spacing: 2px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}


.content .cn{
    width: 160px;
    height: 40px;
    background: #ff7200;
    border: none;
    margin-bottom: 10px;
    margin-left: 20px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    transition: 0.4s ease;

}

.content .cn a{
    text-decoration: none;
    color: black;
    transition: 0.3s ease;
}

.cn:hover{
    background: white;
}


.content span{
    color:orange;
    font-size: 60px;
}

.form{
    width: 250px;
    height: 400px;
    background: linear-gradient(to top, rgba(0,0,0,0.8)50%,rgba(0,0,0,0.8)50%);
    position: absolute;
    top:-20px;
    left: 870px;
    border-radius: 10px;
    padding: 20px;

}

.form h2{
    width:220px;
    font-family: sans-serif;
    text-align: center;
    color: orange;
    font-size: 22px;
    background-color: white;
    border-radius: 10px;
    margin: 2px;
    padding: 8px;

}

.form input{
    width: 240px;
    height: 35px;
    background: transparent;
    border-bottom: 1px solid #ff7200;
    border-top: none;
    border-right: none;
    border-left:none;
    color:#fff;
    font-size: 15px;
    letter-spacing: 1px;
    margin-top: 30px;
    font-family: sans-serif;
}
.form input:focus{
    outline: none;
}

::placeholder{
    color:#fff;
    font-family: Arial;
}

.btnn{
    width: 240px;
    height: 40px;
    background: #ff7200;
    border:orange;
    margin-top: 30px;
    font-size: 18px;
    
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
}

.btnn:hover{
    background: #fff;
    color:#ff7200;
}

.btnn a{
    text-decoration: none;
    color: black;
    font-weight: bold;
}

.form .link{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 17px;
    padding-top: 20px;
    text-align: center;
    color: #fff;
}

.form .link a{
    text-decoration: none;
    color:#ff7200
}

.liw{
    padding-top: 15px;
    padding-bottom: 10px;
    text-align: center;
}

.icon a{
    text-decoration: none;
    color: #fff;
}

.icon ion-icon{
    color:#fff;
    font-size: 30px;
   
    padding-left: 5px;
    padding-top: 5px;
    transition: 0.3s ease;

}

.icon ion-icon:hover{
    color: #ff7200;
}

.liw{
    color: #fff;
}




.adminbtn {
    width: 200px; /* Increase the width to make it wider */
    height: 60px; /* Increase the height to make it taller */
    background: #ff7200;
    border: none;
    font-size: 24px; /* Increase the font size for larger text */
    border-radius: 10px;
    cursor: pointer;
    color: #fff;
    transition: 0.4s ease;
}

.adminbtn a {
    text-decoration: none;
    color: black;
}

</style>


    <div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">CaRs</h2>
            </div>
            <div class="menu">
                <ul>
                   <ul>
    <li><a class="menu-item" href="#">HOME</a></li>
    <li><a class="menu-item" href="aboutus.html">ABOUT</a></li>
    <li><a class="menu-item" href="#">SERVICES</a></li>
    <li><a class="menu-item" href="contactus.html">CONTACT</a></li>
    <li><a href="adminlogin.php">ADMIN</a></button></li>
     </ul>

                </ul>
            </div>
            
          
        </div>
        <div class="content">
            <h1>Rent Your <br><span>Dream Car</span></h1>
            <p class="par"><b>Live the life of Luxury.</b><br>
                Just rent a car of your wish from our vast collection.<br>Enjoy every moment with your family<br>
                 Join us to make this family vast.  </p>
            <button class="cn"><a href="register.php">JOIN US</a></button>
            <div class="form">
                <h2>Login Here</h2>
                <form method="POST"> 
                <input type="email" name="email" placeholder="Enter Email Here">
                <input type="password" name="pass" placeholder="Enter Password Here">
                <input class="btnn" type="submit" value="Login" name="login"></input>
                </form>
                <p class="link">Don't have an account?<br>
                <a href="register.php">Sign up</a> here</a></p>
                <!-- <p class="liw">or<br>Log in with</p>
                <div class="icon">
                    &emsp;&emsp;&emsp;&ensp;<a href="https://www.facebook.com/"><ion-icon name="logo-facebook"></ion-icon> </a>&nbsp;&nbsp;
                    <a href="https://www.instagram.com/"><ion-icon name="logo-instagram"></ion-icon> </a>&ensp;
                    <a href="https://myaccount.google.com/"><ion-icon name="logo-google"></ion-icon> </a>&ensp;
                    
                </div> -->
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
