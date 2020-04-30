function addItemsTCollection(data) {
    let table = document.querySelector('.table.table-bordered tbody');

    for (let i = 0; i < data.length; i++) {
        let tr = document.createElement('tr');
        
        let row = document.createElement('th');
        row.setAttribute('scope', 'row');
        let nrow = i;
        row.innerText = (nrow+1);

        tr.appendChild(row);

        let name = document.createElement('td');
        name.innerText = data[i].name;
        tr.appendChild(name)

        let descrition = document.createElement('td');
        descrition.innerText = data[i].description;
        tr.appendChild(descrition)

        let release_date = document.createElement('td');
        release_date.innerText = data[i].release_date;
        tr.appendChild(release_date)

        let actions = document.createElement('td');
        actions.innerHTML = '<div class="btn-group" role="group" aria-label="Ações">\
        <a href="/admin/collection/'+data[i].id+'" class="btn btn-success btn-sm">Visualizar</a>\
        <button type="button" class="btn btn-warning btn-sm" disabled>Editar</button>\
        <button type="button" class="btn btn-danger btn-sm">Excluir</button>\
        </div>';
        tr.appendChild(actions)

        actions.querySelector('.btn.btn-danger.btn-sm').addEventListener('click', function() {
            deleteItem('http://127.0.0.1/api/v1/collections', data[i].id, this.parentElement.parentElement.parentElement);
        })

        table.appendChild(tr)
    }
}

function addItemsTTask(data) {
    let table = document.querySelectorAll('.table.table-bordered tbody')[1];

    for (let i = 0; i < data.length; i++) {
        let tr = document.createElement('tr');
        
        let row = document.createElement('th');
        row.setAttribute('scope', 'row');
        row.innerText = data[i].id;

        tr.appendChild(row);

        let name = document.createElement('td');
        name.innerText = data[i].name;
        tr.appendChild(name)

        let descrition = document.createElement('td');
        descrition.innerText = data[i].description;
        tr.appendChild(descrition)

        let average = document.createElement('td');
        average.innerText = data[i].average_time + " minutos";
        tr.appendChild(average)

        let cost = document.createElement('td');
        cost.innerHTML = "R$ " + data[i].cost;
        tr.appendChild(cost)

        let actions = document.createElement('td');
        actions.innerHTML = '<div class="btn-group" role="group" aria-label="Ações">\
        <a href="/admin/task/'+data[i].id+'" class="btn btn-success btn-sm">Visualizar</a>\
        <button type="button" class="btn btn-warning btn-sm" disabled>Editar</button></div>';

        tr.appendChild(actions)

        table.appendChild(tr)
    }
}

function addItemsTUser(data) {
    let table = document.querySelectorAll('.table.table-bordered tbody')[2];

    for (let i = 0; i < data.length; i++) {
        let tr = document.createElement('tr');
        
        let row = document.createElement('th');
        row.setAttribute('scope', 'row');
        let nrow = i;
        row.innerText = (nrow+1);

        tr.appendChild(row);

        let name = document.createElement('td');
        name.innerText = data[i].name;
        tr.appendChild(name)

        let company = document.createElement('td');
        company.innerText = data[i].company;
        tr.appendChild(company)

        let cnpj = document.createElement('td');
        cnpj.innerText = data[i].cnpj;
        tr.appendChild(cnpj)

        let responsible = document.createElement('td');
        responsible.innerHTML = data[i].responsible;
        tr.appendChild(responsible)

        let task = document.createElement('td');
        task.innerHTML = data[i].task_id;
        tr.appendChild(task)

        let actions = document.createElement('td');
        actions.innerHTML = '<div class="btn-group" role="group" aria-label="Ações">\
        <button type="button" class="btn btn-success btn-sm" disabled>Visualizar</button>\
        <button type="button" class="btn btn-warning btn-sm" disabled>Editar</button>\
        <button type="button" class="btn btn-danger btn-sm" disabled>Excluir</button>\
        </div>';
        tr.appendChild(actions)

        table.appendChild(tr)
    }
}

document.querySelector('.btn.btn-outline-primary.btn-sm').addEventListener('click', function() {
    let show = document.querySelector('.collection');
    show.reset();
    if (show.style.display == 'none') {
        show.style.display = "block";
    } else {
        show.style.display = "none";
    }
})

document.querySelectorAll('.btn.btn-outline-primary.btn-sm')[1].addEventListener('click', function() {
    let show = document.querySelector('.task');
    show.reset();
    if (show.style.display == 'none') {
        show.style.display = "block";
    } else {
        show.style.display = "none";
    }
})

document.querySelector('.collection .btn.btn-primary').addEventListener('click', function(e) {
    e.preventDefault();

    let data = {
        'name': document.getElementById('inputCName').value,
        'description': document.getElementById('inputCDescription').value,
        'release_date': document.getElementById('inputCRelease').value
    }
    submitData(this.parentElement, 'http://127.0.0.1/api/v1/collections', data, addItemsTCollection);
})

document.querySelector('.task .btn.btn-primary').addEventListener('click', function(e) {
    e.preventDefault();

    let data = {
        'name': document.getElementById('inputTName').value,
        'description': document.getElementById('inputTDescription').value,
        'average_time': document.getElementById('inputTAverage').value,
        'cost': document.getElementById('inputTCost').value
    }
    submitData(this.parentElement, 'http://127.0.0.1/api/v1/tasks', data, addItemsTTask);
})

getData('http://127.0.0.1/api/v1/collections', addItemsTCollection);
getData('http://127.0.0.1/api/v1/tasks', addItemsTTask);
getData('http://127.0.0.1/api/v1/users', addItemsTUser);

closeAlert();