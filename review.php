<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Government Complaint Management System - Reviews</title>
    <link rel="stylesheet" href="css/review.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    <main>
        <section class="hero">
            <h2>Citizen Feedback & Reviews</h2>
            <p>See what others are saying about our complaint resolution services</p>
        </section>
        <section class="stats">
            <div class="stat-card">
                <h3>24,589</h3>
                <p>Complaints Resolved</p>
            </div>
            <div class="stat-card">
                <h3>4.2/5</h3>
                <p>Average Rating</p>
            </div>
            <div class="stat-card">
                <h3>87%</h3>
                <p>Satisfaction Rate</p>
            </div>
            <div class="stat-card">
                <h3>48h</h3>
                <p>Avg. Resolution Time</p>
            </div>
        </section>
        <section class="review-section">
            <div class="filters">
                <select id="department-filter">
                    <option value="all">All Departments</option>
                    <option value="sanitation">Sanitation</option>
                    <option value="transport">Transport</option>
                    <option value="utilities">Utilities</option>
                    <option value="public-safety">Public Safety</option>
                </select>
                <select id="rating-filter">
                    <option value="all">All Ratings</option>
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Star</option>
                </select>
                <button id="sort-date">Sort by Date</button>
            </div>
            <div class="reviews-container" id="reviews-container">
                <!-- Reviews will be loaded here by JavaScript -->
            </div>
            <div class="pagination">
                <button id="prev-page" disabled>Previous</button>
                <span id="page-info">Page 1 of 5</span>
                <button id="next-page">Next</button>
            </div>
        </section>
        <section class="add-review">
            <h3>Share Your Experience</h3>
            <form id="review-form">
                <div class="form-group">
                    <label for="user-name">Your Name (Optional):</label>
                    <input type="text" id="user-name" placeholder="Anonymous Citizen">
                </div>
                <div class="form-group">
                    <label for="department">Department:</label>
                    <select id="department" required>
                        <option value="">Select Department</option>
                        <option value="sanitation">Sanitation</option>
                        <option value="transport">Transport</option>
                        <option value="utilities">Utilities</option>
                        <option value="public-safety">Public Safety</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="rating">Your Rating:</label>
                    <div class="star-rating">
                        <i class="far fa-star" data-rating="1"></i>
                        <i class="far fa-star" data-rating="2"></i>
                        <i class="far fa-star" data-rating="3"></i>
                        <i class="far fa-star" data-rating="4"></i>
                        <i class="far fa-star" data-rating="5"></i>
                    </div>
                    <input type="hidden" id="rating" required>
                </div>
                <div class="form-group">
                    <label for="review-text">Your Review:</label>
                    <textarea id="review-text" rows="5" required placeholder="Share your experience with our complaint resolution process..."></textarea>
                </div>
                <button type="submit">Submit Review</button>
            </form>
        </section>
    </main>
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
    <script src="js/review.js"></script>
</body>
</html>