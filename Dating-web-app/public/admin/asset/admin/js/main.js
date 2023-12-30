var eyeBtn = Array.from(document.querySelectorAll(".passDisplay"));
eyeBtn.forEach((e) => {
  e.addEventListener("click", function () {
    let passwordWrapper = e.closest(".passwordWrapper");
    let passInput = passwordWrapper.querySelector("input");
    if (passInput.classList.contains("passInput")) {
      if (passInput.type == "password") {
        passInput.setAttribute("type", "text");
        this.setAttribute(
          "class",
          "bi bi-eye-fill enter-icon right-icon position-absolute passDislay"
        );
      } else {
        passInput.setAttribute("type", "password");
        this.setAttribute(
          "class",
          "bi bi-eye-slash enter-icon right-icon position-absolute passDislay"
        );
      }
    }
  });
});

window.addEventListener("DOMContentLoaded", (event) => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }
});

var sideToggle = document.body.querySelector("#navbarDropdown");
var getToggle = document.querySelector(".dropdown-menu");
sideToggle.addEventListener("click", function () {
  getToggle.classList.toggle("show");
});

var sideToggles = document.body.querySelector("#notification");
var getToggles = document.querySelector(".dropdown-notifcation");
sideToggles.addEventListener("click", function () {
  getToggles.classList.toggle("show");
});



// $('#navbarDropdown').click(function(event) {
//   $("").show();

//   disabledEventPropagation(event);
//   //console.log('2nd event');

// });


// $('#notification').click(function(event) {
//   $(".dropdown-notifcation").show();

//   disabledEventPropagation(event);
//   //console.log('2nd event');

// });

// $('.dropdown-menu').click(function(event) {

//   disabledEventPropagation(event);
//   //console.log('3rd event');

// });

// $('.dropdown-notifcation').click(function(event) {

//   disabledEventPropagation(event);
//   //console.log('3rd event');

// });


// $(document).click(function() {
//   $(".dropdown-menu").hide();
//   $(".dropdown-notifcation").hide();
//   //console.log('1st event');

// });


function disabledEventPropagation(event) {
  if (event.stopPropagation) {
    event.stopPropagation();
  } else if (window.event) {
    window.event.cancelBubble = true;
  }
}




jQuery(".edit").click(function () {
  jQuery("#edit").removeClass("text-right disabled border-0 px-0");
  jQuery("#edits").removeClass("text-right disabled border-0 px-0");
  jQuery(this).attr("disabled", true);
  jQuery("#edit").addClass("text-center");
  jQuery("#edits").addClass("text-center");
  jQuery(this).hide();
  jQuery(".update").show();
});

jQuery(".update").click(function () {
  jQuery("#edit").addClass("text-right disabled border-0 px-0");
  jQuery("#edits").addClass("text-right disabled border-0 px-0");
  jQuery("#edit").removeClass("text-center");
  jQuery("#edits").removeClass("text-center");
  jQuery(this).attr("disabled", false);
  jQuery(this).hide();
  jQuery(".edit").show();
});

function loadFile(event) {
  var total_file = document.getElementById("file").files.length;
  for (var i = 0; i < total_file; i++) {
    $("#output").append(
      "<img src='" +
      URL.createObjectURL(event.target.files[i]) +
      "'>"
    );
    // image.src = URL.createObjectURL(event.target.files[i]);
  }
}

jQuery('#profilePicture').click(function () {
  jQuery(this).URL.createObjectURL(target.files[i]);
});
// jQuery('#output')

// image box remove
jQuery('.imageuploader button').click(function () {
  jQuery(this).parent('.imageuploader').remove();
});

// delete video box on listing 

jQuery('.deleteBtn button').click(function () {
  jQuery(this).parents('.col-md-4').remove();
});


// custom game box 

jQuery(document).ready(function () {
  jQuery('.checkboxSquare').click(function () {
    let boxValue = jQuery(this).prop('checked');
    if (boxValue == true) {
      jQuery(this).next('.checkMark').addClass('bg-checked');
    } else {
      jQuery(this).next('.checkMark').removeClass('bg-checked');
    }
  })
})

function generateRandomNumbers(numberX, numberY) {
  var numbers = [];
  var verticalNumber = [];
  while (numbers.length < 10) {
    var randomNumber = Math.floor(Math.random() * 10);
    if (numbers.indexOf(randomNumber) === -1) {
      numbers.push(randomNumber);
    }
  }

  while (verticalNumber.length < 10) {
    var randomNumber = Math.floor(Math.random() * 10);
    if (verticalNumber.indexOf(randomNumber) === -1) {
      verticalNumber.push(randomNumber);
    }
  }




  var cells = document.getElementsByClassName(numberX);
  for (var i = 0; i < cells.length; i++) {
    cells[i].textContent = numbers[i];
  }

    // Cycle through the random numbers and populate the cells

    var cellIndex = 0;

    jQuery('.gameBox').each(function () {

      var randomNumber = numbers[cellIndex];

      if(numberX == 'firstXnumber') {
        jQuery(this).attr('data-q1-x', randomNumber);
        cellIndex = (cellIndex + 1) % 10;
      }
      if(numberX == 'secondXnumber') {
        jQuery(this).attr('data-q2-x', randomNumber);
        cellIndex = (cellIndex + 1) % 10;
      }
      if(numberX == 'thirdXnumber') {
        jQuery(this).attr('data-q3-x', randomNumber);
        cellIndex = (cellIndex + 1) % 10;
      }

      if(numberX == 'fourthXnumber') {
        jQuery(this).attr('data-q4-x', randomNumber);
        cellIndex = (cellIndex + 1) % 10;
      }

    });

  var cells = document.getElementsByClassName(numberY);
  for (var i = 0; i < cells.length; i++) {
    cells[i].textContent = verticalNumber[i];
  }

  jQuery('.gameBox').each(function () {
    let verticalFirstCordinates = jQuery(this).parents('tr').find('.firstYnumber').text();
    jQuery(this).attr('data-q1-y', verticalFirstCordinates);

    // second y quard 

    let verticalSecondCordinates = jQuery(this).parents('tr').find('.secondYnumber').text();
    jQuery(this).attr('data-q2-y', verticalSecondCordinates);

    // third y quard

    let verticalThirdCordinates = jQuery(this).parents('tr').find('.thirdYnumber').text();
    jQuery(this).attr('data-q3-y', verticalThirdCordinates);

    // fourth y quard

    let verticalFourthCordinates = jQuery(this).parents('tr').find('.fourthYnumber').text();
    jQuery(this).attr('data-q4-y', verticalFourthCordinates);
  })

}

jQuery('.clearBtn').click(function () {
  jQuery('.clear').text(0);
})
