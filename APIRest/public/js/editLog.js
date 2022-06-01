window.onload = async function() {
    var logId = document.getElementById("idLog").innerHTML;
    await setValues(logId);
};


function back() {
    let idServer = document.getElementById("idServer").innerHTML;
    return window.location.href = 'http://127.0.0.1:8000/server-logs/' + idServer;
}

function updateLog() {
    let idServer = document.getElementById("idServer").innerHTML;
    let idLog = document.getElementById("idLog").innerHTML;

    let form = document.getElementById("formEditLog");
    let log = {};
    let input = form.elements;

    for (let i = 0; i < input.length; i++) {
        if (input[i].name !== "") {
            log[input[i].name] = input[i].value;
        }
    }

    fetch('http://localhost:8000/api/v1/edit-log/' + idServer + '/' + idLog, {
        method: 'PUT',
        body: JSON.stringify(log),
        headers: { 'Content-Type': 'application/json' }
    }).then(response => response.json())

    alert('Log Updated');
    back();

}

async function getLog(logId) {
    let url = 'http://localhost:8000/api/v1/get-log/' + logId;
    try {
        let res = await fetch(url);
        return await res.json();
    } catch (error) {
        console.log(error);
    }
}

async function setValues(logId) {
    let log = await getLog(logId);

    let timestamp = document.getElementById("timestamp");
    let description = document.getElementById("description");

    timestamp.value = log.data.timestamp;
    description.value = log.data.description;
}