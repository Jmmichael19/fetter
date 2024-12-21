<?php
    session_start();
    if (!isset($_SESSION["user"])) {
        header("Location: login.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetter | Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
        *{
    margin: 0;
    padding: 0;
    font-family: 'poppins';
}
body {
    background: white;
}
nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 5px 5%;
    position: sticky;
    top:0;
    z-index: 100;
}
.logo {
    width: 160px;
    margin-right: 45px;
}
.nav-left, .nav-right{
    display: flex;
    align-items: center;
}
.nav-left ul li {
    list-style: none;
    display: inline-block;
}
.nav-left ul li img {
    width: 28px;
    margin: 0 15px;
}

.nav-user-icon img {
    width: 40px;
    border-radius: 50%;
    cursor: pointer;
}
.nav-user-icon {
    margin-left: 30px;
}
.search-box {
    background: #efefef;
    width: 350px;
    border-radius: 20px;
    display: flex;
    align-items: center;
    padding: 0 15px;
}
.search-box img {
    width: 18px;
}
.search-box input {
    width: 100%;
    background: transparent;
    padding: 10px;
    outline: none;
    border: 0;
}
.online {
    position: relative;
}
.online::after{
    content: '';
    width: 7px;
    height: 7px;
    border: 2px solid #fff;
    border-radius: 50%;
    background: #41db51;
    position: absolute;
    top:0;
    right: 0;
}
.container-fluid {
    display: flex;
    justify-content: space-between;
    padding: 13px 2%;
}
.left-sidebar {
    flex-basis: 25%;
    position: sticky;
    top: 70px;
    align-items: flex-start;

}
.right-sidebar {
    flex-basis: 25%;
    position: sticky;
    top: 70px;
    align-items: flex-start;
    background: white;
    padding: 20px;

 

}
.main-content {
    flex-basis: 47%;
}
.imp-links a, .shortcut-links a{
    text-decoration: none;
    display: flex;
    align-items: center;
    margin-bottom: 30px;
    color: #626262;
    width: fit-content;
}
.imp-links a img {
    width: 25px;
    margin-right: 15px;
}
.imp-links a:last-child{
    color: #1876f2;
}
.imp-links{
    border-bottom: 1px solid #ccc;
}
.shortcut-links a img {
    width: 40px;
    border-radius: 4px;
    margin: 15px;
}
.sidebar-title{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 18px;
}
.sidebar-title p {
    font-weight: 600;
    font-size: 16px;
}
.sidebar-title a{
    text-decoration: none;
    color: #1876f2;
    font-size: 12px;
}
.sidebar-title a img {
    width: 40px;
    border-radius: 4px;
    margin: 15px;
}

.shortcut-links-two {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 18px;
}
.shortcut-links-two a{
    text-decoration: none;
    color: #1876f2;
    font-size: 12px;
}
.shortcut-links-two a p {
    width: 40px;
    border-radius: 4px;
    margin: 15px;
}
.shortcut-links-two a{
    text-decoration: none;
    color: #1876f2;
    font-size: 12px;
}
.user-profile {
    display: flex;
    align-items: center;
}
.user-profile img{
    width: 45px;
    border-radius: 50%;
    margin-right: 10px;
}
.user-profile p{
    margin-bottom: -5px;
    font-weight: 500;
    color: #626262;
}
.user-profile span{
    font-size: 13px;
    color: #9a9a9a;
}
.post-text {
    color: #9a9a9a;
    margin: 15px 0;
    font-size: 15px;
}
.post-text span {
    color: #626262;
    font-weight: 500;
}
.post-text a {
    color: #1876f2;
    text-decoration: none;
}
.post-container {
    width: 100%;
    background: #fff;
    border-radius: 6px;
    padding: 20px;
    color: #626262;
    margin: 20px 0;
}
.post-input-container {
    padding-top: 10px;
}
.gallery-image {
    position: relative;
    top: -20px;
    padding-left: 83%;
}

</style>
<body>

    <nav>
        <div class="nav-left">
            <h1 class="logo">Fetter</h1>
        </div>

        <div class="nav-right">
            <div class="search-box">
                <img src="search.png">
                <input type="text" placeholder="Search">
            </div>
            <div class="nav-user-icon online">
                <img src="profile.jpg">
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="left-sidebar">
            <div class="imp-links">
                <a href="#"><img src="home.png">Home</a>
                <a href="#"><img src="search.png">Search</a>
                <a href="#"><img src="explore.png">Explore</a>
                <a href="#"><img src="video.png">Reels</a>
                <a href="#"><img src="inbox.png">Messages</a>
                <a href="#"><img src="notif.png">Notifications</a>
                <a href="#"><img src="create.png">Create</a>
            </div>
            <div class="shortcut-links">
            <a href="#"><img src="profile.jpg">Profile</a>
            <a href="#"><img src="bar.png">More</a>
            <a href="logout.php" class="btn btn-warning">Logout</a>
            </div>
        </div>
        <div class="main-content">
            
        <div class="write-post-container">
            <div class="user-profile">
                <img src="profile.jpg">
            <div>
                <p>Beverly Salde</p>
                <small>Public<i class=""><img src="globe.png" style="width: 15px; height: 15px;"></i></small>
            </div>
            </div>
            <div class="post-input-container">
                <textarea rows="5" style="padding-right: 50%;"placeholder="What's on your mind ?"></textarea>
                <a href="" class="btn btn-primary" style="margin-bottom: 35%;">Post</a>
            </div>
            <a href="#"><img src="gallery.png" class="gallery-image"></a>



        </div>
        </div>

        <div class="right-sidebar">
            <div class="sidebar-title">
            <a href="#"><img src="profile.jpg">Profile</a>
                <a href="#">Switch</a>
            </div>
            <div class="shortcut-links-two">
                <p>Suggested For you</p>
                <a href="#">See All</a>
            </div>
            <div class="suggested">
                <a href="#"><img src="pugales.png" style="height: 40px; width: 55px; padding-left:10px;"></a>
                <p style="padding-left: 70px;">John Michael Pugales<a href="#" style="padding-left:98px;">Follow</a></p>
            </div>
        </div>
    </div>


    
</body>
</html>