<!doctype html><html lang="pt-BR"><head>
<meta charset="utf-8">
<title>Encerrando...</title>
</head>
<body>
<p>Encerrando...</p>

<script type="text/javascript">
if (localStorage.getItem('token')) {
    fetch('http://192.168.6.10/api/v1/sessions', {method: 'delete', headers: {'Meu-Token': localStorage.getItem('token')}})
    .then(function(response) {
        return response.json()
    })
    .then(function(data) {
        localStorage.clear();
        window.setTimeout(function() {
            window.location.href="http://127.0.0.1/";
        }, 1000);
    })
    .catch(function(err) {
        console.log(err);
    });
}

</script>
</body></html>