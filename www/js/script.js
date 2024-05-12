const api_url = "http://localhost/smartcook2/app/"
function load(url, element) {
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      element.innerHTML = data
    })
}
load(api_url + "recipes.php", document.getElementById("recipes"))
let buttons = document.querySelectorAll("#recipe-category-btns button")
buttons.forEach((button) => {
  button.onclick = () => {
    buttons.forEach((button) => {
      button.classList.remove("active")
    })
    button.classList.add("active")
    let category = button.getAttribute("data-recipe-category")
    load(
      api_url + "recipes.php?recipe-category=" + category,
      document.getElementById("recipes")
    )
  }
})

document.addEventListener("click", function(event) {
  let zzzElement = event.target.closest(".zzz");
  if (zzzElement) {
      var id = zzzElement.querySelector('h2').id;
      var url = api_url + '../index_recipes.php?id=' + id;
      window.location.href = url;
  }
});