$(document).ready(function () {
  $(function () {
    $("#search").keyup(function (e) {
      if ($("#search").val()) {
        let search = $("#search").val();
        let template = "";

        /*Ocupe este poque es mas corto que el ajax normal xd*/
        $.post("../php/searchRes.php", { search }, (response) => {
          if (response) {
            let resource = JSON.parse(response);
            resource.forEach((data) => {
              template += `
                <a href="../html/book.php?id=${data.id}">
                  <li class="result_li">${data.name}</li>
                </a>
              `;
            });
            $("#containerRes").html(template);
            $("#resResult").show();
          } else {
            $("#resResult").hide();
          }
        });
      }
    });
  });
});
