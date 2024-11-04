<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo SITENAME." - ".$title?></title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $this->asset('css/resetcss.css');?>">
    <link rel="stylesheet" href="<?php echo $this->asset("css/$style.css"); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    
</head>
<body>
    <div class="nav_wrap">
        <div class="grid-container">
            <div class="header">
                <a href="<?php echo URLROOT; ?>" class="logo">
                    <img src="<?php echo LOGOSITE;?>" alt="logo">
                </a>
                
                <ul class="nav_ul">
                    <li><a href="/">Home</a></li>
                    <li><a href="/">Chủ đề</a></li>
                    <li><a href="/">Thể loại</a></li>
                    <li><a href="/">Tác giả</a></li>
                </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-3" type="search" placeholder="Bạn tìm kiếm ở đây nha..." aria-label="Tìm kiếm">
                    <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
                </form> -->
                <!-- <div class="search-box">
                    <button class="btn-search"><i class="fas fa-search"></i></button>
                    <input type="text" class="input-search" placeholder="Type to Search...">
                </div> -->
                <!-- <div class="search-form">
                    <button><i class="fas fa-search"></i></button>
                </div> -->
                <ul class="user">
                    <img id="user_img" class="user_img" src="./assets/logo/Screenshot 2024-10-02 at 09.37.04.png" alt="logo">
                    <ul id="user_content" class="user-content">
                        <li class="user_logout"><a href="./login.php">Đăng nhập</a></li>
                        <li class="your_rv"><a href="./yourrv.php">Bài viết của bạn</a></li>
                        <li class="your_cmt"><a href="./yourcmt.php">Bình luận của bạn</a></li>
                        <li class="user_logout"><a href="./signup.php">Đăng xuất</a></li>
                    </ul>

                </ul>
            </div>
            
        </div>
    </div>