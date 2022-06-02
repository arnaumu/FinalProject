window.onload = async function() {
    const url = window.location.href;
    const idServer = url.split("/").pop();

    await setServer(idServer);
    await setLogs(idServer);
};

function createNewLog() {
    window.location = 'http://localhost:8000/create-log/' + document.getElementById("id").innerHTML
}

function editLog(idServer, idLog) {
    window.location = 'http://localhost:8000/log-edit/' + idServer + '/' + idLog + '/';
}

async function getServer(id) {
    let url = 'http://localhost:8000/api/v1/server/' + id;
    try {
        let res = await fetch(url);
        return await res.json();
    } catch (error) {
        console.log(error);
    }
}

async function getLogs(id) {
    let url = 'http://localhost:8000/api/v1/logs-server/' + id;
    try {
        let res = await fetch(url);
        return await res.json();
    } catch (error) {
        console.log(error);
    }
}

async function setServer(id) {
    let servers = await getServer(id);
    var table = document.getElementById("serversTable");

    //FILA
    var fila = table.insertRow();
    fila.id = id;

    //COLUMNAS
    var celda1 = fila.insertCell();
    if (servers.data.ipv4 == 'null') {
        celda1.innerHTML = '';
    } else {
        celda1.innerHTML = servers.data.ipv4;
    }

    var celda2 = fila.insertCell();
    if (servers.data.ipv6 == 'null') {
        celda2.innerHTML = '';
    } else {
        celda2.innerHTML = servers.data.ipv6;
    }

    var celda3 = fila.insertCell();
    celda3.innerHTML = servers.data.description;

    var celda4 = fila.insertCell();
    celda4.innerHTML = servers.data.location;

    //SET TITLE
    document.getElementById("serverNum").innerHTML += servers.data.id;
}

async function setLogs(id) {
    let logs = await getLogs(id);
    var table = document.getElementById("logsTable");

    for (let i = 0; i < logs.data.length; i++) {

        //FILA
        var fila = table.insertRow();
        fila.id = id;

        //COLUMNAS
        var celda1 = fila.insertCell();
        celda1.innerHTML = logs.data[i].timestamp;

        var celda2 = fila.insertCell();
        celda2.innerHTML = logs.data[i].description;

        var celda5 = fila.insertCell();
        let btnEdit = document.createElement("button");
        btnEdit.setAttribute("id", "btnEdit" + logs.data[i].id);
        btnEdit.onclick = function() {
            editLog(document.getElementById("id").innerHTML, logs.data[i].id);
        };
        let iconEdit = document.createElement("i");
        iconEdit.setAttribute("class", "bi bi-pencil");
        iconEdit.innerHTML = "Edit";
        btnEdit.appendChild(iconEdit);
        celda5.appendChild(btnEdit);

        //DELETE
        let btnDelete = document.createElement("button");
        btnDelete.setAttribute("id", "btnDelete" + logs.data[i].id);
        btnDelete.onclick = function() {
            deleteLog(id, logs.data[i].id);
        };
        let iconDelete = document.createElement("i");
        iconDelete.setAttribute("class", "bi bi-trash");
        iconDelete.innerHTML = "Delete";
        btnDelete.appendChild(iconDelete);
        celda5.appendChild(btnDelete);

    }
}

async function deleteLog(idServer, idLog) {
    if (confirm('Are you sure that you want to delete this log?')) {
        fetch('http://localhost:8000/api/v1/delete-log/' + idServer + '/' + idLog, {
            method: 'DELETE',
        }).then(data => back());
    }

}

async function back() {
    let idServer = document.getElementById("id").innerHTML;
    return window.location.href = 'http://127.0.0.1:8000/server-logs/' + idServer;
}