<?php
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>About Us</title>
        <style>
.allpage2{
    width:100%;
    height: 100vh;
}           
.outer-div{
    width: 90%;
    margin-top: 110px;
    height:300px;
    margin-bottom:120px;
}
.inner-div{
    display: flex;
    height: 300px;
}
.inner-div img {
    width: 100%;
    max-width: 100%;
    height: auto;
}
.aboutus {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
}
.abpg {
    width: 47%;
    font-family: Garamond, serif;
    text-align: left;
    margin-left: 50px;
}
.abpg h3{
    font-size: 26px;
    margin-bottom: 15px;
    margin-left: 50px;
}
.abphoto {
    width: 30%;
     margin-right: 100px;
}
.abphoto img {
    width: 100%;
    height: auto;
    display: block;
    margin: 0 auto;
}
@media only screen and (max-width: 767px) {
    .allpage2 {
        height: auto;
    }
    .outer-div {
        width: 100%;
        margin-top: 50px;
        margin-bottom: 80px;
        height: auto;
    }
    .inner-div {
        flex-direction: column;
        height: auto;
    }
    .inner-div img {
        width: 100%;
        height: auto;
        max-width: 100%;
    }
    .aboutus {
        flex-direction: column;
        margin-top: 20px;
    }
    .abpg, .abphoto {
        width: 100%;
        margin-left: 0;
        margin-right: 0;
    }
    .abpg h3 {
        font-size: 22px;
        margin-bottom: 10px;
        margin-left: 0;
    }
    .abphoto {
        margin-right: 0;
    }
    .abphoto img {
        width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
    }
}
        </style>
    </head>
<body>
    <div class="allpage2">
        <div class="navbar2">
            <div class="homenav1">
                <ul >
                    <li><a class="n" href="wensite.php"><b>Main</b></a></li>
                    <li><a class="n" href="home.php"><b>Home</b></a></li>
                    <li><a class="n" href="Workspace.php"><b>Workspace</b></a></li>
                    <li><a class="n" href="ContactUs.php"><b>Contact Us</b></a></li>
                </ul>
            </div>
            <div class="homenav2">
                <div class="quote">
                    <p id="qp1"><b>Where ideas meet paper, a printing house breathes life into imagination.</b></p>
                </div>
            </div> 
        </div>
        <div class="outer-div">
            <div class="inner-div">
                <img src="sp3.jpg" alt="img">
            </div>
        </div>
        <div class="pdiv">
            <p class="pabout"><b><i>More About Our Company!</i></b></p>
        </div>
        <div class="aboutus">
            <div class="abpg">
                <h1 class="textabout"><b>WHO ARE WE?</b></h1>
                <h3>In 1989, Ilaz Kuleta founded Rominor (known now as X-print), a design & print company. Focused on
                    delivering quality products and delivering more than expected</h3>
                <h3>Today, only run by Ilir Kuleta, X-print is the house of creative ideas, which, when combined with
                    strategies and experiences, deliver results that make the difference.</h3>
                <h1 class="textabout"><b>WHAT WE DO?</b></h1>
                <h3>Working from a strategic-creative approach, we deliver results that meet our clients’
                    expectations.</h3>
                <h3>We design and print posters, leaflets, brochures, magazines, books, catalogues, invitations,
                    paper bags, notes, etc.</h3>
                <h1 class="textabout"><b>WHAT OUR CLIENTS SAY ABOUT US?</b></h1>
                <blockquote class="reviews">
                    <p>"X-print staff are to be recommended for the regular and appropriate communication with clients
                        keeping the interested party very well informed at each phase of the service they provide."
                    </p>
                </blockquote>
            </div>
            <div class="abphoto">
                <img src="OIP (5).jpg" alt="photo">
            </div>
        </div>
        <footer class="footer1">
            <p>128 Prishtine, Kosove | Phone:044/45-000-000 | Email:xprint.pr@gmail.com</p>
            <p>&copy; 2023 X-print. All rights reserved.</p>
          </footer>
    </div>
</body>
</html>