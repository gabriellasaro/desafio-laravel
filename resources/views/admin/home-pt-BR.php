<!doctype html>
<html lang="pt-BR">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/static/css/bootstrap.min.css">
  <title>Área do Admin</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Laravel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/admin">Admin <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="content" style="margin:50px;">


  <h4>Lista de coleções <button type="button" class="btn btn-outline-primary btn-sm">Adicionar</button></h4>

  <form class="collection" style="display:none;">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCName">Nome</label>
        <input type="text" class="form-control" maxlength="250" id="inputCName" placeholder="Nome da coleção" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputCRelease">Data de lançamento</label>
        <input type="date" class="form-control" id="inputCRelease" required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputCDescription">Descrição</label>
      <input type="text" class="form-control" maxlength="250" id="inputCDescription" placeholder="Descrição da coleção..." required>
    </div>
    <div class="alert alert-danger" role="alert" style="display:none;"></div>
    <button type="submit" class="btn btn-primary">Salvar</button><br><br>
  </form>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Data de lançamento</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

  <h4 style="margin-top:40px;">Lista de tarefas <button type="button" class="btn btn-outline-primary btn-sm">Adicionar</button></h4>

  <form class="task" style="display:none;">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputTName">Nome</label>
        <input type="text" class="form-control" maxlength="250" id="inputTName" placeholder="Nome da tarefa" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputTCost">Custo por peça</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">R$</div>
          </div>
          <input type="number" class="form-control" id="inputTCost" placeholder="Custo por peça">
        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputTDescription">Descrição</label>
        <input type="text" class="form-control" maxlength="250" id="inputTDescription" placeholder="Descrição da tarefa..." required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputTAverage">Tempo médio por peça</label>
        <input type="number" class="form-control" id="inputTAverage" placeholder="Tempo médio por peça" required>
      </div>
    </div>
    <div class="alert alert-danger" role="alert" style="display:none;"></div>
    <button type="submit" class="btn btn-primary">Salvar</button><br><br>
  </form>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Tempo médio</th>
        <th scope="col">Custo (R$)</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

  <h4 style="margin-top:40px;">Lista de usuários</h4>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Razão Social</th>
        <th scope="col">Telefone</th>
        <th scope="col">Responsável</th>
        <th scope="col">ID Tarefa</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
<script src="/static/js/admin/generic.js"></script>
<script src="/static/js/admin/home.js"></script>
</body>
</html>