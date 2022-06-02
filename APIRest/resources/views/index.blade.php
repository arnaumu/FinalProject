<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\index.css') }}">
</head>

<body>
    <script src="{{ asset('js\app.js') }}"></script>
    <div class="contentPrincipal">
        <h2 class="mb-5">Servers</h2>
        <a class="btn btn-primary mb-3" href="{{ url('/create-server') }}" role="button">New server</a>
        <table id="serversTable" class="serversTable">
            <tr>
                <th>IPV4</th>
                <th>IPV6</th>
                <th>Location</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </table>
    </div>
</body>

</html>
