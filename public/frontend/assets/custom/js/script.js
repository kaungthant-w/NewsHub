document.addEventListener('DOMContentLoaded', function() {

    // Check if dark mode preference is stored in localStorage
    const isDarkMode = localStorage.getItem('darkMode') === 'true';

    // Set the initial dark mode state based on the stored preference
    if (isDarkMode) {
        document.body.classList.add('dark-mode');
    }

    // Add event listener to the moon icon
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    darkModeToggle.addEventListener('click', function() {
        // Toggle the 'dark-mode' class on the body element
        document.body.classList.toggle('dark-mode');

        // Store the dark mode preference in localStorage
        const isDarkMode = document.body.classList.contains('dark-mode');
        localStorage.setItem('darkMode', isDarkMode);
    });
});

// when click img,show full width img
function showFullSize() {
    var overlay = document.querySelector('.image-overlay');
    overlay.classList.add('open');
  }

  function closeFullSize() {
    var overlay = document.querySelector('.image-overlay');
    overlay.classList.remove('open');
  }

  $('#image').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#showImage').attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
  })

  $('#bannerSlide1').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#showBannerSlide1').attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
  })

  $('#bannerSlide2').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#showBannerSlide2').attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
  })

  $('#bannerSlide3').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#showBannerSlide3').attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
  })

  $('#bannerSlide4').change(function(e){
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#showBannerSlide4').attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
  })

//show / hide password
const togglePasswords = document.querySelectorAll('.toggle-password');

togglePasswords.forEach(function (togglePassword) {
    togglePassword.addEventListener('click', function (e) {
        const targetId = this.getAttribute('data-target');
        const password = document.querySelector(targetId);

        // Toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // Toggle the eye slash icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
});


//live
$(document).ready(function() {
    $(".closeLive").on("click", function() {
      $(this).closest(".card").hide();
    });
  });

// comment
document.addEventListener("DOMContentLoaded", function () {
    const commentSections = document.querySelectorAll(".comment_des");
    const maxWords = 10;

    function showLimitedContent(commentText, showMoreBtn, showLessBtn) {
        const originalContent = commentText.dataset.originalContent;
        const words = originalContent.split(" ");
        const limitedContent = words.slice(0, maxWords).join(" ");
        commentText.innerText = limitedContent;
        showMoreBtn.style.display = "inline";
        showLessBtn.style.display = "none";
    }

    function showFullContent(commentText, showMoreBtn, showLessBtn) {
        const originalContent = commentText.dataset.originalContent;
        commentText.innerText = originalContent;
        showMoreBtn.style.display = "none";
        showLessBtn.style.display = "inline";
    }

    commentSections.forEach((commentSection) => {
        const commentText = commentSection.querySelector(".commentText");
        const showMoreBtn = commentSection.querySelector(".showMore");
        const showLessBtn = commentSection.querySelector(".showLess");
        const originalContent = commentText.innerText;
        commentText.dataset.originalContent = originalContent;

        showLimitedContent(commentText, showMoreBtn, showLessBtn);

        showMoreBtn.addEventListener("click", function () {
            showFullContent(commentText, showMoreBtn, showLessBtn);
        });

        showLessBtn.addEventListener("click", function () {
            showLimitedContent(commentText, showMoreBtn, showLessBtn);
        });
    });
});
