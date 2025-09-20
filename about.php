<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php @include 'header.php'; ?>

<section class="heading">
    <h3>About us</h3>
    <p> <a href="home.php">Home</a> / About </p>
</section>

<section class="about">

    <div class="flex">

        <div class="image">
            <img src="images/abt2.jpg" alt="">
        </div>

        <div class="content">
            <h3>Why choose us?</h3>
            <p>Because we focus on results. For us it's all about what adds value for you and your business .About all, we want our words to work for you.</p>
            <a href="shop.php" class="btn">shop now</a>
        </div>

    </div>

    <div class="flex">

        <div class="content">
            <h3>What we provide?</h3>
            <p>Our website involves offering a variety of products and services to cater to plant enthusiasts and gardening hobbyists.We provide you the wide range of indoor plants,detailed product descriptions,and community engagement. </p>
            <a href="contact.php" class="btn">contact us</a>
        </div>

        <div class="image">
            <img src="images/about1.jpg" alt="">
        </div>

    </div>

    <div class="flex">

        <div class="image">
            <img src="images/about3.png" alt="">
        </div>

        <div class="content">
            <h3>Who we are?</h3>
            <p>We are GREEEN GROOVE GREEN website who makes your interest in plant as the best gardener</p>
            <a href="#reviews" class="btn">clients reviews</a>
        </div>

    </div>

</section>

<section class="reviews" id="reviews">

    <h1 class="title">Client's reviews</h1>

    <div class="box-container">

        <div class="box">
            <img src="images/per1.jpg" alt="">
            <p>Had a great experience trusting this web site!The plants are well-categorized with detailed descriptions, making it easy to find exactly what you're looking for.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Shanta Magar</h3>
        </div>

        <div class="box">
            <img src="images/per2.jpg" alt="">
            <p>Plants I bought from here are of good quality and also they provided me more detailed informations of the plants. Also the plants here are more affordable compared to others.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Swastika Karki</h3>
        </div>

        <div class="box">
            <img src="images/per3.jpg" alt="">
            <p>Purchasing goods from here are worth it! Packaging is secure and ensures plants arrive in good condition, although there is room for improvement in reducing plastic use. </p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Jenish Pandey</h3>
        </div>

        <div class="box">
            <img src="images/per4.jpg" alt="">
            <p>This website offers an impressive array of plants, catering to both indoor and outdoor gardening enthusiasts. From succulents to towering palms, they have something for every taste and gardening skill level. </p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Misika Pradhan</h3>
        </div>

        <div class="box">
            <img src="images/per5.jpg" alt="">
            <p> Customer service is responsive and helpful. They promptly address queries and concerns, and their return/exchange process is straightforward.The website is accessible across devices, catering to a wide audience.  </p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>Anish Gurung</h3>
        </div>

        <div class="box">
            <img src="images/per6.jpg" alt="">
            <p> GreenGrooveGoods boasts a clean and intuitive design, making it easy to navigate even for first-time users. The layout is well-organized, with categories clearly labeled and search functionality that works efficiently.</p>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h3>Manish Chaudhary</h3>
        </div>

    </div>

</section>











<?php @include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>