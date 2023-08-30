$("#commentForm").on("submit", (e) => {
  e.preventDefault();

  var valuation = $("#valuation").val();
  var text = $("#texto").val();
  var id_usuario = $("#id_usuario").val();
  var id_recurso = $("#id_recurso").val();

  if (valuation === "" || text === "") {
    alertify.alert("Todos los campos son obligatorios");
    return false;
  }

  if (checkScriptTags(text)) {
    alertify.alert("El comentario no puede contener scripts");
    return false;
  }

  if (!canComment()) {
    alertify.alert(
      "Debes esperar al menos 30 segundos antes de comentar nuevamente"
    );
    return false;
  }

    setCommentTimestamp();

    saveEvaluation(valuation, text, id_usuario, id_recurso);
1
    return true;

  function saveEvaluation(valuation, text, id_usuario, id_recurso) {
    var formData = new FormData();
    formData.append("valuation", valuation);
    formData.append("texto", text);
    formData.append("id_usuario", id_usuario);
    formData.append("id_recurso", id_recurso);

    $.ajax({
      url: "../php/com.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        console.log(response);
        if (response) {
          alertify.success("Comentario exitoso");
        } else {
          alertify.error("Ha ocurrido un error");
        }
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
    });
  }

  function checkScriptTags(text) {
    var scriptRegex = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi;
    return scriptRegex.test(text);
  }

  function canComment() {
    var lastCommentTimestamp = getCookie("comment_timestamp");
    if (!lastCommentTimestamp) {
      return true;
    }

    var currentTime = Math.floor(Date.now() / 1000);
    var timeElapsed = currentTime - lastCommentTimestamp;
    return timeElapsed >= 30;
  }

  function setCommentTimestamp() {
    var currentTime = Math.floor(Date.now() / 1000);
    document.cookie = "comment_timestamp=" + currentTime + "; path=/";
  }

  function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length === 2) {
      return parts.pop().split(";").shift();
    }
  }
});
