<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\index.css') }}">
</head>

<body>
    <script src="{{ asset('js\logs.js') }}"></script>
    <div class="contentPrincipal">
        <div id="id" style="display: none">{{$idServer}}</div>
        <h2 class="mb-5" id="serverNum">Logs server nº</h2>
        <a class="btn btn-secondary mb-6" href="{{ url('/') }}" role="button">Back</a>
        <a onclick="createNewLog()" id="btnNewLog" class="btn btn-primary mb-6" role="button">New Log</a>
        <table id="serversTable" class="serversTable">
            <p><b>Selected server</b></p>
            <tr>
                <th>IPV4</th>
                <th>IPV6</th>
                <th>Location</th>
                <th>Description</th>
            </tr>
        </table>

        <table id="logsTable" class="serversTable">
            <p><b>Logs</b></p>
            <tr>
                <th>Timestamp</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </table>
        
    </div>
</body>
</html>
