<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: rgb(255, 255, 255);">
    <!-- Navigation Bar -->
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

    <!-- Welcome Section -->
      <section class="background first_section">
          <h1 class="heading">Smart City Your Life</h1>
          <div class="select-container">
              <select class="select-box" id="complaints" onchange="goToLink()">
                  <option value="TOP">Types of Complaints</option>
                  <option href="#section-id-1" value="types.html">Public Works Department</option>
                  <option href="#section-id-2" value="types.html">Rural Education Department</option>
                  <option href="#section-id-3" value="types.html">Agriculture Department</option>
                  <option href="#section-id-4" value="types.html">Public Technology Department</option>
                  <option href="#section-id-5" value="types.html">Social Cleaning Department</option>
                  <option href="#section-id-6" value="types.html">Animal Agriculture Department</option>
              </select>
        <div class="icon-container">
          <i class="fa-solid fa-caret-down" aria-hidden="true"></i>
        </div>
        </div>
        </section>

        <!-- This is section2 part -->

        <section class="section2">
          <h1>Our <samp>Media</samp></h1>
          <div class="service2-grid">
            <div class="service2-item">
              <img src="image/img1(AC).jpg" alt="media1">
              <h2>Administrative Complaints</h2>
            </div>
            <div class="service2-item">
              <img src="image/img3(LAOC).jpg" alt="media2">
              <h2>Law and Order Complaints</h2>
            </div>
            <div class="service2-item">
              <img src="image/img4(MACC).jpg" alt="media3">
              <h2>Municipal and Civic Complaints</h2>
            </div>
            <div class="service2-item">
              <img src="image/img5(EC).jpg" alt="media4">
              <h2>Environmental Complaints</h2>
            </div>
            <div class="service2-item">
              <img src="image/img6(HAMC).jpg" alt="media5">
              <h2>Health and Medical Complaints</h2>
            </div>
            <div class="service2-item">
              <img src="image/img7(CPC).jpg" alt="media6">
              <h2>Consumer Protection Complaints</h2>
            </div>
            <div class="service2-item">
              <img src="image/img8(SWC).jpg" alt="media7">
              <h2>Social Welfare Complaints</h2>
            </div>
            <div class="service2-item">
              <img src="image/img9(LAPC).jpg" alt="media8">
              <h2>Land and Property Complaints</h2>
            </div>
            <div class="service2-item">
              <img src="image/img10(EAWC).jpg" alt="media9">
                <h2>Electricity and Water Complaints</h2>
            </div>
                </div>
          </section>

        <!-- This is section3 part -->
        <section class="section3">
          <div>
            <h2>Digital India: Power to Empower</h2>
            <p>Digital India is a flagship programme of the Government of India, launched on July 1, 2015, by Honourable Prime Minister
              Shri Narendra Modi with the vision to transform India into a digitally empowered society and knowledge economy. Digital India has
              been improving the lives of all citizens through the digital delivery of services, expanding the digital economy and employment
              opportunities.<br>
              <br>

              The Digital India programme has demonstrated a consistent upward growth trajectory, achieving numerous
              milestones and flagship initiatives. These accomplishments span a wide array of sectors, including developing broadband highways,
              universal access to mobile connectivity, public internet acce<span id="dots">...</span><span id="more">ss programmes and digital governance.
              <br><br>According to the State of India’s Digital Economy Report, 2024, unveiled by the Indian Council for Research on International
              Economic Relations (ICRIER) stated that India comes in third place in terms of the digitalisation of the economy.
              India’s digital infrastructure has been a key driver of its third-place ranking. With a clear focus on realising the vision of
              a “Viksit Bharat” i.e. Developed India by 2047, the government has laid out a comprehensive plan aimed at empowering citizens through
              social welfare programs, skill development and education. These elements are the core of the Viksit Bharat goal. Furthermore, in terms
              of cutting-edge technologies like artificial intelligence, quantum computing and space exploration, India is envisioned to emerge as a
              global leader under the Viksit Bharat vision. Through these strategic initiatives, Digital India aims to foster inclusive growth, enhance
              innovation and position itself at the forefront of technological advancements on the world stage.</span></p>
              <button class="btn"onclick="myFunction()" id="myBtn">Read More</button>
            </div>
            <div class="section3-img">
              <img src="image/ashok1.jpg" alt="img">
            </div>
          </section>
            <section class="section4">
            <h1>Our <samp>Services</samp></h1>
            <div class="service-grid">
              <div class="service-item">
                <img src="image/image1(PWD).jpg" alt="service1">
                <h2>Public Works Department</h2>
                <p>The Public Works Department (PWD) is a government agency responsible for the construction and maintenance of public infrastructure such as roads.</p>
              </div>
              <div class="service-item">
                <img src="image/image(RED).jpg" alt="service2">
                <h2>Rural Education Department</h2>
                <p>The Rural Education Department is a governmental or institutional body responsible for overseeing and improving education in rural areas.</p>
              </div>
              <div class="service-item">
                <img src="image/image3(AD).jpg" alt="service3">
                <h2>Agriculture Department</h2>
                <p>The Agriculture Department is a government agency responsible for overseeing and
                  regulating agricultural activities, policies, and programs within a country, state.</p>
              </div>
              <div class="service-item">
                <img  src="image/image4(PTD).jpg" alt="service4">
                <h2>Public Technology Department</h2>
                <p>The Public Technology Department (PTD) generally refers to a governmental or institutional
                  division responsible for overseeing technology initiatives, digital transformation, and public sector IT infrastructure.</p>
              </div>
              <div class="service-item">
                <img src="image/image5(SCD).jpg" alt="service5">
                <h2>Social Cleaning Department</h2>
                <p>A Social Cleaning Department is typically a government or municipal body responsible for maintaining cleanliness in
                  public spaces, ensuring sanitation, and promoting hygiene in communities.</p>
              </div>
              <div class="service-item">
                <img src="image/image6(AAD).jpg" alt="service6">
                <h2>Animal Agriculture Department</h2>
                <p>The Animal Agriculture Department is a governmental or institutional body
                  responsible for overseeing and regulating livestock farming, animal husbandry,
                  and related industries. </p>
              </div>
            </section>
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
                <a href="aboutUs.html">About Us</a>
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
                <p class="parag"> 2025 $Piyush and Group$....
                  All rights reserved.</p>
              </div>
            </footer>
<script src="js/index.js"></script>
</body>
</html>
