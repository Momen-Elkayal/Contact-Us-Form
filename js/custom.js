/* global $ , alert , console */

$(function () {
  "use strict";
  var userError = true; // setting Error status
  var emailError = true;
  var phoneError = true;
  var messegeError = true;

  // Username Error
  $(".username").blur(function () {
    if ($(this).val().length <= 2) {
      //Show Error
      $(this).css("border", "1px solid #f00");
      $(this).parent().find(".custom-alert").fadeIn("200");
      $(this).parent().find(".asterisx").fadeIn("100");
      userError = true;
    } else {
      // No Error
      $(this).css("border", "1px solid #080");
      $(this).parent().find(".custom-alert").fadeOut("200");
      $(this).parent().find(".asterisx").fadeOut("100");
      userError = false;
    }
  });

  // Email Error
  $(".email").blur(function () {
    if ($(this).val().length == 0) {
      $(this).css("border", "1px solid #f00");
      $(this).parent().find(".custom-alert").fadeIn("200");
      $(this).parent().find(".asterisx").fadeIn("100");
      emailError = true;
    } else {
      $(this).css("border", "1px solid #080");
      $(this).parent().find(".custom-alert").fadeOut("200");
      $(this).parent().find(".asterisx").fadeOut("100");
      emailError = false;
    }
  });

  // Phone Error
  $(".phone").blur(function () {
    if ($(this).val().length < 10) {
      $(this).css("border", "1px solid #f00");
      $(this).parent().find(".custom-alert").fadeIn("200");
      $(this).parent().find(".asterisx").fadeIn("100");
      phoneError = true;
    } else {
      $(this).css("border", "1px solid #080");
      $(this).parent().find(".custom-alert").fadeOut("200");
      $(this).parent().find(".asterisx").fadeOut("100");
      phoneError = false;
    }
  });

  // Messege Error
  $(".messege").blur(function () {
    if ($(this).val().length < 15) {
      $(this).css("border", "1px solid #f00");
      $(this).parent().find(".custom-alert").fadeIn("200");
      $(this).parent().find(".asterisx").fadeIn("100");
      messegeError = true;
    } else {
      $(this).css("border", "1px solid #080");
      $(this).parent().find(".custom-alert").fadeOut("200");
      $(this).parent().find(".asterisx").fadeOut("100");
      messegeError = false;
    }
  });
  // Submit Form Validation
  $('.contact-form').submit(function (e) {
    if (
      userError === true ||
      emailError === true ||
      phoneError === true ||
      messegeError === true
    ) {
      e.preventDefault();
      $('.username, .email, .phone, .messege').blur();
    }
  });
});
