<?php
session_start();

include_once 'User.php';
include_once 'UserRepository.php';
include_once 'databaseConnection.php';

$databaseConnection = new databaseConnection();
$connection = $databaseConnection->startConnection();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['loginbtn'])){
        if(empty($_POST['email']) || empty($_POST['password'])){
            echo "Please enter both email and password.";
        }else{
            $email = $_POST['email'];
            $password = $_POST['password'];
            $userRepository = new UserRepository($connection);
            $user = $userRepository->getUserByEmail($email);

            if($user && password_verify($password, $user['password'])){
                $_SESSION['email'] = $email;
                $_SESSION['login_time'] = time();
                $_SESSION['expire_time'] = $_SESSION['login_time'] + 7200;

                header("Location: wensite.php");
                exit();
            }else{
                echo "Incorrect Email or Password!";
            }
        }
    }elseif(isset($_POST['signupbtn'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];

        $userRepository = new UserRepository($connection);
        $numUsers = $userRepository->countUsers();

        if($numUsers == 0){
            $role = 'admin';
        }else{
            $role = 'user';
        }
        $user = new User($name, $surname, $username, $email, $password, $confirmpassword, $role);
        $userRepository->insertUser($user, $role);

        header("Location: ContactUs.php");
        exit();
    }
}
if(isset($_SESSION['expire_time']) && time() > $_SESSION['expire_time']){
    session_unset();
    session_destroy();

    header("Location: ContactUs.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Contact Us</title>
<style>
.container2{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    padding: 100px 50px;
    justify-content: space-around;
}
.container2 .card2{
    position: relative;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: flex-start;
    width: 320px;
    height: 280px;
    background: white;
    border-radius: 20px;
    box-shadow: 0 35px 80px rgba(0,0,0,0.15);
    transition: 0.5s;
}
.container2 .card2:hover{
    height: 260px;
}
.container2 .card2 .img2{
    position:absolute;
    width:280px;
    margin-top:20px;
    height: 220px;
    background: #333;
    border-radius: 12px;
    overflow: hidden;
    transition: 0.5s;
}
.container2 .card2:hover .img2{
    top:-90px;
    scale:0.85;
    box-shadow: 0 15px 45px rgba(0,0,0,0.2);
}
.container2 .card2 .img2 img{
    position: absolute;
    width:100%;
    height: 100%;
    object-fit: cover;
}
.container2 .card2 .content{
    position:absolute;
    top:250px;
    width:100%;
    height:30px;
    overflow: hidden;
    text-align: center;
    transition: 0.5s;
}
.container2 .card2:hover .content{
    top:150px;
    height: 220px;
}
.container2 .card2 .content h2{
    font-size: 1.2rem;
    font-weight: 700;
}
.container2 .card2 .content p{
    color:#333;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    overflow: hidden;
}
.forma {
    min-height: 100vh;
    width: 90%;
    margin-top: 180px;
    margin-left: 100px;
    display: flex;
}
.text2 {
    width: 70%;
    height: 60%;
    margin-top: 20%;
    background-color: white;
    border-radius: 6px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.2);
    padding: 50px;
}
.text2 h1 {
    color:black;
}
.text2 p{
    color: black;
    margin-top: 30px;
    font-size: 25px;
}
@media only screen and (max-width: 767px) {
    .container2 {
        padding: 50px 20px;
        justify-content: center;
        align-items: center;
        display: inline-block;
        flex-wrap: wrap;
    }
    .container2 .card2 {
        width: 90%;
        height: auto;
        margin-bottom: 20px;
    }
    .container2 .card2:hover {
        height: auto;
    }
    .container2 .card2 .img2 {
        width: 80%; 
        margin-top: 10px;
    }
    .container2 .card2:hover .img2 {
        top: 0;
        transform: scale(1);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }
    .container2 .card2 .content {
        top: auto;
        height: auto;
    }
    .container2 .card2:hover .content {
        top: auto;
        height: auto;
    }
    .container2 .card2 .content h2 {
        font-size: 1.1rem;
    }
    .container2 .card2 .content p {
        font-size: 16px;
    }
    .forma {
        flex-direction: column;
        margin-top: 80px;
        margin-left: 20px;
    }
    .text2 {
        width: 100%;
        height: auto;
        margin-top: 10%;
    }
    .text2 h1 {
        font-size: 24px; 
    }
    .text2 p {
        font-size: 18px;
        margin-top: 20px;
    }
}

</style>
    </head>
    <body>
        <div class="navbar2">
            <div class="homenav1">
                <ul >
                    <li><a class="n" href="wensite.php"><b>Main</b></a></li>
                    <li><a class="n" href="home.php"><b>Home</b></a></li>
                    <li><a class="n" href="Workspace.php"><b>Workspace</b></a></li>
                    <li><a class="n" href="AboutUs.php"><b>About Us</b></a></li>
                </ul>
            </div>
            <div class="homenav2">
                <div class="quote">
                    <p id="qp1"><b>Printing transforms ideas into reality<br>one page at a time.</b></p>
                </div>
            </div> 
        </div>
        <div class="box4">
            <div class="box5">
                <h1>C<span class="s" style="font-size: 40px;">ONNECT WITH OUR TEAM</span></h1><br><br>
                <h3>Connectivity is the key to success in today's world.</h3>
                <h3 style="text-indent:60px;">Contact us,and let's build something amazing together!</h3>
                <div class="social">
                    <a href="https://www.facebook.com/shtypshkronja.xprint/" target="_blank" class="fa fa-facebook"></a>
                    <a href="https://www.bing.com/search?q=shtypshkronja+xprint&qs=n&form=QBRE&sp
                    =-1&lq=0&pq=shtypshkronja+xprint&sc=11-20&sk=&cvid=13CFB182D8BF47A8A5C93D72B35ADF2F&ghsh=0&ghacc=0&ghpl="target="_blank" class="fa fa-google"></a>
                    <a href="https://youtu.be/kj50lq3nPlA?si=dzJnA__KCNXX-Il3"target="_blank" class="fa fa-youtube"></a>
                </div>
            </div>
        </div>
        <div class="icons">
            <div><img src="de1.png">
                <dd>AGREEMENT</dd>
            </div>
            <div><img src="sett.jfif">
                <dd>HELP</dd>
            </div>
            <div><img src="privacy.jfif">
            <dd>PRIVACY</dd>
            </div>
            <div><img src="bell.png">
            <dd>AVAILABILITY</dd>
            </div>
        </div>
<div class="forma">
<div class="register">
    <div class="form">
            <input type="checkbox" id="check">
            <div class="login">
                <header>LOG IN</header>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" onsubmit="return validationForm1();">
                  <input type="email" name="email" placeholder="Enter your Email" id="email1" required="">
                  <input type="password" name="password" placeholder="Enter your Password" id="password1" required="">
                  <a  href="#">Forgot password</a>
                  <button class="btn" name="loginbtn" onclick="validationForm1">LOG IN</button>
                </form>
            <div class="signup">
                <span class="signup">Don't have an account?
                    <label for="check">SignUp</label>
                </span>
            </div> 
        </div>
        <div class="registerform">
    <header>SIGN UP</header>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="name" placeholder="Name" id="name" required="">
        <input type="text" name="surname" placeholder="Surname" id="surname" required="">
        <input type="text" name="username" placeholder="Username" id="username" required="">
        <input type="email" name="email" placeholder="Enter your Email" id="email" required="">
        <input type="password" name="password" placeholder="Create a Password" id="password" required="">
        <input type="password" name="confirmpassword" placeholder="Confirm your Password" id="confirmpassword" required="">
        <button type="submit" class="btn" name="signupbtn" onclick="return validationForm()">SIGN UP</button>
    </form>
    <div class="signup">
        <span class="signup">Already have an account?
            <label for="check">LogIn</label>
        </span>
    </div>
</div>
</div>
</div>
<div class="text2">
    <h2>Unlock a World of Possibilities!</h2>
    <p>Signing up for our page opens the door to a host of exciting opportunities and benefits. 
        Join a vibrant community of like-minded individuals who share your interests and passions</p>

</div>
</div>
<div class="container2">
    <div class="card2" style="color:#009668;">
        <div class="img2"><img src="phoen.jpg"></div>
        <div class="content">
            <h2>Call Us</h2>
            <p><b>044/45-000-000</b></p>
        </div>
    </div>
    <div class="card2" style="color:#ff3e7f;">
        <div class="img2"><img src="map.jpg"></div>
        <div class="content">
            <h2>Our Location</h2>
            <p><b>Prishtine</b></p>
            <p><b>Kosove</b></p>
        </div>
    </div>
    <div class="card2" style="color: #03a9f4;">
        <div class="img2"><img src="email-lettmail.jpg"></div>
        <div class="content">
            <h2>Email Us</h2>
            <p><b>xprint.pr@gmail.com</b></p></div>
    </div>
</div>
<footer class="footer1">
    <p>128 Prishtine, Kosove | Phone:044/45-000-000 | Email:xprint.pr@gmail.com</p>
    <p>&copy; 2023 X-print. All rights reserved.</p>
  </footer>
</body>
<script>
    function validationForm(){
        let name = document.getElementById('name').value;
        let surname = document.getElementById('surname').value;
        let username = document.getElementById('username').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let confirmPassword = document.getElementById('confirmpassword').value;

        let nameRegex =/^[A-Za-z]+$/;
        if(!nameRegex.test(name)){
            alert('Please fill a valid name');
            return false;
        }
        let surnameRegex =/^[A-Za-z]+$/;
        if(!surnameRegex.test(surname)){
            alert('Please fill a valid surname');
            return false;
        }
        let usernameRegex =/^[a-zA-Z0-9_]{8,15}$/;
        if(!usernameRegex.test(username)){
            alert('Please fill a valid username');
            return false;
        }
        let emailRegex =/^[a-zA-Z._-]+@[a-zA-Z]+\.[a-z]{2,3}$/;
        if(!emailRegex.test(email)){
            alert('Please fill a valid email');
            return false;
        }
        let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if(!passwordRegex.test(password)){
            alert('Please fill a valid password');
            return false;
        }
        if(password !== confirmPassword){
            alert('Passwords do not match');
            return false;
        }
        alert('Successfully Sign Up');
        return true;
    }
    function validationForm1(){
    let email1=document.getElementById('email1').value;
    let password1=document.getElementById('password1').value;

    let email1Regex=/^[a-zA-Z._-]+@[a-zA-Z]+\.[a-z]{2,3}$/;
        if(!email1Regex.test(email1)){
            alert('Please fill a valid email');
            return false;
        }
    let password1Regex =/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if(!password1Regex.test(password1)){
            alert('Please fill a valid password');
            return false;
        }
    return true;
}
</script>
    </body>
</html>
