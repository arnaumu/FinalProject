<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\newServer.css') }}">
</head>

<body>
    <script src="{{ asset('js\newServer.js') }}"></script>
    <div class="contentPrincipal">
        <h2 class="mb-5">New server</h2>
        <a class="btn btn-secondary mb-6" href="{{ url('/') }}" role="button">Back</a>
        <div class="formulario d-flex justify-content-center p-6">
            <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>

            <form id="formNewServer" action="http://localhost:8000/api/v1/new-server" method="post"
                onsubmit="return(validate());" target="dummyframe">
                <p class="mb-2 mt-4"><b>Enter the new server values:</b></p><br>
                <label for="ipv4">Ipv4:</label><br>
                <input type="text" id="ipv4" name="ipv4"><br>
                <label for="ipv6">Ipv6:</label><br>
                <input type="text" id="ipv6" name="ipv6"><br>
                <label for="location">Location:</label><br>
                <input type="text" id="location" name="location" required><br>
                <label for="description">Description:</label><br>
                <input type="text" id="description" name="description" required><br><br>

                <td colspan="2">
                    <input class="btnAction" type="submit" value="Register" onclick="fill()" />
                </td>

                <script></script>

                {{-- <button class="btn btn-success" onclick="checkContent()">Submit</button> --}}
            </form>
        </div>
    </div>
</body>

</html>
