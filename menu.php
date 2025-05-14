<div class="container">
        <div class="custom_nav2">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="d-flex  flex-column flex-lg-row align-items-center">
                <ul class="navbar-nav  ">
                       <a class="nav-item nav-link active" aria-current="page" href="index.php">Home</a>
                    <?php
        if($_SESSION['email']==null){
          ?>
        
        
          <a class="nav-item nav-link" href="register.php">Register</a>
        
        
          <a class="nav-item nav-link" href="login.php">Login</a>
        
        <?php
      }else{
      ?>
      
          <a class="nav-item nav-link" href="welcome.php">Products</a>
        
        
          <a class="nav-item nav-link" href="viewcart.php">View Cart</a>
        
        
          <a class="nav-item nav-link" href="orders.php">My Orders</a>
          <a class="nav-item nav-link" href="bmi.php">BMI</a>
         <a class="nav-item nav-link" href="feedback.php">Feedback</a>
                    <a class="nav-item nav-link" href="location.php">Location</a>

          <a class="nav-item nav-link" href="logout.php">Logout</a>
        
        <?php
      }
      ?>
             
                </ul>
                <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                  <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                </form>
              </div>
            </div>
          </nav>
        </div>
      </div>

    <!-- Navbar End -->