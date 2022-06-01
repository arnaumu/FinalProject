window.onload = function() {
    cleanFields();
};

function cleanFields() {
    document.getElementById("timestamp").value = "";
    document.getElementById("description").value = "";
}

function validate() {
    var timestamp = document.getElementById("timestamp").value;
    var log = document.getElementById("description").value;

    if (timestamp.length == 0 || log.length == 0) {

        return false;
    } else {
        return true;
    }
}

function sendLog() {
    let idServer = document.getElementById("id").innerHTML;
    if (validate()) {
        let form = document.getElementById("formNewLog");
        let logs = {};
        let input = form.elements;

        for (let i = 0; i < input.length; i++) {
            console.log("Nombre:")
            console.log(input[i].name);
            if (input[i].name !== "") {
                // console.log(logs[input[i].name]);
                console.log("valor:")
                console.log(input[i].value);
                logs[input[i].name] = input[i].value;
            }
        }
        let idServer = document.getElementById("id").innerHTML;
        fetch('http://localhost:8000/api/v1/new-log/' + idServer, {
            method: 'POST',
            body: JSON.stringify(logs),
            headers: { 'Content-Type': 'application/json' }
        }).then(response => response.json())

        alert('Log created');
        back();
    } else {
        alert('Fill each Filed');
        window.location.href = 'http://127.0.0.1:8000/create-log/' + idServer;
    }
}

function back() {
    let idServer = document.getElementById("id").innerHTML;
    return window.location.href = 'http://127.0.0.1:8000/server-logs/' + idServer;
}