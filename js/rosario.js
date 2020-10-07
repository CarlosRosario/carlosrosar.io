// Temporary code to show me what the current width of the viewport is - in pixels
$(window).resize(function () {
  var windowWidthInPixels = window.innerWidth;
  $('#width-in-pixels').html(windowWidthInPixels + ' Pixels');
});

// Initialize WOW.js
new WOW().init();

// Education card hover effects
$('#git-pop').hover(
  function () {
    $('#git-text').removeClass('hidden');
  },
  function () {
    $('#git-text').addClass('hidden');
  }
);

$('#firebase-pop').hover(
  function () {
    $('#firebase-text').removeClass('hidden');
  },
  function () {
    $('#firebase-text').addClass('hidden');
  }
);

$('#docker-pop').hover(
  function () {
    $('#docker-text').removeClass('hidden');
  },
  function () {
    $('#docker-text').addClass('hidden');
  }
);

$('#android-pop').hover(
  function () {
    $('#android-text').removeClass('hidden');
  },
  function () {
    $('#android-text').addClass('hidden');
  }
);

$('#matlab-pop').hover(
  function () {
    $('#matlab-text').removeClass('hidden');
  },
  function () {
    $('#matlab-text').addClass('hidden');
  }
);

/* Skills bar chart stuff */
var chartContext = document.getElementById('mySkills');
var chartData = {
  type: 'bar',
  data: {
    labels: [
      'Java',
      'Spring Boot',
      'Angular',
      'HTML/CSS',
      'Javascript/Typescript',
      'Node.js',
      'Jenkins',
      'Shell Scripting',
      'Linux',
      'git',
      'AWS (currently learning)',
      'Docker',
      'Kubernetes',
      'SQL',
      'Googling',
    ],
    datasets: [
      {
        label: '',
        data: [5, 5, 4, 3, 4, 3, 3, 4, 4, 5, 2, 3, 2, 3, 6],
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
          'rgba(142, 68, 173, 0.2)',
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
          'rgba(142, 68, 173, 1)',
        ],
        borderWidth: 1,
      },
    ],
  },
  options: {
    scales: {
      xAxes: [
        {
          gridLines: {
            display: false,
          },
          ticks: {
            fontColor: '#FFF',
          },
        },
      ],
      yAxes: [
        {
          gridLines: {
            display: false,
          },
          ticks: {
            beginAtZero: true,
            callback: function (value, index, values) {
              switch (value) {
                case 0:
                  return 'No Skills';
                case 1:
                  return 'Limited Knowledge';
                case 2:
                  return 'Can get by with help from google';
                case 3:
                  return 'Working Knowledge';
                case 4:
                  return 'Really Good';
                case 5:
                  return 'Seasoned Veteran';
                case 6:
                  return 'Mastered';
              }
            },
            fontColor: '#FFF',
          },
        },
      ],
    },
  },
};

var inView = false;
function isScrolledIntoView(el) {
  var elemTop = el.getBoundingClientRect().top;
  //console.log("Top:" + elemTop);
  var elemBottom = el.getBoundingClientRect().bottom;
  //console.log("Bottom:" + elemBottom);
  //console.log("Window.InnerHeight:" + window.innerHeight);
  //var isVisible = (elemTop >= 0) && (elemBottom <= window.innerHeight);
  var isVisible = elemTop < window.innerHeight && elemBottom >= 0;
  return isVisible;
}

$(window).scroll(function () {
  if (isScrolledIntoView(document.getElementById('mySkills'))) {
    if (inView) {
      return;
    }
    inView = true;
    setTimeout(revealChart, 1000);
  } else {
    inView = false;
  }
});

function revealChart() {
  Chart.defaults.global.legend.display = false; // Remove legend
  Chart.defaults.global.tooltips.enabled = false; // Remove tooltips
  new Chart(chartContext, chartData);
}

/* Contact email stuff */

$('#contact-form').submit(function (e) {
  var error = '';

  if ($('#email').val() == '') {
    error += '<p>Oops! The email field is required</p>';
  }

  if ($('#fullname').val() == '') {
    error += '<p>Oops! The subject field is required</p>';
  }

  if ($('#message').val() == '') {
    error += '<p>Oops! The content field is required</p>';
  }

  if (error != '') {
    $('#error').html(
      '<div class="alert alert-danger" role="alert"><strong> ' +
        error +
        ' </strong>Address the above issues and try again!</div>'
    );
    return false;
  } else {
    e.preventDefault();
    var data = $(this).serialize();
    $.ajax({
      url: '../html/contact.php',
      type: 'POST',
      data: data,
      success: function (data) {
        console.log(
          'success callback reached data from server: ' + data.status
        );
        if (data.status == 'success') {
          $('#error').html(
            '<div class="alert alert-success" role="alert"><strong>Awesome!</strong>"I\'ll get back to you ASAP"</div>'
          );
        } else if (data.status === 'error') {
          $('#error').html(
            '<div class="alert alert-danger" role="alert"><p><strong>Your Message could not be sent. Please try again later.</div>'
          );
        }
        // alert("ajax post was successful - sent the following data: " + data);
      },
      error: function (data, e) {
        //                console.log("error callback reached " + data);
        //                console.log(e);
        $('#error').html(
          '<div class="alert alert-danger" role="alert">Unable to send your message, please try again!</div>'
        );
        if (data.status == 0) {
          alert('You are offline!!\n Please Check Your Network.');
        } else if (data.status == 404) {
          alert('Requested URL not found.');
        } else if (data.status == 500) {
          alert('Internel Server Error.');
        } else if (e == 'parsererror') {
          alert('Error.\nParsing JSON Request failed. - data sent = ' + data);
          console.log(e);
        } else if (e == 'timeout') {
          alert('Request Time out.');
        } else {
          alert('Unknown Error.\n' + e.responseText);
        }
      },
    });
    return true;
  }
});

/* Animated scroll when clicking navs - i added the "- 60" so that auto-scrolling is more accurate*/
$('#top-nav').click(function () {
  $('html, body').animate(
    {
      scrollTop: $('#quick-intro').offset().top - 60,
    },
    1000
  );
});
$('#more-nav').click(function () {
  $('html, body').animate(
    {
      scrollTop: $('#in-depth').offset().top - 60,
    },
    1000
  );
});
$('#edu-nav').click(function () {
  $('html, body').animate(
    {
      scrollTop: $('#education').offset().top - 60,
    },
    1000
  );
});
$('#exp-nav').click(function () {
  $('html, body').animate(
    {
      scrollTop: $('#experience').offset().top - 60,
    },
    1000
  );
});
$('#skills-nav').click(function () {
  $('html, body').animate(
    {
      scrollTop: $('#skills-wrapper').offset().top - 60,
    },
    1000
  );
});
$('#skills-nav').click(function () {
  $('html, body').animate(
    {
      scrollTop: $('#skills-wrapper').offset().top - 60,
    },
    1000
  );
});
$('#contact-nav').click(function () {
  $('html, body').animate(
    {
      scrollTop: $('#contact').offset().top - 60,
    },
    1000
  );
});
