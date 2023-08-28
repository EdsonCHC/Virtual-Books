$(document).ready(function () {
  $(function () {
    $("#search").keyup(function (e) {
      if ($("#search").val()) {
        let search = $("#search").val();
        let template = "";

        $.post("../php/searchRes.php", { search }, (response) => {
          if (response) {
            let resource = JSON.parse(response);
            resource.forEach((data) => {
              template += `
                <a href="../html/book.php?id=${data.id}">
                  <li class="result_li">${data.name} - ${data.author}</li>
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
