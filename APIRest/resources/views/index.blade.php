<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
