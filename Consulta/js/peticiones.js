document.getElementById("campo").addEventListener("keyup", getCodigos)

function getCodigos() {

    let inputCP = document.getElementById("campo").value
    let nombre = document.getElementById("nombre").value
    let lista = document.getElementById("lista")

    if (inputCP.length > 0) {
        let url = "php/getcodigos.php"
        let formData = new FormData()
        formData.append("campo", inputCP)

        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors" //Default cors, no-cors, same-origin
        }).then(response => response.json())
            .then(data => {
                lista.style.display = 'block'
                lista.innerHTML = data

            })
            .catch(err => console.log(err))
    } else {
        lista.style.display = 'none'
        document.getElementById("nombre").value ="";
        document.getElementById("apellido_materno").value ="";
        document.getElementById("apellido_paterno").value ="";
    }

}

function mostrar(nombre2,apellido1,apellido2,numero_control) {
    
    lista.style.display = 'none'
    document.getElementById("campo").value = numero_control;
    document.getElementById("nombre").value = nombre2;
    document.getElementById("apellido_paterno").value = apellido1;
    document.getElementById("apellido_materno").value = apellido2;  

    

    //var PacienteSelect = sessionStorage.getItem("PacienteCita");
    //alert(PacienteSelect)
}