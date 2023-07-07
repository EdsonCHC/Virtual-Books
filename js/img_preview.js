let vista_preliminar = (event)=> {

    let view =new FileReader();
    let id_img = document.querySelector("#img-preview");

    vista.onload = ()=>{
        if (view.readyState == 2){
            id_img.src = view.result;
        }
    }
    view.readAsDataURL(event.target.files[0])
}