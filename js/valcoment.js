function commentForm() {
    var valuation = document.getElementById("valuation").value;
    var text = document.getElementById("texto").value;
    var id_usuario = document.getElementById("user").value;
    var id_recurso = document.getElementById("id_recurso").value;

    if (valuation === "" || text === "") {
        alertify.alert("Todos los campos son obligatorios");
        return false;
    }

    if (checkScriptTags(text)) {
        alertify.alert("El comentario no puede contener scripts");
        return false;
    }

    if (!canComment()) {
        alertify.alert("Debes esperar al menos 30 segundos antes de comentar nuevamente");
        return false;
    }

    setCommentTimestamp();

    saveEvaluation(valuation, text, id_usuario, id_recurso);

    return true;
}

function saveEvaluation(valuation, text, id_usuario, id_recurso) {
    var formData = new FormData();
    formData.append('valuation', valuation);
    formData.append('text', text);
    formData.append('user', id_usuario);
    formData.append('id_recurso', id_recurso);

    $.ajax({
        url: "../php/com.php", 
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response === "success") {
                alertify.alert("Evaluación y comentario guardados correctamente.", function() {
                    // Redireccionar o realizar otras acciones si es necesario
                    // Por ejemplo: window.location = "nueva_pagina.php";
                });
            } else {
                alertify.alert("Ha ocurrido un error al guardar la evaluación y el comentario.");
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
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
