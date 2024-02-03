<?php
include('databaseConnection.php');

$databaseConnection = new databaseConnection();
$conn = $databaseConnection->startConnection();

if ($conn) {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->rowCount() > 0) {
        $products = $result->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $products = [];
    }
} else {
    $products = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
.allpage1{
    width:100%;
    height: 100vh;
}
.quote p{
  font-size: 50px;
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}
.flexbox{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    margin-top:50px;
}
.container{
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    align-items: center;
}
.row{
    display: flex;
    justify-content: space-around;
    margin-bottom: 40px;
}
.card{
    width: 350px;
    text-align: left;
    border-radius: 6px;
    box-shadow: 0 5px 9px rgba(0, 0, 0, 0.1);
    padding: 16px;
    margin: 30px;
    flex-wrap: wrap;
}
img{
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 4px;
    margin-bottom: 8px;
}
.card p{
    font-size: 18px;
    margin-top: 8px;
    font-weight:500;
}
.row1{
    display:flex;
    justify-content: space-around;
    margin-bottom: 40px;
}
.card1{
    width:570px;
    text-align: left;
    border-radius: 6px;
    box-shadow: 0 5px 9px rgba(0, 0, 0, 0.1);
    padding:16px;
    margin:30px;
    flex-wrap: wrap;
}
.card1 img{
    height:230px;
    width:100%;
    object-fit: cover;
}
.card1 p{
    font-size: 18px;
}
.container1 {
    display: flex;
    justify-content: space-around;
    margin: 20px 10px;
    background-color: #ccc; 
    padding: 23px;
}
  
.photomachine {
    width: 35%;
    height: 340px;
    box-shadow: 0 5px 9px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    background-color: white;
    border-radius: 5px;
    margin: 20px;
}
.photomachine img {
    width: 100%;
    height: 340px;
    object-fit: cover;
    border-radius: 4px;
}
.prhouse {
    width: 60%;
    padding: 20px;
    background-color: white;
    border-radius: 6px;
    margin: 30px;
}
.prhouse p{
    margin-top: 20px;
    font-size: 20px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}
#hr1{
    margin:13px 0px;
    color: black;
}
#a1{
    color: black;
    font-size: 18px;
    border:2px solid black;
    padding: 6px;
}
#a1:hover{
    text-transform: uppercase;
}
.slideshow{
    display: flex;
    flex-direction: row;
    height: 82vh;
    width: 100%;

}
.slidediv{
    text-align: center;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    width: 65%;
    margin: 40px 0 30px 125px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
header{
    margin-bottom: 30px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    color: black;
    font-weight: 500;
    font-size: 20px;
    text-transform: uppercase;
    text-align: left;
}
#slideshow{
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 12px 18px rgba(0, 0, 0, 0.2);
}
.btnslide{
    display: flex;
    width:35%;
    align-items: flex-end;
    margin-left: 10px;
}
.btnslide button {
    padding: 10px 20px;
    margin-bottom: 26px;
    font-size: 40px;
    font-weight: 700;
    color: #484872;
    border: none;
}
.btnslide button:hover {
    color: black;
}
@media only screen and (max-width: 767px) {
    .allpage1 {
        height: auto;
    }
    .quote p {
        font-size: 30px;
    }
    .flexbox {
        margin-top: 20px;
    }
    .row {
        flex-direction: column; 
        align-items: center;
        margin-bottom: 20px;
    }
    .card {
        width: 100%;
        margin: 15px;
        padding: 10px;
    }
    img {
        height: 150px;
    }
    .card p {
        font-size: 16px;
    }
    .row1 {
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px;
    }
    .card1 {
        width: 100%;
        margin: 15px;
        padding: 10px;
    }
    .card1 img {
        height: 150px;
    }
    .card1 p {
        font-size: 16px;
    }
    .container1 {
        flex-direction: column;
        align-items: center;
        margin: 10px;
        padding: 15px;
    }
    .photomachine {
        width: 100%;
        height: auto;
        margin: 10px;
    }
    .photomachine img {
        height: auto;
    }
    .prhouse {
        width: 100%; 
        margin: 15px;
        padding: 10px;
    }
    .prhouse p {
        font-size: 16px;
    }
    #hr1 {
        margin: 10px 0;
    }

    #a1 {
        font-size: 14px;
        padding: 5px;
    }
    .slideshow {
        flex-direction: column;
        height: auto;
    }
    .slidediv {
        width: 100%;
        margin: 15px 0;
    }
    header {
        font-size: 18px;
        margin-bottom: 20px;
    }
    #slideshow {
        height: auto;
    }
    .btnslide {
        width: 100%;
        align-items: center;
        margin-left: 0;
    }
    .btnslide button {
        padding: 8px 16px;
        font-size: 30px;
        margin-bottom: 20px;
    }
}
    </style>
