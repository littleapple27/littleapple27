$(function () {
  // Navbar Collapse
  $(".navbar-collapse a").click(function () {
    $(".navbar-collapse").collapse("hide");
  });

  //ReCaptcha
  function onSubmit(token) {
    document.getElementById("contact-form").submit();
  }

  //Get the button
  var scrollButton = document.getElementById("scrollButton");

  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (
      document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20
    ) {
      scrollButton.style.display = "block";
    } else {
      scrollButton.style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
});
