<!doctype html>
<html lang="pt-BR">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/static/css/bootstrap.min.css">
  <title>Coleção - Área do Admin</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Laravel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/admin">Área do Admin <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="content" style="margin:50px;">


  <h4>Coleção</h4>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Data de lançamento</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

  <h4 style="margin-top:40px;">Lista de modelos <button type="button" class="btn btn-outline-primary btn-sm">Adicionar</button></h4>

  <form class="model" style="display:none;">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputName">Nome</label>
        <input type="text" class="form-control" maxlength="250" id="inputName" placeholder="Nome do modelo" required>
      </div>
      <div class="form-group col-md-6">
        <label for="inputCode">Código <span class="text-muted">(6 caracteres)</span></label>
        <input type="text" class="form-control" maxlength="6" id="inputCode" placeholder="Código exclusivo" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputDescription">Descrição</label>
        <input type="text" class="form-control" maxlength="250" id="inputDescription" placeholder="Descrição da tarefa..." required>
      </div>
      <div class="form-group col-md-3">
        <label for="inputImg">Imagem URL</label>
        <input type="text" class="form-control" id="inputImg" placeholder="URL da imagem..." required>
      </div>
      <div class="form-group col-md-3">
        <label for="inputQuant">Quantidade</label>
        <input type="number" class="form-control" id="inputQuant" placeholder="Quantidade" required>
      </div>
    </div>
    <div class="alert alert-danger" role="alert" style="display:none;"></div>
    <button type="submit" class="btn btn-primary">Salvar</button><br><br>
  </form>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Quantidade</th>
        <th scope="col">Imagem URL</th>
        <th scope="col">Finalizados</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

</div>
<script src="/static/js/generic.js"></script>
<script src="/static/js/admin/collection.js"></script>

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>