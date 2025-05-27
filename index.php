<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Website Design</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
    <section class="header">
        <nav>
            <a href="index.html"><img src="" alt=""></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#about1">ABOUT</a></li>
                    <li><a href="#courses">COURSES</a></li>
                    <li><a href="./student/home.html">STUDENT</a></li>
                    <!-- <li><a href="">MENTOR</a></li> -->
                    <li><a href="/mc/appointment/index.php">APPOINTMENT</a></li>
                    <li><a href="./contactus/index.html">CONTACT US</a></li>
                </ul>
            </div>
            <i class="fa fa-list" onclick="showMenu()"></i>
        </nav>

        <div class="text-box">
            <h1>Connecting Mentors with Aspiring Minds</h1>
        <p>Fostering meaningful connections between industry experts and learners.Breaking barriers to connect experts and learners globally and A space where mentorship builds a stronger community.</p>
        <a href="" class="hero-btn">Visit Us To Know More</a>
        </div>
    </section>

    <!-- ----------- about us----------------- -->
    <section class="course" id="about1">
        <h1>About Us</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
    
        <div class="row">
            <div class="course-col about">
                <h3>How It Works</h3>
                <p>Follow these simple steps to get started:</p>
                <ol>
                    <li>Sign Up</li>
                    <li>Create Your Profile</li>
                    <li>Find a Mentor or Mentee</li>
                    <li>Start Connecting</li>
                </ol>
            </div>

            <div class="course-col about">
                <h3>Success Stories</h3>
                <p>"Mentor Connect helped me find the guidance I needed to grow my career!" - Jane Doe</p>
            </div>

            <div class="course-col about">
                <h3>Why Choose Mentor Connect?</h3>
                <ul>
                    <li>Flexible Scheduling</li>
                    <li>Industry-Specific Mentors</li>
                    <li>Secure Communication</li>
                    <li>Progress Tracking</li>
                </ul>
            </div>
        </div>
     </section>


    <!-- -----------Course----------------- -->
     <section class="course" id="courses">
        <h1>Courses We Offer</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
         
        <div class="row">
            <div class="course-col">
                <h3>Intermediate</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi molestiae officia fugit enim beatae aspernatur.</p>
            </div>

            <div class="course-col">
                <h3>Degree</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi molestiae officia fugit enim beatae aspernatur.</p>
            </div>

            <div class="course-col">
                <h3>Post Graduation</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi molestiae officia fugit enim beatae aspernatur.</p>
            </div>
        </div>
     </section>
<!-- --------------------Connections -->
     <section class="campus" id="connections">
        <h1>Our Connections</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>

        <div class="row">
            <div class="campus-col">
                <img src="./images/bu1.jpg" alt="">
                <div class="layer">
                    <h3>LONDON</h3>
                </div>
            </div>

            <div class="campus-col">
                <img src="./images/bu2.jpg" alt="">
                <div class="layer">
                    <h3>NEW YORK</h3>
                </div>
            </div>

            <div class="campus-col">
                <img src="./images/bu3.jpg" alt="">
                <div class="layer">
                    <h3>WASHINGTON</h3>
                </div>
            </div>
        </div>
     </section>

     
     <!-- -------------testimonials----------- -->
      <section class="testimonials ">
        <h1>What Our Student Says</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        <div class="row">
            <div class="testimonial-col">
                <img src="./images/user1.jpg" alt="">
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed qui quisquam natus et nobis. Minus consequuntur ipsum sequi a optio.</p>
                        <h3>Priyanka</h3>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                </img>
            </div>

            <div class="testimonial-col">
                <img src="./images/user2.jpg" alt="">
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed qui quisquam natus et nobis. Minus consequuntur ipsum sequi a optio.</p>
                        <h3>Rachita</h3>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </img>
            </div>

            <div class="testimonial-col">
                <img src="./images/user3.jpg" alt="">
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sed qui quisquam natus et nobis. Minus consequuntur ipsum sequi a optio.</p>
                        <h3>Seetal</h3>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                </img>
            </div>
        </div>
      </section>

     <!-- ----------------footer------------------- -->
     <footer class="footer">
        <p>&copy; 2025 Mentor Connect. All Rights Reserved.</p>
        <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    </footer>




    <!-- ------- JavaScript for Toggle Menu -->
    <script>
        var navLinks = document.getElementById("navLinks");
        function showMenu(){
            navLinks.style.right="0";
        }
        function hideMenu(){
            navLinks.style.right="-200px";
        }
    </script>
</body>
</html>