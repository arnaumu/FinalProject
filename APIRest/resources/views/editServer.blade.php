<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\newServer.css') }}">
</head>

<body>
    <script src="{{ asset('js\editServer.js') }}"></script>
    <div class="contentPrincipal">
        <h2 class="mb-5">Edit server</h2>

        <div id="id" style="display: none">{{ $idServer }}</div>
        <a class="btn btn-secondary mb-6" href="{{ url('/') }}" role="button">Back</a>

        <div class="formulario d-flex justify-content-center p-6">

            <form id="formEditServer" name="formEditServer">
                <p class="mb-2 mt-4"><b>Modify the new server values:</b></p><br>

                <label for="ipv4">Ipv4:</label><br>
                <input type="text" id="ipv4" name="ipv4"><br>

                <label for="ipv6">Ipv6:</label><br>
                <input type="text" id="ipv6" name="ipv6"><br>

                <label for="location">Location:</label><br>
                <input type="text" id="location" name="location" required><br>

                <label for="description">Description:</label><br>
                <input type="text" id="description" name="description" required><br><br>
            </form>
            <input type="submit" id="send" value="Update" onclick="updateServer()">
        </div>
    </div>
</body>

</html>
