<!doctype html><html lang="pt-BR"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Jekyll v3.8.6">
<title>Entrar - Área do usuário</title>
<!-- Bootstrap core CSS -->
<link href="/static/css/bootstrap.min.css" rel="stylesheet">
<!-- Favicons -->
<link rel="apple-touch-icon" href="/static/img/sign-in/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/static/img/sign-in/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/static/img/sign-in/favicon-16x16.png" sizes="16x16" type="image/png">
<!-- <link rel="manifest" href="/static/img/manifest.json"> -->
<link rel="mask-icon" href="/static/img/sign-in/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/static/img/sign-in/favicon.ico">
<!-- <meta name="msapplication-config" content="/static/img/browserconfig.xml"> -->
<meta name="theme-color" content="#563d7c">
<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>
<!-- Custom styles for this template -->
<link href="/static/css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
  <form class="form-signin">
    <img class="mb-4" src="/static/img/sign-in/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Entrar</h1>
    <h1 class="h3 mb-3 font-weight-normal" style="display:none;">Crie uma conta!</h1>
    <label for="inputCNPJ" class="sr-only">CNPJ</label>
    <input type="text" id="inputCNPJ" class="form-control" placeholder="CNPJ" required autofocus value="73.520.256/0001-01">
    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required value="123456785454">

    <div class="register" style="display:none;margin-bottom:10px;">
    <label for="inputName" class="sr-only">Nome Fantasia</label>
    <input type="text" id="inputName" class="form-control" placeholder="Nome Fantasia" required>

    <label for="inputCompany" class="sr-only">Razão Social</label>
    <input type="text" id="inputCompany" class="form-control" placeholder="Razão Social" required>

    <label for="inputAddress" class="sr-only">Endereço</label>
    <input type="text" id="inputAddress" class="form-control" placeholder="Endereço" required>

    <label for="inputPhone" class="sr-only">Telefone</label>
    <input type="phone" id="inputPhone" class="form-control" placeholder="Telefone" required>

    <label for="inputResponsible" class="sr-only">Nome do Responsável</label>
    <input type="text" id="inputResponsible" class="form-control" placeholder="Nome do Responsável" required>
    
    <label for="selectTask" style="margin-top:6px;">Escolha uma tarefa para executar:</label>
    <select class="custom-select" id="selectTask" required>
      <option selected disabled value="">Tarefa...</option>
    </select>
    </div>
    
    <div class="alert alert-danger" role="alert" style="display:none;"></div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    <button class="btn btn-lg btn-primary btn-block" type="submit" style="display:none;">Cadastre-se</button>
    <div class="checkbox mb-3"><br>
      <label>Deseja criar uma conta? <a href="#">Clique aqui!</a></label>
      <label style="display:none;">Deseja entrar com uma conta existente? <a href="#">Clique aqui!</a></label>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
  </form>

  <div class="success" style="display:none;">
    <div>
      <p>Logado com sucesso!</p>
      <a href="/dashboard" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Acessar painel</a>
    </div>
  </div>
  <style>
  .success {
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    background: rgba(51,51,51,0.9);
    z-index: 10;
  }
  .success div {
    margin: 0;
    position: absolute;
    top: 50%;
    left:50%;
    transform: translate(-50%, -50%);
  }
  .success div p {
    font-size:43px;
    font-weight:bold;
    color:#fff;
  }
  </style>
  <script src="/static/js/dashboard/sign-in/jquery-1.2.6.pack.js" type="text/javascript"></script>
  <script src="/static/js/dashboard/sign-in/jquery.maskedinput-1.1.4.pack.js" type="text/javascript" /></script>
  <script src="/static/js/dashboard/sign-in/signin.js"></script>
  <script type="text/javascript">
  function showSuccess(data) {
    document.querySelector('.success').style.display = 'block';
    window.setTimeout(function(){
      window.location.href = "http://127.0.0.1/dashboard";
    },300);
  }

  if (localStorage.getItem('token')) {
    fetch('http://127.0.0.1/api/v1/sessions/check', {method: 'get', headers: {'Meu-Token': localStorage.getItem('token')}})
    .then(function(response) {
      if (response.status != 401) {
        if (response.headers.get('Meu-Token') != null) {
            localStorage.setItem('token', response.headers.get('Meu-Token'))
        }
      } else {
        localStorage.clear();
      }
      return response
    })
    .then(function(response) {
        return response.json()
    })
    .then(function(data) {
        if (!data.status) {
            console.log(data);
        } else {
            showSuccess()
        }
    })
    .catch(function(err) {
        console.log(err);
    });
  }

  $(document).ready(function(){	
    $("#inputCNPJ").mask("99.999.999/9999-99");
  });

  $(document).ready(function(){	
    $("#inputPhone").mask("(99) 9999-99999");
  });
  </script>
</body></html>