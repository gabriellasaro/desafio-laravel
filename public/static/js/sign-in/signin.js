function getTasks() {
    fetch('http://127.0.0.1/api/v1/tasks', {method: 'GET'}).then(function(response) {
        return response.json();
    }).then(function(data) {
        let select = document.querySelector('.custom-select');

        data['data'].forEach(task => {
            let opt = document.createElement('option');
            opt.appendChild(document.createTextNode(task['name']));
            opt.value = task['id'];

            select.appendChild(opt);
        });
    }).catch(function() {
        console.log("Error ao carregar tarefas!");
    });
}

function logIn(e) {
    e.preventDefault();

    let message = document.querySelector('.alert.alert-danger');
    message.style.display = "none";

    this.disabled = true;
    this.innerText = "Carregando...";
    
    fetch('http://127.0.0.1/api/v1/sessions', {
        method: 'post',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            'cnpj': document.getElementById('inputCNPJ').value,
            'pass': document.getElementById('inputPassword').value
        })
    })
    .then(function(response) {
        return response.json()
    })
    .then(function(data) {
        if (!data.status) {
            message.style.display = "block";
            message.innerText = data.message;
        } else {
            if (!data.data.auth) {
                message.style.display = "block";
                message.innerText = "Erro na autenticação";
            } else {
                localStorage.clear();
                localStorage.setItem('token', data.data.token);
                localStorage.setItem('user_id', data.data.user.id);
                localStorage.setItem('name', data.data.user.name);
                localStorage.setItem('company', data.data.user.company);
                localStorage.setItem('cnpj', data.data.user.cnpj);
                localStorage.setItem('responsible', data.data.user.responsible);
                
                document.querySelector('.success').style.display = "block";
                window.setTimeout(function() {
                    window.location.href = "http://127.0.0.1/dashboard";
                },300);
            }
        }
    })
    .catch(function(data) {
        let message = document.querySelector('.alert.alert-danger');
        message.style.display = "block";
        message.innerHTML = "Algo não ocorreu como esperado!<br>";
        message.appendChild(document.createTextNode(data));
    });

    this.disabled = false;
    this.innerText = "Entrar";
}

function newUser(e) {
    e.preventDefault();

    let message = document.querySelector('.alert.alert-danger');
    message.style.display = "none";

    this.disabled = true;
    this.innerText = "Carregando...";
    
    fetch('http://192.168.6.10/api/v1/users', {
        method: 'post',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            'name': document.getElementById('inputName').value,
            'company': document.getElementById('inputCompany').value,
            'cnpj': document.getElementById('inputCNPJ').value,
            'pass': document.getElementById('inputPassword').value,
            'address': document.getElementById('inputAddress').value,
            'phone': document.getElementById('inputPhone').value,
            'responsible': document.getElementById('inputResponsible').value,
            'task_id': document.getElementById('selectTask').value
        })
    })
    .then(function(response) {
        return response.json()
    })
    .then(function(data) {
        if (!data.status) {
            message.style.display = "block";
            message.innerText = data.message;
        } else {
            document.querySelectorAll('.h3.mb-3.font-weight-normal')[1].innerHTML = "Conta criada!<br>Logando...";
            logIn(e);
        }
    })
    .catch(function(data) {
        let message = document.querySelector('.alert.alert-danger');
        message.style.display = "block";
        message.innerHTML = "Algo não ocorreu como esperado!<br>";
        message.appendChild(document.createTextNode(data));
    });

    this.disabled = false;
    this.innerText = "Cadastre-se";
}

function removeOptions(element) {
    let select = document.querySelector(element)
    for (let i = select.options.length; i > 1; i--) {
        select.lastElementChild.remove();
    }
}

document.querySelector('.btn.btn-lg.btn-primary.btn-block').addEventListener("click", logIn);

document.querySelectorAll('.btn.btn-lg.btn-primary.btn-block')[1].addEventListener("click", newUser);

document.querySelector('.alert.alert-danger').addEventListener("click", function(){this.style.display="none"});

document.querySelector('.checkbox.mb-3 label a').addEventListener('click', function(e) {
    e.preventDefault();

    getTasks();

    let label = document.querySelectorAll('.checkbox.mb-3 label');
    label[0].style.display = "none";
    label[1].style.display = "block";

    let title = document.querySelectorAll('.h3.mb-3.font-weight-normal');
    title[0].style.display = "none";
    title[1].style.display = "block";

    document.querySelector('.register').style.display = "block";
    let button = document.querySelectorAll('.btn.btn-lg.btn-primary.btn-block');
    button[0].style.display = "none";
    button[1].style.display = "block";
})

document.querySelectorAll('.checkbox.mb-3 label a')[1].addEventListener('click', function(e) {
    e.preventDefault();

    removeOptions('.custom-select');

    let label = document.querySelectorAll('.checkbox.mb-3 label');
    label[0].style.display = "block";
    label[1].style.display = "none";

    let title = document.querySelectorAll('.h3.mb-3.font-weight-normal');
    title[0].style.display = "block";
    title[1].style.display = "none";

    document.querySelector('.register').style.display = "none";
    let button = document.querySelectorAll('.btn.btn-lg.btn-primary.btn-block');
    button[0].style.display = "block";
    button[1].style.display = "none";
})