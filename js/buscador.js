document.addEventListener("keyup", (e) => {
  if (e.target.matches("#buscarInp")) {
    document.querySelectorAll(".resourse").forEach((name) => {
      const searchTerm = e.target.value.toLowerCase();
      const resourceContent = name.textContent.toLowerCase();
      const shouldShow = resourceContent.includes(searchTerm);

      name.classList.toggle("filtro", shouldShow);
      name.classList.toggle("filtro", !shouldShow);
    });
  }
  // } 
  // if (e.target.matches("#buscarInpCien")) { //Ciencia
  //   document.querySelectorAll(".resourseCien").forEach((name) => {
  //     const searchTerm = e.target.value.toLowerCase();
  //     const resourceContent = name.textContent.toLowerCase();
  //     const shouldShow = resourceContent.includes(searchTerm);

  //     name.classList.toggle("filtro", shouldShow);
  //     name.classList.toggle("filtro", !shouldShow);
  //   });
  // } else if (e.target.matches("#buscarInpEco")) { //Economia
  //   document.querySelectorAll(".resourseEco").forEach((name) => {
  //     const searchTerm = e.target.value.toLowerCase();
  //     const resourceContent = name.textContent.toLowerCase();
  //     const shouldShow = resourceContent.includes(searchTerm);

  //     name.classList.toggle("filtro", shouldShow);
  //     name.classList.toggle("filtro", !shouldShow);
  //   });
  // } else if (e.target.matches("#buscarInpFisic")) { //Fisica
  //   document.querySelectorAll(".resourseFisic").forEach((name) => {
  //     const searchTerm = e.target.value.toLowerCase();
  //     const resourceContent = name.textContent.toLowerCase();
  //     const shouldShow = resourceContent.includes(searchTerm);

  //     name.classList.toggle("filtro", shouldShow);
  //     name.classList.toggle("filtro", !shouldShow);
  //   });
  // } else if (e.target.matches("#buscarInpHisto")) { //Histo
  //   document.querySelectorAll(".resourseHisto").forEach((name) => {
  //     const searchTerm = e.target.value.toLowerCase();
  //     const resourceContent = name.textContent.toLowerCase();
  //     const shouldShow = resourceContent.includes(searchTerm);

  //     name.classList.toggle("filtro", shouldShow);
  //     name.classList.toggle("filtro", !shouldShow);
  //   });
  // }
});
