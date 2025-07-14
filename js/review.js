// Sample review data
const reviewsData = [
  {
      id: 1,
      userName: "John D.",
      department: "sanitation",
      rating: 5,
      reviewText: "The sanitation department resolved my garbage collection issue within 24 hours. Very efficient service!",
      date: "2023-10-15"
  },
  {
      id: 2,
      userName: "Sarah M.",
      department: "transport",
      rating: 4,
      reviewText: "Reported a pothole on Main Street and it was fixed within a week. Good response time.",
      date: "2023-10-12"
  },
  {
      id: 3,
      userName: "Anonymous",
      department: "utilities",
      rating: 3,
      reviewText: "Water leak issue was addressed but took longer than expected. Service was okay.",
      date: "2023-10-08"
  },
  {
      id: 4,
      userName: "Robert T.",
      department: "public-safety",
      rating: 5,
      reviewText: "Excellent response from the public safety team regarding the street light outage in our neighborhood.",
      date: "2023-10-05"
  },
  {
      id: 5,
      userName: "Lisa K.",
      department: "sanitation",
      rating: 2,
      reviewText: "Still waiting for resolution on my recycling bin complaint after 2 weeks. Not satisfied.",
      date: "2023-09-28"
  },
  {
      id: 6,
      userName: "Michael B.",
      department: "transport",
      rating: 4,
      reviewText: "Bus stop shelter was repaired quickly after my complaint. Thank you!",
      date: "2023-09-25"
  },
  {
      id: 7,
      userName: "Anonymous",
      department: "utilities",
      rating: 5,
      reviewText: "Power outage was resolved much faster than estimated. Great job!",
      date: "2023-09-20"
  },
  {
      id: 8,
      userName: "Emily R.",
      department: "public-safety",
      rating: 1,
      reviewText: "No action taken on my complaint about dangerous sidewalk conditions. Very disappointed.",
      date: "2023-09-15"
  }
];

// DOM Elements
const reviewsContainer = document.getElementById('reviews-container');
const departmentFilter = document.getElementById('department-filter');
const ratingFilter = document.getElementById('rating-filter');
const sortDateBtn = document.getElementById('sort-date');
const prevPageBtn = document.getElementById('prev-page');
const nextPageBtn = document.getElementById('next-page');
const pageInfo = document.getElementById('page-info');
const reviewForm = document.getElementById('review-form');
const starRating = document.querySelectorAll('.star-rating i');
const ratingInput = document.getElementById('rating');

// Pagination variables
let currentPage = 1;
const reviewsPerPage = 4;
let totalPages = Math.ceil(reviewsData.length / reviewsPerPage);
let filteredReviews = [...reviewsData];
let sortOrder = 'desc'; // 'asc' or 'desc'

// Initialize the page
document.addEventListener('DOMContentLoaded', () => {
  displayReviews();
  updatePagination();
  
  // Event listeners
  departmentFilter.addEventListener('change', filterReviews);
  ratingFilter.addEventListener('change', filterReviews);
  sortDateBtn.addEventListener('click', toggleSortDate);
  prevPageBtn.addEventListener('click', goToPrevPage);
  nextPageBtn.addEventListener('click', goToNextPage);
  reviewForm.addEventListener('submit', submitReview);
  
  // Star rating interaction
  starRating.forEach(star => {
      star.addEventListener('click', setRating);
      star.addEventListener('mouseover', hoverStar);
      star.addEventListener('mouseout', resetStars);
  });
});

// Display reviews based on current filters and pagination
function displayReviews() {
  reviewsContainer.innerHTML = '';
  
  const startIndex = (currentPage - 1) * reviewsPerPage;
  const endIndex = startIndex + reviewsPerPage;
  const reviewsToShow = filteredReviews.slice(startIndex, endIndex);
  
  if (reviewsToShow.length === 0) {
      reviewsContainer.innerHTML = '<p class="no-reviews">No reviews found matching your criteria.</p>';
      return;
  }
  
  reviewsToShow.forEach(review => {
      const reviewCard = document.createElement('div');
      reviewCard.className = 'review-card';
      
      const stars = '★'.repeat(review.rating) + '☆'.repeat(5 - review.rating);
      
      reviewCard.innerHTML = `
          <div class="review-header">
              <div>
                  <span class="review-user">${review.userName}</span>
                  <span class="review-department">${formatDepartment(review.department)}</span>
              </div>
              <span class="review-date">${formatDate(review.date)}</span>
          </div>
          <div class="review-rating" title="${review.rating} out of 5 stars">
              ${stars}
          </div>
          <div class="review-text">
              ${review.reviewText}
          </div>
      `;
      
      reviewsContainer.appendChild(reviewCard);
  });
}

