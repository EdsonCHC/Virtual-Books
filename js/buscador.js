document.addEventListener("keyup", (e) => {
  if (e.target.matches("#buscarInp")) {
    document.querySelectorAll(".resource").forEach((name) => {
      const searchTerm = e.target.value.toLowerCase();
      const resourceContent = name.textContent.toLowerCase();
      const shouldShow = resourceContent.includes(searchTerm);

      name.classList.toggle("filtro", shouldShow);
      name.classList.toggle("filtro", !shouldShow);
    });
  }
});

/*Buscador de db*/
getData();

document.getElementById("buscarInp").addEventListener("keyup",getData)

function getData() {
  let inp = document.getElementById("buscarInp").value;
  let content = document.getElementById("resource");
  let url = "../php/buscador.php";
  let formData = new FormData();
  formData.append("buscarInp", inp);

  fetch(url, {
    method: "POST",
    body: formData,
  }).then(Response => Response.json())
  .then(data => {
    content.innerHTML = data
  }).catch(err => console.log(err));
}
