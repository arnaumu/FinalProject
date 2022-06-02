<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css\newServer.css') }}">
</head>

<body>
    <script src="{{ asset('js\editLog.js') }}"></script>
    <div class="contentPrincipal">
        <h2 class="mb-5">Edit log</h2>

        <div id="idServer" style="display: none">{{ $idServer }}</div>
        <div id="idLog" style="display: none">{{ $idLog }}</div>
        <a class="btn btn-secondary mb-6" onclick="back()" role="button">Back</a>

        <div class="contentOut">

            <div class="formulario contentIn">
                <form id="formEditLog" name="log">
                    <p class="mb-2 mt-4"><b>Enter the new logs values:</b></p><br>
                    <label for="timestamp">Timestamp:</label><br>
                    <input type="datetime-local" id="timestamp" name="timestamp" required><br>
                    <label for="description">Description:</label><br>
                    <input type="text" id="description" name="description" required><br><br>
                </form>

                <div>
                    <input class ="btnAction" type="submit" id="send" value="Update log" onclick="updateLog()">
                </div>

            </div>
        </div>
    </div>
</body>

</html>
