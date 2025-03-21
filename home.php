<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="/img/fav.png" type="image/x-icon" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="swiper-bundle.min.css" />
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>
    <script defer src="https://pyscript.net/latest/pyscript.js"></script>

    <title>
        CyberGamez🎮
    </title>
</head>

<body>
    <style>
        h2,h3{
            color: #efefef;
        }
    </style>
    <!-- Custom Scrollbar -->
    <div class="progress">
        <div class="progress-bar" id="scroll-bar"></div>
    </div>
    <!-- Header Section -->
    <?php
        include 'config.php';
        session_start();
        $user_id = $_SESSION['user_id'];

        if(!isset($user_id)){
          header('location:login.php');
        };

        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
             if(mysqli_num_rows($select) > 0){
               $fetch = mysqli_fetch_assoc($select);
             }
    ?>

    <header>
        <div class="nav container">
            <a href="home.php" class="logo">
          🎮Cyber
          <span>Gamez</span>
        </a>
            <div class="nav-icons">
                <h2>
                    Welcome back <?php echo $fetch["name"];?>
                </h2>
                <a href="home.php"> <i class="bx bx-home " id="home-icon"><span></span></i> </a>
                <i class="bx bx-bell bx-tada" id="bell-icon"><span></span></i>
                <a href="download.html"><i class="bx bxs-download" id="download-icon"></i
          ></a>
                <a href="update_profile.php"><i class="bx bxs-profile bx-user" id="profile-icon"></i
          ></a>
                <div class="menu-icon">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </div>
            <!-- Menu -->
            <div class="menu">
                <img src="img/menu.png" alt="Menu Image" />
                <div class="navbar">
                    <li><a href="home.php">Home</a></li>
                    <li>
                        <a href="#trending-section" id="trending-section">Trending</a>
                    </li>
                    <li>
                        <a href="#latest-section" id="new-section">Latest</a>
                    </li>
                    <li><a href="#categories">Categories</a></li>
                    <li>
                        <a href="#action-games" id="new-section">Action Games</a>
                    </li>
                    <li><a href="#contact_us">Contact Us</a></li>
                </div>
            </div>
            <!-- Notification -->
            <div class="notification">
                <div class="notification-box">
                    <span>✔️</span>
                    <p>Congratulations! Your Game has been Downloaded</p>
                </div>
                <div class="notification-box box-color">
                    <span>❌</span>
                    <p>Could not Download your Game Plz Retry Again!</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Home Section -->
    <section class="home container" id="home">
        <img src="img/home.png" alt="gaming" />
        <div class="home-text">
            <h1>CITY OF THE <br />FUTURE</h1>
            <a href="home.php" class="btn">Available Now!</a>
        </div>
    </section>

    <!-- Trending Section -->
    <section class="trending container" id="trending-section">
        <div class="heading">
            <h2>🔥 Trending Games</h2>
        </div>
        <!-- Trending Content -->
        <div class="trending-content swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide">
                    <div class="box">
                        <a href="rock_paper_scissor/index.html"><img src="img/rock_paper.jpeg" alt="" />
                        <div class="box-text">
                            <h2>Rock Paper Scissor</h2>
                            <h3>Casual</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class="bx bxs-star"></i>
                                    <span>4.7</span>
                                </div>
                                <a href="imgindex.html" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
                  ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="swiper-slide">
                    <div class="box">
                    <a href="car-game\index.html"><img src="img/car.png" alt="">
                        <div class="box-text">
                            <h2>Car Racing</h2>
                            <h3>Racing</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class="bx bxs-star"></i>
                                    <span>4.7</span>
                                </div>
                                <a href="car-game\index.html" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
                  ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 3 -->
                <div class="swiper-slide">
                    <div class="box">
                    <a href="tic_tac_toe/index.html" > <img src="img/tic_tac_toe.jpg" alt="">
                        <div class="box-text">
                            <h2>Tic Tac Toe</h2>
                            <h3>Fun</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class="bx bxs-star"></i>
                                    <span>4.7</span>
                                </div>
                                <a href="tic_tac_toe/index.html" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
                  ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 4 -->
                <div class="swiper-slide">
                    <div class="box">
                    <a href="clumsy bird/index.html"><img src="img/clumsy.png" alt="">
                        <div class="box-text">
                            <h2>Clumsy Bird</h2>
                            <h3>Casual</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class="bx bxs-star"></i>
                                    <span>4.7</span>
                                </div>
                                <a href="clumsy bird/index.html" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
                  ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 5 -->
                <div class="swiper-slide">
                    <div class="box">
                    <a href="car/v4.final.html"><img src="car-game\images\car-game-image.jpeg" alt="">
                        <div class="box-text">
                            <h2>HexGL-Master</h2>
                            <h3>Action, Crime, Mission</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class="bx bxs-star"></i>
                                    <span>4.7</span>
                                </div>
                                <a href="car/v4.final.html" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
                  ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 6 -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="img/trending6.jpg" alt="">
                        <div class="box-text">
                            <h2>Dying Light 2</h2>
                            <h3>Action</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class="bx bxs-star"></i>
                                    <span>4.7</span>
                                </div>
                                <a href="/" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
                  ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 7 -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="img/trending7.png" alt="">
                        <div class="box-text">
                            <h2>HALO infinite</h2>
                            <h3>Action</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class="bx bxs-star"></i>
                                    <span>4.7</span>
                                </div>
                                <a href="/" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
                  ></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 8 -->
                <div class="swiper-slide">
                    <div class="box">
                        <img src="img/trending8.png" alt="" />
                        <div class="box-text">
                            <h2>Resident Evil Village</h2>
                            <h3>Action, Crime</h3>
                            <div class="rating-download">
                                <div class="rating">
                                    <i class="bx bxs-star"></i>
                                    <span>4.7</span>
                                </div>
                                <a href="/" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
                  ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Section -->
    <section class="new container" id="new-section">
        <div class="heading">
            <h2>
                <?xml version="1.0" ?>
                <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.0//EN' 'http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd'>
                <svg enable-background="new 0 0 30.785 32.009" height="32.009" overflow="visible" viewBox="0 0 30.785 32.009" width="30.785" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="pacman-icon">
            <g>
              <g id="Pacman_1_">
                <g id="Pacman">
                  <path
                    d="M30.785,22.127l-14.781-6.123l14.781-6.123        C27.404,1.717,18.045-2.16,9.881,1.222C1.717,4.604-2.159,13.963,1.222,22.127c3.381,8.164,12.74,12.041,20.905,8.659        C26.209,29.096,29.219,25.91,30.785,22.127z"
                    fill="#FED049"
                    id="Body"
                  />
                  <circle
                    cx="16.004"
                    cy="7.004"
                    fill="#F39C12"
                    id="Eye"
                    r="2"
                  />
                </g>
              </g>
            </g>
          </svg> New Games
            </h2>
        </div>
        <!-- New Content -->
        <div class="new-content">
            <!-- New 1 -->
            <div class="box">
                <img src="img/new1.jpg" alt="" />
                <div class="box-text">
                    <h2>Subway Surfers</h2>
                    <h3>Action, Mobile</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class="bx bxs-star"></i>
                            <span>4.7</span>
                        </div>
                        <a href="download.html" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
              ></a>
                    </div>
                </div>
            </div>
            <!-- New 2 -->
            <div class="box">
                <img src="img/new2.jpg" alt="" />
                <div class="box-text">
                    <h2>Call of Duty</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class="bx bxs-star"></i>
                            <span>4.7</span>
                        </div>
                        <a href="/" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
              ></a>
                    </div>
                </div>
            </div>
            <!-- New 3 -->
            <div class="box">
                <img src="img/new3.jpg" alt="" />
                <div class="box-text">
                    <h2>Free Guy</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class="bx bxs-star"></i>
                            <span>4.7</span>
                        </div>
                        <a href="jet/index.html" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
              ></a>
                    </div>
                </div>
            </div>
            <!-- New 4-->
            <div class="box">
                <img src="img/new4.jpg" alt="" />
                <div class="box-text">
                    <h2>Clash Royale</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class="bx bxs-star"></i>
                            <span>4.7</span>
                        </div>
                        <a href="/" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
              ></a>
                    </div>
                </div>
            </div>
            <!-- New 5 -->
            <div class="box">
                <img src="img/new5.png" alt="" />
                <div class="box-text">
                    <h2>Minecraft</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class="bx bxs-star"></i>
                            <span>4.7</span>
                        </div>
                        <a href="/" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
              ></a>
                    </div>
                </div>
            </div>
            <!-- New 6 -->
            <div class="box">
                <img src="img/new6.png" alt="" />
                <div class="box-text">
                    <h2>PUBG</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class="bx bxs-star"></i>
                            <span>4.7</span>
                        </div>
                        <a href="/" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
              ></a>
                    </div>
                </div>
            </div>
            <!-- New 7 -->
            <div class="box">
                <img src="img/new7.png" alt="">
                <div class="box-text">
                    <h2>Fortnite</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class="bx bxs-star"></i>
                            <span>4.7</span>
                        </div>
                        <a href="/" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
              ></a>
                    </div>
                </div>
            </div>
            <!-- New 8 -->
            <div class="box">
                <img src="img/new8.jpg" alt="" />
                <div class="box-text">
                    <h2>Marvel of Champions</h2>
                    <h3>Action</h3>
                    <div class="rating-download">
                        <div class="rating">
                            <i class="bx bxs-star"></i>
                            <span>4.7</span>
                        </div>
                        <a href="/" class="box-btn"><i class="bx bx-down-arrow-alt bx-tada"></i
              ></a>
                    </div>
                </div>
            </div>
            <div class="up-page">
                <a href="home.php"><i class="bx bxs-chevrons-up bx-fade-up"></i></a>
            </div>
        </div>
    </section>
    <!-- Footer Section -->
    <div class="copyright container">
        <a href="home.php" class="logo2">
        🎮Cyber
        <span>Gamez</span>
      </a>
        <p>
            &#169;
            <a class="link" href="https://github.com">CrestaCore ARPA</a> All Rights Reserved
        </p>
    </div>

    <script src="swiper-bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>