</head>
<body>
    <div class="allpage1">
        <div class="navbar2">
            <div class="homenav1">
                <ul>
                    <li><a class="n" href="website.html"><b>Main</b></a></li>
                    <li><a class="n" href="AboutUs.php"><b>About Us</b></a></li>
                    <li><a class="n" href="Workspace.php"><b>Workspace</b></a></li>
                    <li><a class="n" href="ContactUs.php"><b>Contact Us</b></a></li>
                </ul>
            </div>
            <div class="homenav2">
                <div class="quote">
                    <p><b>Creativity is just connecting things!</b></p>
                </div>
            </div>
        </div>
        <div class="flexbox">
    <div class="container">
        <?php
        $counter = 0;
        foreach ($products as $product) {
            if ($counter % 3 === 0) {
                echo '<div class="row">';
            }
            ?>
            <div class="card">
                <img src="<?php echo $product['image_url']; ?>" alt="Card">
                <h2><b><?php echo $product['product_name']; ?></b></h2>
                <p><?php echo $product['description']; ?></p>
            </div>
            <?php
            if ($counter % 3 === 2 || $counter === count($products) - 1) {
                echo '</div>';
            }
            $counter++;
        }
        ?>
    </div>
</div>
        <div class="container1">
            <div class="photomachine">
                <img src="pp.jpg" height="300px" alt="Card">
            </div>
            <div class="prhouse">
                <h5 style="font-size: 45px;font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"><b><i>Printing House X-Print</i></b></h5>
                <p>
                    The X-print printing house offers quality, correctness, speed!
                    <b>DESIGN AND PRESS</b> of posters, leaflets, brochures, magazines, books, catalogues, invitations, paper bags, notes, etc.
                    <br><hr id="hr1">
                </p>
                <p><b>XPrint</b> is continuing its successful season of preparing calendars, notes, pencils, hours, and other bespoke products.
                    We thank all our associates so far and invite other companies for co-operation!
                    We welcome you!
                </p>
                <hr id="hr1">
                <a id="a1" href="https://www.facebook.com/shtypshkronja.xprint/photos" role="button" target="_blank">More About Our Work</a>
            </div>
        </div>
        <div class="slideshow">
            <div class="slidediv">
                <header>
                    <h2>Take a glimpse into our operational surroundings.</h2>
                </header>
                <img id="slideshow">
            </div>
            <div class="btnslide">
                <button type="button" onclick="changeImg()">>>></button>
            </div>
        </div>
        <footer class="footer1">
            <p>128 Prishtine, Kosove | Phone:044/45-000-000 | Email:xprint.pr@gmail.com</p>
            <p>&copy; 2023 X-print. All rights reserved.</p>
        </footer>
        <script>
            let i = 0;
            let imgArray = ['pr2.jpg', 'm3.jpg', 'worker1.webp', 'd2.webp', 'machine3.jpg', 'destore.jpg', 'worker2.jpg', 'tools1.jpg', 'm1.jpg'];
            let slideshow = document.getElementById('slideshow');

            function changeImg() {
                slideshow.src = imgArray[i];
                if (i < imgArray.length - 1) {
                    i++;
                } else {
                    i = 0;
                }
            }

            function autoChange() {
                setInterval(() => {
                    changeImg();
                }, 4000);
            }
            autoChange();
        </script>
    </div>
</body>
</html>