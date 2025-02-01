<?php
// Include database connection
include 'components/connect.php'; // Adjust the path if necessary

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="Home.css" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
     <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
   
    </style>
  </head>
  <body>
    <!-- Header -->
    <header class="main-header">
      <div class="logo">
        <img src="img/Logo.png" alt="University Logo" />
      </div>
      <nav class="navbar">
        <ul>
          <li><a href="#home" class="active">Home</a></li>
          <li><a href="Department.php">Departments</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>  
          <li><a href="Event.php">Event</a></li>
        </ul>
      </nav>
  
      
        <?php include 'components/user_header.php'; ?>
       
    </header>
    <div class="carousel">
      <div class="list">
        <div class="item" style="background-image: url(img/bg.png)">
          <div class="content">
            <div class="title">Discover research with</div>
            <div class="name">research Platform</div>
            <div class="des">Expanding Knowledge, Inspiring Innovation</div>
            <div class="btn">
              <button>See more</button>
              <button>Get start</button>
            </div>
          </div>
        </div>
        <div class="item" style="background-image: url(img/info.jpg)">
          <div class="content">
            <div class="title">Discover research with</div>
            <div class="name">research Platform</div>
            <div class="des">Expanding Knowledge, Inspiring Innovation</div>
            <div class="btn">
              <button>See more</button>
              <button>Get start</button>
            </div>
          </div>
        </div>
        <div class="item" style="background-image: url(img/computing.jpg)">
          <div class="content">
            <div class="title">Discover research with</div>
            <div class="name">research Platform</div>
            <div class="des">Expanding Knowledge, Inspiring Innovation</div>
            <div class="btn">
              <button>See more</button>
              <button>Get start</button>
            </div>
          </div>
        </div>
        <div class="item" style="background-image: url(img/N1.jpg)">
          <div class="content">
            <div class="title">Discover research with</div>
            <div class="name">research <span>Platform</span></div>
            <div class="des">Expanding Knowledge, Inspiring Innovation</div>
            <div class="btn">
              <button>See more</button>
              <button>Get start</button>
            </div>
          </div>
        </div>
        <div
          class="item"
          style="background-image: url(img/stream-5680609_1920.jpg)"
        >
          <div class="content">
            <div class="title">Discover research with</div>
            <div class="name">research Platform</div>
            <div class="des">Expanding Knowledge, Inspiring Innovation</div>
            <div class="btn">
              <button>See more</button>
              <button>Get start</button>
            </div>
          </div>
        </div>
        <div
          class="item"
          style="background-image: url(img/fall-4667080_1920.jpg)"
        >
          <div class="content">
            <div class="title">Discover research with</div>
            <div class="name">research <span>Platform</span></div>
            <div class="des">Expanding Knowledge, Inspiring Innovation</div>
            <div class="btn">
              <button>See more</button>
              <button>Get start</button>
            </div>
          </div>
        </div>
        <div class="item" style="background-image: url(img/Tourism.jpg)">
          <div class="content">
            <div class="title">Discover research with</div>
            <div class="name">research <span>Platform</span></div>
            <div class="des">Expanding Knowledge, Inspiring Innovation</div>
            <div class="btn">
              <button>See more</button>
              <button>Get start</button>
            </div>
          </div>
        </div>
      </div>
      <div class="arrow">
        <button class="prev"><</button>
        <button class="next">></button>
      </div>
      <div class="timeRunning"></div>
    </div>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(180deg, #130627 40%, #000000 80%);
        color: #ffffff;
      }
      .section-container {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        padding: 50px;
        background: linear-gradient(280deg, #130627 40%, #000000 80%);
        min-height: 100vh;
        opacity: 0;
        transition: opacity 0.8 ease, transfrom 0.8 ease;
      }
      .section-container:hover {
        animation: animate 1s ease-in-out 0.6s 1 forwards;
      }

      .section-container.visible {
        opacity: 1;
        transform: translateY(0);
      }
      .text-content {
        max-width: 50%;
      }
      .text-content h1 {
        margin-top: -160px;
        font-size: 76px;
        color: #ffffff; /* Purple accent color */
        margin-bottom: 5px;
        animation: animate 1s ease-in-out 0.3s 1 forwards;
      }
      .text-content span {
        color: blue;
      }
      .text-content h2 {
        font-size: 34px;
        margin-bottom: 8px;
        animation: animate 1s ease-in-out 0.6s 1 forwards;
      }
      .text-content p {
        line-height: 1.9;
        font-size: 1.6rem;
        animation: animate 1s ease-in-out 0.9s 1 forwards;
        margin-top: 60px;
      }
      .image-container img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        margin-top: -50px;
        animation: animate 1s ease-in-out 0.9s 1 forwards;
      }
      @keyframes animate {
        from {
          opacity: 0;
          transform: translate(0, 100px);
          filter: blur(33px);
        }
        to {
          opacity: 3;
          transform: translate(0);
          filter: blur(0);
        }
      }
    </style>
    <div class="section-container">
      <div class="text-content">
        <h1>Research <span> Platform </span></h1>
        <h2>Expanding Knowledge, Inspiring Innovation</h2>
        <p>
          The Research Platform is dedicated to expanding the boundaries of
          knowledge by providing an accessible repository of scholarly work.
          Designed to foster collaboration and inspire innovation, our platform
          supports researchers, students, and faculty members in their pursuit
          of academic excellence. Discover cutting-edge research, share
          insights, and contribute to a growing community of knowledge.
        </p>
      </div>
      <div class="image-container">
        <img src="img/s1.png" alt="Research Platform" width="450PX" />
      </div>
    </div>

    <div class="section1-container">
      <div class="heading">
        <h1>Unlock Your Design Potential</h1>
      </div>
      <div class="heading-2">
        <p>Discover how our system can elevate your design research process</p>
      </div>
      <div class="imgsection">
        <img src="img/lab.jpg" alt="lab" width="650px" />
      </div>
      <div class="features">
        <div class="feature">
          <h3>Collaborative Workspace</h3>
          <p>
            Work seamlessly with your team, sharing insights and resources in
            real-time.
          </p>
        </div>
        <div class="feature">
          <h3>Intuitive Interface</h3>
          <p>
            Navigate effortlessly through our user-friendly platform designed
            for all skill levels.
          </p>
        </div>
        <div class="feature">
          <h3>Comprehensive Analytics</h3>
          <p>
            Gain valuable insights with our robust analytics tools to inform
            your design decisions.
          </p>
        </div>
        <div class="feature">
          <h3>Secure Storage</h3>
          <p>
            Keep your research safe and accessible with our secure cloud storage
            solutions.
          </p>
        </div>
        <div class="feature">
          <h3>Customizable Templates</h3>
          <p>
            Utilize our range of templates to kickstart your projects and save
            time.
          </p>
        </div>
        <div class="feature">
          <h3>Expert Support</h3>
          <p>
            Access dedicated support from our team of design research
            professionals.
          </p>
        </div>
      </div>
    </div>

    <div class="section2-container">
      <h1>How it work</h1>
      <div class="steps">
        <div class="step">
          <div class="circle">1</div>
          <h3>Step 1: Sign Up</h3>
          <p>
            Create your account and gain instant access to our design research
            tools.
          </p>
        </div>
        <div class="step">
          <div class="circle">2</div>
          <h3>Step 2: Collaborate</h3>
          <p>Invite your team to collaborate and share insights on projects.</p>
        </div>
        <div class="step">
          <div class="circle">3</div>
          <h3>Step 3: Analyze</h3>
          <p>
            Use our analytics tools to evaluate your research and drive design
            decisions.
          </p>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="mission">
        <h2>Our Mission</h2>
        <div class="paragrph">
          <p>
            To empower designers with the tools they need to conduct impactful
            research and foster innovation.
          </p>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
      <div class="footer-content">
        <p>&copy; 2025 Your Company Name. All Rights Reserved.</p>
        <p>
          <a href="/about">About</a> |
          <a href="/privacy-policy">Privacy Policy</a> |
          <a href="/contact">Contact</a>
        </p>
      </div>
    </footer>

    <script src="Home.js"></script>
     <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  </body>
</html>
