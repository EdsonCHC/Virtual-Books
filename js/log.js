$(function () {
    $("#form").submit((e) => {
        e.preventDefault();

        const post_data = {
            email: $("#email").val(),
            password: $("#password").val()
        }
        $.post("../php/login_db_vb.php", post_data, (response) => {
            let account = JSON.parse(response);
            if(account.rol === '0'){
                alertify.alert(`Welcome ${account.name}`, () => {
                    window.location = "../html/index.php";
                });
            }else if(account.rol === '1'){
                alertify.alert(`Welcome ${account.name}`, () => {
                    window.location = "../html/index_admin.php";
                });
            }else{
                alertify.alert("La datos ingresados son incorrectos");
            }
        });

    });
});