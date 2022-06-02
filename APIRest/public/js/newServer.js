window.onload = function() {
    cleanFields();
};

function cleanFields() {
    document.getElementById("ipv4").value = "";
    document.getElementById("ipv6").value = "";
    document.getElementById("location").value = "";
    document.getElementById("description").value = "";
}

function reloadPage() {
    return window.location.href = 'http://127.0.0.1:8000/create-server';
}

function checkIpv4(ipv4) {
    if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(ipv4) || ipv4 == 'null') {
        return (true)
    }
    alert("You have entered an invalid IPV4 address!");
    return reloadPage();
}

function checkIpv6(ipv6) {
    if (/^((?:[0-9A-Fa-f]{1,4}))((?::[0-9A-Fa-f]{1,4}))*::((?:[0-9A-Fa-f]{1,4}))((?::[0-9A-Fa-f]{1,4}))*|((?:[0-9A-Fa-f]{1,4}))((?::[0-9A-Fa-f]{1,4})){7}$/g.test(ipv6) || ipv6 == 'null') {
        return (true)
    }
    return (false)
}

function validate() {

    var input_ipv4 = document.getElementById("ipv4");
    var input_ipv6 = document.getElementById("ipv6");
    var input_location = document.getElementById("location");
    var input_description = document.getElementById("description");

    if (input_location.value.length == 0 || input_description.value.length == 0) {
        alert("There are empty fields!\nYou have to fill every input.");
        return reloadPage();

    } else if (input_ipv4.value.length == 0 && input_ipv6.value.length == 0) {
        alert("There are empty IPs fields.\nYou have to fill at least one IP field.");
        return reloadPage();
    } else {
        alert("New server entered.");
        return window.location.href = "http://127.0.0.1:8000/";
    }
}

function fill() {
    var input_ipv4 = document.getElementById("ipv4");
    var input_ipv6 = document.getElementById("ipv6");

    if (input_ipv4.value.length != 0 && input_ipv6.value.length == 0) {
        input_ipv6.value = 'null';
    } else if (input_ipv4.value.length == 0 && input_ipv6.value.length != 0) {
        input_ipv4.value = 'null';
    }
}