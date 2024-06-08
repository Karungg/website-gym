$(document).ready(function () {
  $(
    '.wizard-pane input[type="text"], .wizard-pane input[type="password"], .wizard-pane textarea, .wizard-pane input[type="radio"], .wizard-pane input[type="file"], .wizard-pane input[type="number"], .wizard-pane input[type="date"], .wizard-pane input[type="email"]'
  ).on("focus", function () {
    $(this).removeClass("is-invalid");
  });
});

function validate(button) {
  var wizardSection = $(button).closest(".wizard-pane");
  var valid = true;
  $(wizardSection)
    .find("input")
    .each(function () {
      if ($(this).val() == "") {
        valid = false;
        $(this).addClass("is-invalid");
        if ($(".wizard-pane textarea").val() == "") {
          $(".wizard-pane textarea").addClass("is-invalid");
        }
        if ($(".wizard-pane #no_telp").val().length < 10) {
          $(".wizard-pane #no_telp").addClass("is-invalid");
        }
        if ($(".wizard-pane #no_ktp").val().length < 16) {
          $(".wizard-pane #no_ktp").addClass("is-invalid");
        }
      }
    });
  if (valid == true) {
    showNextWizardSection(wizardSection);
  }
}

function showNextWizardSection(wizardSection) {
  var wizard1 = $(".wizard-step").eq(0);
  var wizard2 = $(".wizard-step").eq(1);
  var wizard3 = $(".wizard-step").eq(2);

  $(".wizard-pane").addClass("d-none");
  $(wizardSection).next(".wizard-pane").removeClass("d-none");

  if (wizard1.hasClass("wizard-step-active")) {
    wizard1.removeClass("wizard-step-active");
    wizard2.addClass("wizard-step-active");
  } else if (wizard2.hasClass("wizard-step-active")) {
    wizard2.removeClass("wizard-step-active");
    wizard3.addClass("wizard-step-active");
  }
}

function showPrevious(button) {
  var wizard1 = $(".wizard-step").eq(0);
  var wizard2 = $(".wizard-step").eq(1);
  var wizard3 = $(".wizard-step").eq(2);

  var wizardSection = $(button).closest(".wizard-pane");
  $(".wizard-pane").addClass("d-none");
  $(wizardSection).prev(".wizard-pane").removeClass("d-none");

  if (wizard2.hasClass("wizard-step-active")) {
    wizard2.removeClass("wizard-step-active");
    wizard1.addClass("wizard-step-active");
  } else if (wizard3.hasClass("wizard-step-active")) {
    wizard3.removeClass("wizard-step-active");
    wizard2.addClass("wizard-step-active");
  }
}
