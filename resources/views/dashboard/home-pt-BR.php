<!doctype html>
<html lang="pt-BR">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/static/css/bootstrap.min.css">
  <title>Área do Usuário</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Laravel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/dashboard">Painel do Usuário <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <a href="/dashboard/logout" class="navbar-text">Sair</a>
  </div>
</nav>

<div class="content" style="margin:50px;">


  <h4>Disponível para trabalho</h4>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Data de lançamento</th>
        <th scope="col">Visualizar processos</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

  <h4>Minha tarefa</h4>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Tempo médio por peça</th>
        <th scope="col">Custo por peça</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

  <h4 style="margin-top:40px;"><span>Nenhuma coleção selecionada</span> - Lista de processos</h4>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome do modelo</th>
        <th scope="col">Descrição</th>
        <th scope="col">Processos executados</th>
        <th scope="col">Finalizar</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

</div>
<script src="/static/js/dashboard/session.js"></script>
<script src="/static/js/generic.js"></script>
<script src="/static/js/dashboard/home.js"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>