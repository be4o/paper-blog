<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Paper Blog - free website template</title>
<meta name="keywords" content="paper blog template, free html css layout" />
<meta name="description" content="Paper Blog - Free CSS Template provided by templatemo.com" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
</head>
<body>
<div id="templatemo_wrapper">
    <div id="templatemo_left_column">
    
    	<div id="site_title">
            <h1><a href="index.php" target="_parent">Paper Blog<span>free web template</span></a></h1>
        </div>
        
        <div id="templatemo_menu">
            <ul>
                <li><a href="index.php" class="current">Home</a></li>
                <li><a href="login.php">Login</a></li>                
              	<li><a href="Contact.php">Contact Us</a></li>
				<?php
					if(isset($_COOKIE['user']) && $_COOKIE['user']=='admin')
						echo "<li><a href='Post.php?type=add'>Add Post</a></li><li><a href='searchpost.php'>Search Post</a></li>";
				?>
				
            </ul>    	
        </div><!-- end of templatemo_menu -->
        
        <div id="templatemo_sidebar">
        
        	<div class="sidebar_box">
            
                <h2>Recent Posts</h2>
                <?php 
					if($_COOKIE['user']=='admin') 
						echo "<a color='red' href='newpost.php'>new article</a> | <a href='searchpost.php'>Search</a> ";
					//function to get last 3 posts
					include_once("classes/postclass.php");
					$post = new post();
					echo $post->getlastposts(3);
				?>      
            
            </div>
    
    	</div>
    	
    </div> <!-- end of templatemo_left_column -->
    
    <div id="templatemo_content">
    	
        <div id="templatemo_slider">
        
     	<div id="one" class="contentslider">
            <div class="cs_wrapper">
                <div class="cs_slider">
                
                    <div class="cs_article">
                        <a href="#">
                        	<img src="images/article01.jpg" alt="Artist's interpretation of article headline" />
                        </a>
                        
                        <div class="text">
                            <h2><a href="http://www.templatemo.com" target="_parent">Project One</a></h2>
                            
                            <p>
                            Hendrerit tincidunt vero vel eorum claritatem. Soluta legunt quod qui dolore.
                            </p>
                            
                            <a class="readmore" href="#">Read More</a>
                   		</div>
                	</div><!-- End cs_article -->
                    
                    <div class="cs_article">
                        <a href="#">
                        <img src="images/article02.jpg" alt="Artist's interpretation of article headline" />
                        </a>
                        
                        <div class="text">
                            <h2> <a href="http://www.templatemo.com" target="_parent">Project Two</a></h2>
                            
                            <p>
							Lorem ipsum dolor sit ame, consectetur adipiscing elit. In tincidunt.
                            </p>
                            
                            <a class="readmore" href="#">Read More</a>
                   		</div>
                	</div><!-- End cs_article -->
                    
                    <div class="cs_article">
                        <a href="#">
                        <img src="images/article03.jpg" alt="Artist's interpretation of article headline" />
                        </a>
                        
                        <div class="text">
                            <h2> <a href="http://www.templatemo.com" target="_parent">Project Three</a></h2>
                            
                            <p>
                            Hendrerit tincidunt vero vel eorum claritatem. Soluta legunt quod qui dolore.
                            </p>
                            
                            <a class="readmore" href="#">Read More</a>
                   		</div>
                	</div><!-- End cs_article -->
                    
                    <div class="cs_article">
                        <a href="#">
                        <img src="images/article04.jpg" alt="Artist's interpretation of article headline" />
                        </a>
                        
                        <div class="text">
                            <h2> <a href="http://www.templatemo.com" target="_parent">Project Four</a></h2>
                            
                            <p>
                            Aliquam elit risus, volutpat quis, mattis ac, elementum eget, mauris.
                            </p>
                            
                            <a class="readmore" href="#">Read More</a>
                   		</div>
                	</div><!-- End cs_article -->
              
                </div><!-- End cs_slider -->
            </div><!-- End cs_wrapper -->
        </div><!-- End contentslider -->

	<!-- Site JavaScript -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.ennui.contentslider.js"></script>
	<script type="text/javascript">
			$(function() {
				$('#one').ContentSlider({
					width : '630px',
					height : '160px',
					speed : 800,
					easing : 'easeInOutBack'
				});
			});
	</script>
        </div>   <!-- end of slider -->  
		    
