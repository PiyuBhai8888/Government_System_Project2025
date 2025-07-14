<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About Us</title>
  <link rel="stylesheet" href="css/aboutUs.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <nav class="menu_bar">
        <img class="logo" src="image/logo1.png" alt="logo">
        <ul>
        <li><a class="active nav-home" href="index.php">Home</a></li>
        <li>
          <a href="#">Services <i class="fas fa-caret-down"></i></a>
          <div class="dropdown_menu">
          <ul>
            <li><a href="complaint.html">Complaint System</a></li>
            <li><a href="public.html">Public System</a></li>
          </ul>
          </div>
        <li><a class="active" href="aboutUs.php">About Us</a></li>
        <li><a class="active" href="contact.php">Contact Us</a></li>
        <li><a class="active" href="review.php">Review</a></li>
        </ul>
        </nav>
  <div class="container">
    <h1 class="heading1">About Us</h1>
    <div class="content1">
      <div class="text1">
        <h1><samp>From Complaint to Resolution:</samp> A Streamlined Approach</h1>
        <p>Efficient complaint management is essential for ensuring customer satisfaction and operational effectiveness...</p>
        <p>The process begins with an accessible and user-friendly complaint submission system...</p>
        <p>Clear communication, timely intervention, and data-driven analysis help organizations identify recurring issues...</p>
        <p>The Government Complaint Management System is designed to streamline the process of lodging and resolving citizen complaints efficiently...</p>
      </div>
      <div class="image1">
        <img src="image/image16.jpg" alt="Streamlined Approach Illustration">
      </div>
    </div>
  </div>
  <div class="container2">
    <h1 class="heading2">Our Mission</h1>
    <div class="content2">
      <div class="text2">
        <h1><samp>A Mission to Serve,</samp> A Vision to Improve</h1>
        <p>Our mission is to provide an accessible and efficient system...</p>
        <p>We strive to enhance trust, accountability, and service quality by leveraging technology...</p>
        <p>Through continuous improvement and collaboration, we aim to create a responsive system...</p>
      </div>
      <div class="image2">
        <img src="image/image15.jpg" alt="Our Mission Illustration">
      </div>
    </div>
  </div>
  <div class="container3">
    <h1 class="heading3">Our System Effective</h1>
    <div class="content3">
      <div class="text3">
        <h1><samp>Our System's Strengths:</samp> Making Complaints Matter</h1>
        <p>Our System's Strengths: Making Complaints Matter refers to the key features and capabilities that ensure complaints
          are not just recorded but actively addressed and resolved...</p>
        <h3>Key strengths include</h3>
        <ol class="list">
          <li><samp>User-Friendly Interface:</samp> A simple and intuitive platform for submitting complaints with ease.</li>
          <li><samp>Real-Time Tracking:</samp> Complainants can monitor the progress...</li>
          <li><samp>Automated Workflow:</samp> Efficient categorization and escalation...</li>
          <li><samp>Transparency & Accountability:</samp> Clear communication channels...</li>
          <li><samp>Data-Driven Insights:</samp> Analytics help identify recurring issues...</li>
          <li><samp>Multi-Channel Accessibility:</samp> Complaints can be submitted via web, mobile app, or helpline.</li>
        </ol>
        <h3>Key Features</h3>
        <ol class="list">
          <li>Online complaint submission</li>
          <li>Real-time tracking of complaints</li>
          <li>Automated notifications and updates</li>
          <li>Efficient response and resolution mechanism</li>
          <li>Secure and transparent system</li>
        </ol>
      </div>
    </div>
  </div>
  <footer class="footer-1">
    <div class="footer-part">
      <div class="social-media">
        <img src="image/digital_india1-removebg-preview.png" alt=" logo">
        <div>
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <p>Last Updated: March 25, 2025</p>
      </div>
      <div class="social-1">
        <h4>Digital India</h4>
        <a href="aboutUs.php">About Us</a>
        <a href="#">Initiatives</a>
        <a href="#">Privacy Policy</a>
      </div>
      <div class="social-2">
        <h4>Useful Links</h4>
        <a href="#">Events</a>
        <a href="#">Press Release</a>
        <a href="#">Videos</a>
        <a href="#">Digiपहल</a>
      </div>
      <div class="social-3">
        <h4>Help & Support</h4>
        <a href="#">Right to Information</a>
        <a href="#">Disclaimer</a>
        <a href="#">FAQ</a>
      </div>
      <div class="social-4">
        <h4>Contact Us</h4>
        <p>G.H Raisoni College of Engineering <br>and management, Pune</p>
        <p>Email: <samp>piyushgirase26@gmail.com</samp></p>
        <p>Email: <samp>pratikdeshmukh6190@gmail.com</samp></p>
        <img src="image/india1.png" alt="logo">
      </div>
    </div>
  </footer>
  <footer class="footer-2">
    <div class="copyright">
      <p class="parag">2025 $Piyush and Group$.... All rights reserved.</p>
    </div>
  </footer>
  <button id="backToTop" title="Go to top">⬆</button>
  <button id="themeToggle">🌙</button>
  <script src="js/about.js"></script>
</body>
</html>
