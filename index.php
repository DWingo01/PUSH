<?php
	
	// * IMPORTANT * Set your email information here
	define('DESTINATION_EMAIL','danielwingo.dw@gmail.com');
	define('MESSAGE_SUBJECT','PUSH Contact Form');
	define('REPLY_TO', 'danielwingo.dw@gmail.com');
	define('FROM_ADDRESS', 'danielwingo.dw@gmail.com');
	define('REDIRECT_URL', 'index.php');
	
	require_once('validation.php');

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#F37333">
    <title>PUSH Beyond</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="fonts/stylesheet.css" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" type="image/png" href="favicon.png" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

     <section class="hero insert-shadow">
         <nav class="top-bar" data-topbar><!--experimental nav-->
        <ul class="title-area">
           
          <li class="name">
            <h1>
              <a href="index.php">
                <img src="img/PUSH-logo_05.png" alt="logo" />
              </a>
            </h1>
          </li>
    <?php include('inc/nav.inc.php'); ?>
      </nav><!--experimental nav-->
      <div class="row general-content">
       <div class="large-6 columns"><!--start of logo column-->
        <div class="row"><!--start of logo-->
 
          <div class="large-12 columns">
 
            <img src="img/PUSH-logo_03.png"><br>
 
          </div>
            
        </div><!--end of logo-->
 
        
        <div class="row"><!--start of subtitle of logo-->
            
            <div class="large-12 columns">
 
            <div class="clear-panels ">
            <p class="large-heading">The mobile-based, cross-platform, project-management solution.<p>
            </div>
            
            <div class="section-container tabs" data-section><!--start of form-->
                <section class="section">
                  <h5 class="title">sign up for our beta testing in 2015</h5>
                  <div class="content" data-slug="panel1">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<fieldset>
                      <div class="row collapse">
                        <div class="large-12 columns">
                            <label for="name">Name:</label><?php echo @$name_error; ?>
					<input type="text" id="name" name="name" value="<?php echo @$name ?>" class="required" />
                        </div>
                      </div>
                      <div class="row collapse">
                        <div class="large-12 columns">
                        <label for="email">Email:</label><?php echo @$email_error; ?>
					<input type="text" id="email" name="email" value="<?php echo @$email ?>" class="email required" />
                        </div>
                      </div>
                      <div class="row collapse">
                        <div class="large-12 columns">
                        <label> Your Company's Name</label><?php echo @$message_error; ?>
                          <textarea cols="45" rows="7" id="message" name="message" class="required"><?php echo @$message ?></textarea>
                        </div>
                      </div>
                      <input name="submitted" type="submit" value="Send" class="radius button left"/>
                      </fieldset>
                    </form>
                  </div>
                </section>         
            </div><!--end of form--> 
        </div><!--end of subtitle of logo--> 
    </div>   
</div><!--end of logo column--> 
      
    <div class="large-6 columns"><!--start of platform column-->
        <div class="row"><!--start of logo-->
 
          <div class="large-12 columns">
 
            <img src="img/phones.png"><br>
 
          </div>
            
        </div><!--end of logo-->
 
        
        <div class="row"><!--start of subtitle of logo-->
            
            <div class="large-12 columns">
 
            <div class="clear-panels ">
            
            </div>
 
          </div>
        </div><!--end of subtitle of logo-->
    </div><!--start of platform column-->   
          
      </div>
         
    </section>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
