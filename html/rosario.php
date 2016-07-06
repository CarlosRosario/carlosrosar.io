<?php
    //print_r($_POST);
    $error = "";
    $successMessage = "";
    
    if(isset($_POST["email"]) || isset($_POST["message"]) || isset($_POST["fullname"])){
        if(!$_POST["email"]){
            $error .= "Oops! An email address is required <br>";
        }

        if(!$_POST["message"]){
            $error .= "Oops! A message is required <br>";
        }

        if(!$_POST["subject"]){
            $error .= "Oops! your name is required<br>";
        }

        if ($_POST["email"] && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error .= "Invalid email format <br>"; 
        }

        if($error != ""){
            $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' .$error. '</div>';
        } else {

            $emailTo = "carlos.rosario1990@gmail.com";
            $subject = "Message from your website from" . $_POST["fullname"];
            $content = $_POST["message"];
            $headers = "From: ".$_POST['email'];

            if(mail($emailTo, $subject, $content, $headers)){
                $successMessage .= '<div class="alert alert-success" role="alert"><strong>Awesome!</strong>"I\'ll get back to you ASAP"</div>';
                //echo "Email was sent successfully";
            } else {
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Your Message could not be sent. Please try again later.</div>';
               // echo "Email not sent successfully";
            }
        }    
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>carlosrosar.io - Software Engineer</title>
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <!-- Tether.js (used for bootstrap tooltips) -->
        <script src=https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.2/js/tether.min.js></script>
        <!-- Bootstrap.js -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
        
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../css/rosario.css">
        
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=McLaren' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Cardo' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Work+Sans' rel='stylesheet' type='text/css'>
        
        <!-- WOW Animations.. such easy! -->
        <link rel="stylesheet" href="../css/animate.css">
        <script src="../js/wow.min.js"></script>
        
        <!-- Charts.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.min.js"></script>
    </head>
    
    <body data-spy="scroll" data-target="#navbar-rosario" data-offset="70">
        <!-- Navbar -->
        <nav id="navbar-rosario" class="navbar navbar-fixed-top navbar-dark" style="background-color: #1D282D; opacity:.9;" >
            <a class="navbar-brand rosarioBrand" href="#"><span style="color:white;">Carlos</span><span style="color:#00cccc;">Rosar.io</span></a>
            <ul class="nav nav-pills rosarioBrand" role="tablist">
                <li class="nav-item pull-xs-right pull-sm-right pull-md-right pull-lg-right pull-xl-right">
                    <a id="contact-nav" class="nav-link custom-nav-link hvr-underline-from-right" href="#contact">Contact<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item pull-xs-right pull-sm-right pull-md-right pull-lg-right pull-xl-right">
                    <a id="skills-nav" class="nav-link custom-nav-link hvr-underline-from-right" href="#skills-wrapper">Skills <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item pull-xs-right pull-sm-right pull-md-right pull-lg-right pull-xl-right">
                    <a id="exp-nav" class="nav-link active custom-nav-link hvr-underline-from-right" href="#experience">Experience <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item pull-xs-right pull-sm-right pull-md-right pull-lg-right pull-xl-right">
                    <a id="edu-nav" class="nav-link custom-nav-link hvr-underline-from-right" href="#education">Education <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item pull-xs-right pull-sm-right pull-md-right pull-lg-right pull-xl-right">
                    <a id="more-nav" class="nav-link custom-nav-link hvr-underline-from-right" href="#in-depth">More</a>
                </li>
                <li class="nav-item pull-xs-right pull-sm-right pull-md-right pull-lg-right pull-xl-right">
                    <a id="top-nav" class="nav-link custom-nav-link hvr-underline-from-right" href="#quick-intro">Top</a>
                </li>
            </ul>
<!--            <button class="navbar-toggler pull-xs-right" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">&#9776;</button>-->
        </nav>
        
        <!-- Jumbotron -->
        <div id="quick-intro" class="jumbotron">
            <div id="quick-intro-contents">
                <div class="container-fluid">
                    <h1 class="display-1">I'm Carlos.</h1>
                    <p class="lead"><strong>A Software Engineer/Full Stack Developer</strong></p>
                    <p><strong>Besides programming, I like to cook, watch UFC, play video games, exercise, and hang out with my girlfriend</strong></p>
                    <hr class="m-y-2">
                    <img id="myPicture" src="../images/headshot.jpg" class="img-circle img-responsive wow bounceInLeft" data-wow-delay=".5s" data-wow-duration="2s"/>
                </div>
            </div>
        </div>

        <!-- Indepth About Me Section -->
        <div id="in-depth" class="container wow fadeInRightBig" data-wow-delay=".5s" data-wow-duration="2s">
            <p style="font-weight:bold;" id="width-in-pixels"></p>
            <h1 id="in-depth-header">A little more about me</h1>
            <p id="in-depth-text" class="lead"> 
                My name is Carlos Rosario and i'm a Software Engineer. I'm pretty sure the term "Full Stack Developer" also applies to me because since i started programming for a living i have worked in every area of the traditional technology stack. I have experience with Server and Client side development, SQL Databases, NoSQL Databases, Linux Servers, Windows Servers, Android, Various source control tools such as Git and SVN, RESTful Services, gathering requirements, Third party tools/API's, Shell Scripting, Working directly with clients, and I have even written code for Mainframe environment (UGH.). All of this mumbo jumbo is to say that i've never been in the position where my job was to only worry about UI or just worry about the database. 
                
                <br><br><i class="fa fa-square square-divider" aria-hidden="true"></i><br><br>
                
                My experiences have trained me to become a quick study in the crazy and awesome world of software development. With that being said, the majority of my professional experience so far has been in back-end development and the majority of my academic experience has been in front-end and mobile development with the leveraging of various third party API's. Recently i've been using my free time to catch up on the latest trends in Web Development - something i'd like to do professionally one day.
                
                <br><br><i class="fa fa-square square-divider" aria-hidden="true"></i><br><br>
                
                I am currently a graduate student at the University of North Carolina in Charlotte and will soon graduate in December 2016 (this is only possible because i decided to take a few months off work - otherwise i would be in school for another 2-2.5 years). I've enjoyed my time in graduate school and learned some pretty cool things like parallel computing, android development, and how to communicate effectively. 
                
                <br><br><i class="fa fa-square square-divider" aria-hidden="true"></i><br><br>
                
                Besides programming professionally, programming for academic projects, or programming on my down time i like to tinker with random stuff that i have laying around. I'm currently working on taking three old laptops that i have and creating a cluster with them. I don't really have any plans for the cluster but, it'll be cool to do it. I'm also interested in learning about electronics whenever i find some extra time. Some of my normal people hobbies include: cooking, walking on the greenways in Charlotte, hanging out with my girlfriend, playing Fallout 4/Borderlands, watching UFC, discovering new music, and playing with different linux distributions <i class="fa fa-linux" aria-hidden="true"></i> . 
            </p>
        </div>
        
        <!-- Education Section -->
        <div id="education" class="container-fluid">
            <div class="container">
                <h1 id="education-header" class="wow fadeInLeft" data-wow-delay=".5s">My Education</h1>
                <p id="education-summary" class="lead education-text wow fadeInLeft" data-wow-delay=".5s" data-wow-duration="2s">I am currently earning my masters degree in Computer Science at UNCC - I will be graduating in December 2016! When it's all said and done it will have taken me 2.5 years to complete the program. Not too bad considering i was a full time developer for the first 80% of my time as a graduate student. I have also earned bachelors degrees in Mathematics and Computer Science in December 2012 from the University of South Carolina - Upstate</p>
                
                <p class="lead education-text wow fadeInLeft" data-wow-delay=".5s" data-wow-duration="2s">Some of my favorite classes:</p>
                <ul class="education-text wow fadeInLeft" data-wow-delay=".5s" data-wow-duration="2s">
                    <li>Algorithms and Data Structures</li>
                    <li>Parallel Computing</li>
                    <li>Machine Learning</li>
                    <li>Android &amp; iOS Mobile Development</li>
                    <li>Digital Image Processing</li>
                </ul>
            
                <h5 id="education-tools-header" class="wow fadeInLeft" data-wow-delay=".5s" data-wow-duration="2s">Some of the tools i have used during my time at UNCC:</h5>
                <div class="card-deck-wrapper">
                    <div class="card-deck card-colors">
                        <div class="card card-details wow fadeInLeft" data-wow-delay=".5s" data-wow-duration="2s" data-placement="bottom" data-content="test">
                            <div id="android-pop" class="hvr-pop">
                                <img class="card-img-top img-fluid" src="../images/android-studio-1.png" alt="Card image cap">
                                <div class="card-block">
                                    <h5 class="card-title">Android Developer Studio</h5>
                                    <p id="android-text" class="card-text hidden"><small class="text-muted">I used Android Developer Studio to develop various android applications. I also used the genymotion emulator to test applications. The majority of my experience is with native android development but, i have also dabbled in hybrid technology including Framework7 and Cordova. </small></p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-details wow fadeInUp" data-wow-delay=".5s" data-wow-duration="2s" data-placement="bottom" data-content="test">
                            <div id="firebase-pop" class="hvr-pop">
                                <img class="card-img-top img-fluid" src="../images/Firebase.png" alt="Card image cap">
                                <div class="card-block">
                                    <h5 class="card-title">Firebase NoSQL Database</h5>
                                    <p id="firebase-text" class="card-text hidden"><small class="text-muted">I used Firebase as the data store for several android projects. The relative ease of use was something i really enjoyed about using Firebase. My primary experiences with Firebase were standard CRUD applications and user authentication. </small></p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-details wow fadeInUp" data-wow-delay=".5s" data-wow-duration="2s" data-placement="bottom" data-content="test">
                            <div id="git-pop" class="hvr-pop">
                                <img class="card-img-top img-fluid" style="padding:15px;" src="../images/git_logo.png" alt="Card image cap">
                                <div class="card-block">
                                    <h5 class="card-title">Git Source Control</h5>
                                    <p id="git-text" class="card-text hidden"><small class="text-muted">I used git for all my source control needs while in school. I have a bunch of code on my github - <a href="http://www.github.com/CarlosRosario">feel free to take a look if you like <i class="fa fa-github" aria-hidden="true"></i></a></small></p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-details wow fadeInUp" data-wow-delay=".5s" data-wow-duration="2s" data-placement="bottom" data-content="test">
                            <div id="swift-pop" class="hvr-pop">
                                <img class="card-img-top img-fluid" src="../images/swift_logo_4.png" alt="Card image cap">
                                <div class="card-block">
                                    <h5 class="card-title">Swift Programming Language</h5>
                                    <p id="swift-text" class="card-text hidden"><small class="text-muted">I learned the Swift Programming Language in my iOS Development class. I also learned my way around the XCode IDE. I hope to eventually also teach myself Objective-C</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-details wow fadeInRight" data-wow-delay=".5s" data-wow-duration="2s" data-placement="bottom" data-content="test">
                            <div id="hadoop-pop" class="hvr-pop">
                                <img class="card-img-top img-fluid" style="padding:15px" src="../images/hadoop-logo.png" alt="Card image cap">
                                <div class="card-block">
                                    <h5 class="card-title">Apache Hadoop</h5>
                                    <p id="hadoop-text" class="card-text hidden"><small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget iaculis lorem, non sodales urna. Nunc lacinia mauris a nulla tempus, et cursus libero ornare. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        
        <!-- Break section between education and experience - I would LIKE to get a higher quality image of my home setup for this section but, i'll live with what i have for now. -->
        <div id="content-break" class="container-fluid">
            <p class="lead">Check out my home setup (If you would like to lend me a digital camera please let me know ._.) - You can see this website on the rightmost screen. /Inception?</p>
        </div>
        
        <!-- Professional Experience Section -->
        <div id="experience" class="container">
            <h1 id="experience-header">Professional Experience</h1>
            <div class="experience-wrapper">
                <div class="row wow fadeInLeft" data-wow-delay=".5s" data-wow-duration="2s">
                    <div class="col-md-4">
                        <h4>Nascent Technology</h4>
                        <p class="experience-period">Feb 2015 - Mar 2016</p>
                    </div>
                    <div class="col-md-8">
                        <p>
                            <strong>Software Developer</strong>
                            <br>
                            <span class="experience-description-text">
                                Nascent Technology is a small technology company headquarted in Charlotte North Carolina with strong roots in the intermodal industry. As a software developer i spent my first couple of months working on bug fixes, modifying existing functionality, and implementing new features
                                for existing projects. After that, i primarily (and successfully) worked on the Long Beach California Terminal automated gate project. 
                                The ultimate goal of any automated gate project such as this one is to allow truck drivers to get in/out of the facility as fast as possible. 
                                Better times = more trips = more money. The project is built on Microsoft's .NET Stack. I wrote C#/VB.NET code with Visual Studio 2013 for various windows services, desktop applications, and web services that all summed to the meat and potatoes of the project. On top of this i also updated/created new T-SQL Stored Procedures as necessary. I frequently remotely connected to various Linux based hardware devices in order to set configurations, do research, and troubleshoot issues. Beyond my development duties, i regularly communicated directly with the technology team at Long Beach California Terminal in order to resolve issues, discuss future goals, and implement new features quickly. Other technologies/tools that i used in my day-to-day included: sockets, JSON/XML RESTful services, Slack, Oxygen Editor, WinForms, Microsoft SQL Server, and SVN/TFS source control tools. 
                            </span>
                        </p>
                    </div>
                </div>
                <br>
                <div class="row wow fadeInRight" data-wow-delay=".5s" data-wow-duration="2s">
                    <div class="col-md-4">
                        <h4>Wells Fargo</h4>
                        <p class="experience-period">Apr 2013 - Feb 2015</p>
                    </div>
                    <div class="col-md-8">
                        <p>
                            <strong>Application Programmer/Analyst</strong>
                            <br>
                            <span class="experience-description-text">
                                Successfully developed, tested, implemented, and provided post-implementation support for various document transformation projects. Projects involved transforming customer documents from one format to a valid printer format (PDF to AFP for example) in order to print certain documents on certain printers (fan-fold vs cutsheet), adding information to existing documents such as barcodes and logos, splitting/merging documents, and uploading customer documents to online archival locations. This position made me realize and appreciate the hard work it takes just to get your credit card statement in the mail every month (and only get it once!). It also made me realize that the print industry is not as simple as file -> print. Some of the tools and technologies used to implement projects included: RHEL servers, Java (using JAXB, Hibernate, Guava, and iText), Bash scripting, Perl Scripting, Cron jobs, Microsoft SQL Server, and various third party tools. Some of my other responsibilities included the sizing, documenting, participating in weekly project meetings, creating/submitting change orders, and participating in scheduled disaster recovery exercises. 
                            </span>
                        </p>
                    </div>
                </div>     
                <br>
                <div class="row wow fadeInLeft" data-wow-delay=".5s" data-wow-duration="2s">
                    <div class="col-md-4">
                        <h4>American Credit Acceptance</h4>
                        <p class="experience-period">Oct 2012 - Apr 2013</p>
                    </div>
                    <div class="col-md-8">
                        <p>
                            <strong>Intern</strong>
                            <br>
                            <span class="experience-description-text">
                                As an intern at American Credit Acceptance my main duty was to create various dashboard applications to be displayed on large screen monitors across the four main buildings for the company. I created these dashboards using Silverlight + Telerik controls, WCF web services, and SQL queries. Some of my other duties included installing Windows OS on various computers and setting up TV monitors to display the dashboard applications i was writing. 
                            </span>
                        </p>
                    </div>
                </div>
                <br>
                <div class="row wow fadeInRight" data-wow-delay=".5s" data-wow-duration="2s">
                    <div class="col-md-4">
                        <h4>University of South Carolina Upstate</h4>
                        <p class="experience-period">Aug 2011 - Jun 2012</p>
                    </div>
                    <div class="col-md-8">
                        <p>
                            <strong>Robotics Research Assistant</strong>
                            <br>
                            <span class="experience-description-text">
                                Continued existing work on a "pick-and-place" application to be used in industry via voice commands and hand gestures. Using OpenCV, XML, and V+ i was able to make robotic arms in the robotics lab pick/place objects by verbal command. It was pretty freaking cool. I wish i could have kept working on the project but, the professor in charge of the project was promoted and moved to another university.
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Skills Section -->
        <div id="skills-wrapper" class="container-fluid">
            <div id="skills" class="container-fluid">
                <h1 id="skills-header">Skills <i class="fa fa-star" aria-hidden="true"></i></h1>
                <div class="row">
                    <div class="col-md-9">
                        <canvas id="mySkills" width="20" height="10" ></canvas> 
                    </div>
                    <div class="col-md-3">
                        <div id="skills-tools" class="hvr-glow card card-block wow fadeInRight" data-wow-delay="1s">
                          <h3 id="skills-tools-title" class="card-title">Tools I'm well versed in</h3>
                          <ul id="tools-list">
                              <li>Eclipse</li>
                              <li>Visual Studio</li>
                              <li>Brackets</li>
                              <li>Android Dev Studio</li>
                              <li>XCode</li>
                              <li>Cygwin</li>
                              <li>Microsoft SQL Server/MySQL</li>
                              <li>Fiddler/Postman</li>
                              <li>FileZilla/FireFTP</li>
                              <li>Cavaj/ILSpy decompilers</li>
                              <li>VirtualBox</li>
                              <li>SSH/Couple SSH Clients (Putty/SuperPutty)</li>
                              <li>UltraVNC</li>
                              <li>Slack</li>
                              <li>Twitter Bootstrap</li>
                              <li>..and more</li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contact Section -->
        <div id="contact" class="container-fluid">
            <div class="container">
                <h1>Contact</h1>
                <div>
                    <div style="display:inline-block;">
                        <p class="lead wow fadeInUp">"I have no special talents. I am only passionately curious."</p>
                        <p class="wow fadeInUp" data-wow-delay=".4s" style="text-align:center;">- Albert Einstein</p>
                    </div>
                </div>
                
                <br><br>
            
                <form class="wow fadeInRightBig" data-wow-delay=".4s" data-wow-duration="2s" id="contact-form" method="post">
                  <fieldset id="firstFieldset" class="form-group">
                      <div class="row">
                          <div class="col-xs-6">
                              <input type="email" class="form-control" id="email" name="email" placeholder="Email*">
                          </div>
                          <div class="col-xs-6">
                              <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name*">
                          </div>
                      </div>
                  </fieldset>
                  <fieldset id="secondFieldSet" class="form-group">
                    <div class="row">
                        <div class="col-xs-12">
                            <textarea class="form-control" id="message" rows="5" name="message" placeholder="Message*"></textarea>    
                        </div>
                    </div>
                  </fieldset>
                  <button id="sendEmailButton" type="submit" id="submit" class="btn pull-left hvr-pop">Send!</button>    
              </form>
              <br><br>
              <div id="error"><? echo $error.$successMessage ?></div>  
            </div>
        </div>
        
        <!-- Footer -->
        <div id="footer">
            <a href="http://www.linkedin.com" target="_blank" ><i class="fa fa-linkedin-square fa-4x fa-fw footer-icon" aria-hidden="true"></i></a>
            <a href="http://www.github.com/CarlosRosario" target="_blank"><i class="fa fa-github fa-4x fa-fw footer-icon" aria-hidden="true"></i></a>
        </div>
        
        <!-- Custom js -->
        <script type="text/javascript" src="../js/rosario.js"></script>
        <script src="../js/smoothscroll.min.js"></script>
    </body>
</html>