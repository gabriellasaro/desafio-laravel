function addTask(data) {
    document.title = data.name + ' | ' + document.title;
    
    let table = document.querySelector('.table.table-bordered tbody');

    let tr = document.createElement('tr');

    let name = document.createElement('td');
    name.innerText = data.name;
    tr.appendChild(name)

    let descrition = document.createElement('td');
    descrition.innerText = data.description;
    tr.appendChild(descrition)

    let average = document.createElement('td');
    average.innerText = data.average_time + " minutos";
    tr.appendChild(average)

    let cost = document.createElement('td');
    cost.innerHTML = "R$ " + data.cost;
    tr.appendChild(cost)

    table.appendChild(tr)
}

function addItemsTUser(data) {
    addTask(data.task);
    
    let table = document.querySelectorAll('.table.table-bordered tbody')[1];

    for (let i = 0; i < data.users.length; i++) {
        let tr = document.createElement('tr');
        
        let row = document.createElement('th');
        row.setAttribute('scope', 'row');
        let nrow = i;
        row.innerText = (nrow+1);

        tr.appendChild(row);

        let name = document.createElement('td');
        name.innerText = data.users[i].name;
        tr.appendChild(name)

        let company = document.createElement('td');
        company.innerText = data.users[i].company;
        tr.appendChild(company)

        let cnpj = document.createElement('td');
        cnpj.innerText = data.users[i].cnpj;
        tr.appendChild(cnpj)

        let address = document.createElement('td');
        address.innerText = data.users[i].address;
        tr.appendChild(address)

        let phone = document.createElement('td');
        phone.innerText = data.users[i].phone;
        tr.appendChild(phone)

        let responsible = document.createElement('td');
        responsible.innerHTML = data.users[i].responsible;
        tr.appendChild(responsible)

        table.appendChild(tr)
    }
}

getData('http://127.0.0.1/api/v1/tasks/'+window.location.pathname.split('/').pop()+'/users', addItemsTUser)

closeAlert();