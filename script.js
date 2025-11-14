document.addEventListener("DOMContentLoaded", listar);

const frm = document.querySelector("#frm");
const lista = document.querySelector("#lista");

document.querySelector("#btnGuardar").onclick = () => ejecutar("Guardar");
document.querySelector("#btnModificar").onclick = () => ejecutar("Modificar");
document.querySelector("#btnBuscar").onclick = buscar;

function ejecutar(Accion) {
    console.log("Accion enviada:", Accion);  
    let data = new FormData(frm);
    data.append("Accion", Accion);

    fetch("registrar.php", {
        method: "POST",
        body: data
    })
    .then(r => r.json())
    .then(res => {
        if (!res.success) {
            Swal.fire("Error", res.errors?.join("<br>") || res.message, "error");
            return;
        }

        Swal.fire("OK", res.message, "success");
        listar();
    });
}

function buscar() {
    let data = new FormData();
    data.append("Accion", "Buscar");
    data.append("codigo", document.querySelector("#codigo").value);

    fetch("registrar.php", { method: "POST", body: data })
    .then(r => r.json())
    .then(res => {
        if (res.length === 0) {
            Swal.fire("Sin resultados", "No existe producto con ese código.", "info");
            return;
        }

        let p = res[0];
        document.querySelector("#id").value = p.id;
        document.querySelector("#producto").value = p.producto;
        document.querySelector("#precio").value = p.precio;
        document.querySelector("#cantidad").value = p.cantidad;

        Swal.fire("Encontrado", "Producto cargado para edición", "success");
    });
}

function listar() {
    let data = new FormData();
    data.append("Accion", "Listar");

    fetch("registrar.php", { method: "POST", body: data })
    .then(r => r.json())
    .then(res => {
        lista.innerHTML = "";
        res.forEach(p => {
            lista.innerHTML += `
                <tr>
                    <td>${p.id}</td>
                    <td>${p.codigo}</td>
                    <td>${p.producto}</td>
                    <td>$${p.precio}</td>
                    <td>${p.cantidad}</td>
                </tr>`;
        });
    });
}
