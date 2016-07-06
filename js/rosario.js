// Temporary code to show me what the current width of the viewport is - in pixels
$(window).resize(function(){
    var windowWidthInPixels = window.innerWidth;
    $("#width-in-pixels").html(windowWidthInPixels + " Pixels");
});

// Initialize WOW.js
new WOW().init();

// Education card hover effects
$("#android-pop").hover(
    function(){
        $("#android-text").removeClass("hidden");
    }, 
    function(){
        $("#android-text").addClass("hidden");
});

$("#firebase-pop").hover(
    function(){
        $("#firebase-text").removeClass("hidden");
    }, 
    function(){
        $("#firebase-text").addClass("hidden");
});

$("#swift-pop").hover(
    function(){
        $("#swift-text").removeClass("hidden");
    }, 
    function(){
        $("#swift-text").addClass("hidden");
});

$("#git-pop").hover(
    function(){
        $("#git-text").removeClass("hidden");
    }, 
    function(){
        $("#git-text").addClass("hidden");
});

$("#hadoop-pop").hover(
    function(){
        $("#hadoop-text").removeClass("hidden");
    }, 
    function(){
        $("#hadoop-text").addClass("hidden");
});

/* Skills bar chart stuff */
var chartContext = document.getElementById("mySkills");
var chartData = {
    type: 'bar',
    data: {
        labels: ["Agile", "Android", "C++", "Googling", "HTML/CSS", "Java", "JavaScript/jQuery", "JSON/XML", "ksh/Bash Scripting", "Linux", ".NET", "PHP", "RESTful Web Services", "Swift", "SQL/Database"],
        datasets: [{
            label: '',
            data: [3,4,2,6,3,5,3,5,5,4,4,1,4,3,4],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255,128,171, 0.2)',
                'rgba(149, 165, 166, 0.2)',
                'rgba(52, 73, 94, 0.2)',
                'rgba(231, 76, 60, 0.2)',
                'rgba(46, 204, 113, 0.2)',
                'rgba(236, 240, 241, 0.2)',
                'rgba(241, 196, 15, 0.2)',
                'rgba(41, 128, 185, 0.2)',
                'rgba(142, 68, 173, 0.2)'
                
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,128,171, 1)',
                'rgba(149, 165, 166, 1)',
                'rgba(52, 73, 94, 1)',
                'rgba(231, 76, 60, 1)',
                'rgba(46, 204, 113, 1)',
                'rgba(236, 240, 241, 1)',
                'rgba(241, 196, 15, 1)',
                'rgba(41, 128, 185, 1)',
                'rgba(142, 68, 173, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            xAxes: [{
                gridLines : {
                    display : false
                },
                ticks : {
                    fontColor : "#FFF"
                }
            }],
            yAxes: [{
                gridLines:{
                    display : false
                },
                ticks: {
                    beginAtZero:true,
                    callback: function(value, index, values){
                        switch(value){
                            case 0:
                                return "No Skills";
                            case 1: 
                                return "Limited Knowledge";
                            case 2:
                                return "Can get by";
                            case 3:
                                return "Working Knowledge";
                            case 4:
                                return "Really Good";
                            case 5:
                                return "Expert";
                            case 6:
                                return "Master - could not possible learn anything more";       
                        }
                    },
                    fontColor: "#FFF"
                }
            }]
        }
    }
};

var inView = false;
function isScrolledIntoView(el) {
    var elemTop = el.getBoundingClientRect().top;
    //console.log("Top:" + elemTop);
    var elemBottom = el.getBoundingClientRect().bottom;
    //console.log("Bottom:" + elemBottom);
    //console.log("Window.InnerHeight:" + window.innerHeight);
    //var isVisible = (elemTop >= 0) && (elemBottom <= window.innerHeight);
    var isVisible = (elemTop < (window.innerHeight)) && elemBottom >= 0
    return isVisible;
}

$(window).scroll(function() {
    if (isScrolledIntoView(document.getElementById("mySkills"))) {
        if (inView) { return; }
        inView = true;
        setTimeout(revealChart, 1000);
    } else {
        inView = false;  
    }
});

function revealChart(){
    Chart.defaults.global.legend.display = false; // Remove legend 
    Chart.defaults.global.tooltips.enabled = false; // Remove tooltips
    new Chart(chartContext, chartData);  
}

/* Contact email stuff */

$("form").submit(function(e){
    var error = "";

    if($("#email").val() == ""){
        error += "<p>Oops! The email field is required</p>";
    }

    if($("#fullname").val() == ""){
        error += "<p>Oops! The subject field is required</p>";
    }

    if($("#message").val() == ""){
        error += "<p>Oops! The content field is required</p>";
    }

    if(error != ""){
        $("#error").html('<div class="alert alert-danger" role="alert"><strong> ' + error + ' </strong>Address the above issues and try again!</div>');
        return false;
    } else {
        
        // Need to add code that will submit form but prevent page from reloading. Probably some combination of ajax + e.preventDefault()
        
        
        return true;
    }
});

/* Animated scroll when clicking navs - i added the "- 60" so that auto-scrolling is more accurate*/
$("#top-nav").click(function() {
    $('html, body').animate({
        scrollTop: $("#quick-intro").offset().top - 60
    }, 1000);
});
$("#more-nav").click(function() {
    $('html, body').animate({
        scrollTop: $("#in-depth").offset().top - 60
    }, 1000);
});
$("#edu-nav").click(function(){
    $('html, body').animate({
        scrollTop: $("#education").offset().top - 60
    }, 1000);
});
$("#exp-nav").click(function(){
    $('html, body').animate({
        scrollTop: $("#experience").offset().top - 60
    }, 1000);
});
$("#skills-nav").click(function(){
    $('html, body').animate({
        scrollTop: $("#skills-wrapper").offset().top - 60
    }, 1000);
});
$("#skills-nav").click(function(){
    $('html, body').animate({
        scrollTop: $("#skills-wrapper").offset().top - 60
    }, 1000);
});
$("#contact-nav").click(function(){
    $('html, body').animate({
        scrollTop: $("#contact").offset().top - 60
    }, 1000);
});