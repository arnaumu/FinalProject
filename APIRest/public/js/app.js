function hello() {
    console.log("hello");
}

window.onload = async function() {
    await renderServers();
};

async function getAllServers() {
    let url = 'http://localhost:8000/api/v1/servers';
    try {
        let res = await fetch(url);
        return await res.json();
    } catch (error) {
        console.log(error);
    }
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

async function deleteServerLogs(idServer) {
    if (confirm('Are you sure that you want to delete this server?\nWARNING: This action will delete ALL logs associated to this server.')) {
        //BORRA LOS LOGS DEL SERVER
        let url = 'http://localhost:8000/api/v1/logs-server/' + idServer;
        fetch(url)
            .then((response) => {
                return response.json();
            })
            .then((json) => {

                if (!json.data.length == 0) {
                    for (let i = 0; i < json.data.length; i++) {
                        console.log(json.data.length);
                        let idLog = json.data[i].id;
                        deleteLog(idServer, idLog);
                        // fetch('http://localhost:8000/api/v1/delete-log/' + idServer + '/' + idLog, {
                        //     method: 'DELETE',
                        // });
                    }
                }
            });

        //BORRA EL SERVER
        await deleteServer(idServer);
        // fetch('http://localhost:8000/api/v1/delete-server/' + idServer, {
        //     method: 'DELETE',
        // }).then(data => reload());
    }
}

async function deleteServer(idServer) {
    fetch('http://localhost:8000/api/v1/delete-server/' + idServer, {
        method: 'DELETE',
    }).then(data => reload());
}

async function deleteLog(idServer, idLog) {
    fetch('http://localhost:8000/api/v1/delete-log/' + idServer + '/' + idLog, {
        method: 'DELETE',
    });
}

async function reload() {
    await renderServers();
    window.location.href = 'http://127.0.0.1:8000/';
}

async function renderServers() {
    let servers = await getAllServers();
    var table = document.getElementById("serversTable");
    var idServer = 0;
    servers.forEach(server => {
        //FILA
        var fila = table.insertRow();
        fila.id = idServer;

        //COLUMNAS
        var celda1 = fila.insertCell();
        if (server.ipv4 == 'null') {
            celda1.innerHTML = "";
        } else {
            celda1.innerHTML = server.ipv4;
        }

        var celda2 = fila.insertCell();
        if (server.ipv6 == 'null') {
            celda2.innerHTML = "";
        } else {
            celda2.innerHTML = server.ipv6;
        }

        var celda3 = fila.insertCell();
        celda3.innerHTML = server.location;

        var celda4 = fila.insertCell();
        celda4.innerHTML = server.description;

        var celda5 = fila.insertCell();
        //LOGS
        let btnLog = document.createElement("button");
        btnLog.setAttribute("id", "btnLog_" + server.id);
        btnLog.onclick = function() {
            return window.location = 'server-logs/' + server.id;
        };
        let iconLog = document.createElement("i");
        iconLog.setAttribute("class", "bi bi-list");
        iconLog.innerHTML = "Logs";
        btnLog.appendChild(iconLog);
        celda5.appendChild(btnLog);

        //EDIT
        let btnEdit = document.createElement("button");
        btnEdit.setAttribute("id", "btnEdit" + server.id);
        btnEdit.onclick = function() {
            return window.location = 'server-edit/' + server.id;
        };
        let iconEdit = document.createElement("i");
        iconEdit.setAttribute("class", "bi bi-pencil");
        iconEdit.innerHTML = "Edit";
        btnEdit.appendChild(iconEdit);
        celda5.appendChild(btnEdit);

        //DELETE
        let btnDelete = document.createElement("button");
        btnDelete.setAttribute("id", "btnDelete" + server.id);
        btnDelete.onclick = async function() {
            await deleteServerLogs(server.id);
        };
        let iconDelete = document.createElement("i");
        iconDelete.setAttribute("class", "bi bi-trash");
        iconDelete.innerHTML = "Delete";
        btnDelete.appendChild(iconDelete);
        celda5.appendChild(btnDelete);

        idServer++;
    });
}