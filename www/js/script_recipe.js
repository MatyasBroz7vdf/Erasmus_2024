const api_url = "http://localhost/smartcook2"

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("recipe-category-btns").addEventListener("click", function(event) {
      if (event.target.tagName === "BUTTON") {
          window.location.href = api_url;
      }
  });
});
/*buttons.forEach((button) => {
              button.classList.remove("active");
          });
          event.target.classList.add("active");
          let buttons = document.querySelectorAll("#recipe-category-btns button");*/