// Format department name for display
function formatDepartment(department) {
  const names = {
      'sanitation': 'Sanitation',
      'transport': 'Transport',
      'utilities': 'Utilities',
      'public-safety': 'Public Safety'
  };
  return names[department] || department;
}

// Format date for display
function formatDate(dateString) {
  const options = { year: 'numeric', month: 'long', day: 'numeric' };
  return new Date(dateString).toLocaleDateString('en-US', options);
}

// Filter reviews based on selected filters
function filterReviews() {
  const departmentValue = departmentFilter.value;
  const ratingValue = ratingFilter.value;
  
  filteredReviews = reviewsData.filter(review => {
      const departmentMatch = departmentValue === 'all' || review.department === departmentValue;
      const ratingMatch = ratingValue === 'all' || review.rating === parseInt(ratingValue);
      return departmentMatch && ratingMatch;
  });
  
  // Apply current sort
  sortReviews();
  
  // Reset to first page
  currentPage = 1;
  totalPages = Math.ceil(filteredReviews.length / reviewsPerPage);
  
  displayReviews();
  updatePagination();
}

// Toggle date sort between ascending and descending
function toggleSortDate() {
  sortOrder = sortOrder === 'desc' ? 'asc' : 'desc';
  sortDateBtn.textContent = `Sort by Date (${sortOrder === 'desc' ? 'Newest First' : 'Oldest First'})`;
  sortReviews();
  displayReviews();
}

// Sort reviews by date
function sortReviews() {
  filteredReviews.sort((a, b) => {
      const dateA = new Date(a.date);
      const dateB = new Date(b.date);
      return sortOrder === 'desc' ? dateB - dateA : dateA - dateB;
  });
}

// Go to previous page
function goToPrevPage() {
  if (currentPage > 1) {
      currentPage--;
      displayReviews();
      updatePagination();
  }
}

// Go to next page
function goToNextPage() {
  if (currentPage < totalPages) {
      currentPage++;
      displayReviews();
      updatePagination();
  }
}

// Update pagination controls
function updatePagination() {
  pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;
  prevPageBtn.disabled = currentPage === 1;
  nextPageBtn.disabled = currentPage === totalPages;
}

// Handle star rating selection
function setRating(e) {
  const rating = parseInt(e.target.getAttribute('data-rating'));
  ratingInput.value = rating;
  
  starRating.forEach(star => {
      const starRating = parseInt(star.getAttribute('data-rating'));
      if (starRating <= rating) {
          star.classList.add('active');
          star.classList.remove('far');
          star.classList.add('fas');
      } else {
          star.classList.remove('active');
          star.classList.remove('fas');
          star.classList.add('far');
      }
  });
}

// Hover effect for stars
function hoverStar(e) {
  const hoverRating = parseInt(e.target.getAttribute('data-rating'));
  
  starRating.forEach(star => {
      const starRating = parseInt(star.getAttribute('data-rating'));
      if (starRating <= hoverRating) {
          star.classList.add('hover');
      } else {
          star.classList.remove('hover');
      }
  });
}

// Reset stars after hover
function resetStars() {
  starRating.forEach(star => {
      star.classList.remove('hover');
  });
}

// Submit new review
function submitReview(e) {
  e.preventDefault();
  
  const userName = document.getElementById('user-name').value || 'Anonymous';
  const department = document.getElementById('department').value;
  const rating = parseInt(document.getElementById('rating').value);
  const reviewText = document.getElementById('review-text').value;
  const date = new Date().toISOString().split('T')[0]; // YYYY-MM-DD
  
  if (!department || !rating || !reviewText) {
      alert('Please fill in all required fields.');
      return;
  }
  
  // Create new review object
  const newReview = {
      id: reviewsData.length + 1,
      userName,
      department,
      rating,
      reviewText,
      date
  };
  
  // Add to beginning of array (to show at top when sorted by date desc)
  reviewsData.unshift(newReview);
  filteredReviews.unshift(newReview);
  
  // Reset form
  reviewForm.reset();
  starRating.forEach(star => {
      star.classList.remove('fas', 'active');
      star.classList.add('far');
  });
  
  // Reset filters and show first page
  departmentFilter.value = 'all';
  ratingFilter.value = 'all';
  currentPage = 1;
  totalPages = Math.ceil(filteredReviews.length / reviewsPerPage);
  
  // Display reviews
  sortReviews();
  displayReviews();
  updatePagination();
  
  // Scroll to top of reviews
  reviewsContainer.scrollIntoView({ behavior: 'smooth' });
  
  // Show success message
  alert('Thank you for your review! It has been submitted successfully.');
}