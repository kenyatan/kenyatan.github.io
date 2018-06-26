<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Teren-Consulting-Limited</title>
<?php include 'includes/head.php'; ?>
    <div class="banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="teren-breadcumb banner-text">
                        <ul>
                            <li class="home-icon"><a href="">Home</a></li>
                            <li class="left-arrow-icon">About us</li>
                        </ul>
                        <h2 class="color-black">About Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="image">
                        <img class="img-responsive" src="images/about-us/1.PNG" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="about-us">
                        <div class="section-head">
                            <h2>We are Leader In Consulting</h2>
                        </div>
						<?php
						$text = "Teren Consulting Limited is a well established consulting firm. Our speciality is the ability to design unique customer relation to fit every type of client, from the budget providing a unique opportunity to address the clients desire!
						If you’re looking for a consulting firm that provides a huge sense of personal understanding in the consulting industry we deliver while still  being professional, 
						exciting and delivering within agreed time lines we suggest you check out our wide range of services.
						";
						$text = "<p style='text-align:justify'>$text</p>";
						echo $text;
						?>
                        <a class="teren-success-button mt30" href="">Contact Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding bg-deep">
        <div class="container">
            <div class="section-head text-center mb45">
                <h2 class="title-line">Why Choose Us</h2>
            </div>
            <div class="row row-eq-rs-height">
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="service-box">
                        <div class="icon-icon">
                            <span><i class="fa fa-cogs"></i></span>
                        </div>
                        <div class="text-center">
                            <h4><a href="">Professional</a></h4>
                            	<?php
								$text = "We have a competent professional team to work all round the clock to meet customer needs.";
								echo $text;
								?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="service-box">
                        <div class="icon-icon">
                            <span><i class="fa fa-line-chart"></i></span>
                        </div>
                        <div class="text-center">
                            <h4><a href="">Expert Advisor</a></h4>
                            	<?php
								$text = "We have a team of expert that shall give you expert advice of every question you ask";
								echo $text;
								?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="service-box">
                        <div class="icon-icon">
                            <span><i class="fa fa-money"></i></span>
                        </div>
                        <div class="text-center">
                            <h4><a href="">Fast And Secure</a></h4>
                            	<?php
								$text = "We deliver in a fast time line and all our services government policy and any legal requirement";
								echo $text;
								?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
		<div id="top">
        <section class="section-padding">
            <div class="container">
                <div class="section-head text-left mb85">
                    <h2 class="title-line-left">MVGI</h2>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest-news owl-carousel owl-theme custom-navs">
                            <div class="news bg-deep-light">
                                <div class="image">
                                    <img src="images/news/problem.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h4><a href="">Our Mission</a></h4>
                                    <p>To remain significant and relevant to the society</p>
										<br>								
                                </div>
                            </div>
                            <div class="news bg-deep-light">
                                <div class="image">
                                    <img src="images/news/vision.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h4><a href="">Our Vision</a></h4>
                                    <p>To provide detailed information and quality solutions to our clients</p>
								</div>
                            </div>
                            <div class="news bg-deep-light">
                                <div class="image">
                                    <img src="images/news/guide.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h4><a href="">Our Guide</a></h4>
									<?php 
									$longString = "Be on your guard;stand firm in your faith,be courageous, be strong.Let all that you do be done in love.{1 Corithians 16: 13-14} ";
									echo readMoreHelper($longString);
									function readMoreHelper($story_desc, $chars = 90) {
										$story_desc = substr($story_desc,0,$chars);  
										$story_desc = substr($story_desc,0,strrpos($story_desc,' '));  
										$story_desc = $story_desc." <a href='#'>Read More...</a>";  
										return $story_desc;  
									} 
									?> 
                                </div>
                            </div>
                            <div class="news bg-deep-light">
                                <div class="image">
                                    <img src="images/news/parsley.jpg" alt="">
                                </div>
                                <div class="content">
                                    <h4><a href="">Our Inspiration</a></h4>
                                   	<?php 
									$longString = "Success is peace of mind which is a direct result of self-satisfaction in knowing you did your best to become the best you are capable of becoming.John Wooden ";
									echo readMoreHelper2($longString);
									function readMoreHelper2($story_desc, $chars = 90) {
										$story_desc = substr($story_desc,0,$chars);  
										$story_desc = substr($story_desc,0,strrpos($story_desc,' '));  
										$story_desc = $story_desc." <a href='#'>Read More...</a>";  
										return $story_desc;  
									} 
									?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	</div>
		</section>
    <!-- \\ Begin Footer \\-->
	<?php include 'includes/foot.php'; ?>
	<!-- \\ End Footer \\-->
    </body>
</html>
