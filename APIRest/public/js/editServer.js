window.onload = async function() {
    var serverId = document.getElementById("id").innerHTML;
    await setValues(serverId);
};


function updateServer() {
    var serverId = document.getElementById("id").innerHTML;

    if (document.getElementById("ipv4").value == '') {
        document.getElementById("ipv4").value = 'null';
    } else if (document.getElementById("ipv6").value == '') {
        document.getElementById("ipv6").value = 'null';
    }

    if (validate() == true) {
        let form = document.getElementById("formEditServer");
        let server = {};
        let input = form.elements;

        for (let i = 0; i < input.length; i++) {
            if (input[i].name !== "") {
                server[input[i].name] = input[i].value;
                console.log(server[input[i].name]);
                console.log(input[i].value);
            }
        }

        fetch('http://localhost:8000/api/v1/edit-server/' + serverId, {
            method: 'PUT',
            body: JSON.stringify(server),
            headers: { 'Content-Type': 'application/json' }
        }).then(response => response.json())

        alert('Server Updated');
        window.location.href = 'http://127.0.0.1:8000/'
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

async function setValues(serverId) {
    let server = await getServer(serverId);

    let ipv4 = document.getElementById("ipv4").value;
    let ipv6 = document.getElementById("ipv6").value;


    if (document.getElementById("ipv4").value == 'null') {
        document.getElementById("ipv4").value = '';
    } else {
        document.getElementById("ipv4").value = server.data.ipv4;
    }

    if (document.getElementById("ipv6").value == 'null') {
        document.getElementById("ipv6").value = '';
    } else {
        document.getElementById("ipv6").value = server.data.ipv6;
    }


    // document.getElementById("ipv4").value = server.data.ipv4;
    // document.getElementById("ipv6").value = server.data.ipv6;

    document.getElementById("location").value = server.data.location;
    document.getElementById("description").value = server.data.description;
}

function validate() {
    var description = document.getElementById("description").value;
    var location = document.getElementById("location").value;
    var ipv4 = document.getElementById("ipv4").value;
    var ipv6 = document.getElementById("ipv6").value;


    if (location.length == 0 || description.length == 0) {
        alert("There are empty fields!\nYou have to fill every input.");
        return window.location.href = 'http://127.0.0.1:8000/server-edit/' + serverId
    } else if (ipv4.length == 0 && ipv6.length == 0) {
        alert("There are empty IPs fields.\nYou have to fill at least one IP field.");
        return window.location.href = 'http://127.0.0.1:8000/server-edit/' + serverId;
    } else {
        return true;
    }
}