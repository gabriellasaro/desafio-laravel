function addCollection(data) {
    document.title = data.name + ' | ' + document.title;

    let table = document.querySelector('.table.table-bordered tbody');

    let tr = document.createElement('tr');

    let name = document.createElement('td');
    name.innerText = data.name;
    tr.appendChild(name)

    let descrition = document.createElement('td');
    descrition.innerText = data.description;
    tr.appendChild(descrition)

    let release_date = document.createElement('td');
    release_date.innerText = data.release_date;
    tr.appendChild(release_date)

    table.appendChild(tr)
}

function addItemsTModel(rawData) {
    let data = []

    if (typeof(rawData.length) == 'undefined') {
        addCollection(rawData.collection);
        data.push(...rawData.models)
    } else {
        data.push(...rawData)
    }

    let table = document.querySelectorAll('.table.table-bordered tbody')[1];

    for (let i = 0; i < data.length; i++) {
        let tr = document.createElement('tr');
        
        let row = document.createElement('th');
        row.setAttribute('scope', 'row');
        let nrow = i;
        row.innerText = (nrow+1);

        tr.appendChild(row);

        let code = document.createElement('td');
        code.innerText = data[i].code;
        tr.appendChild(code)
        
        let name = document.createElement('td');
        name.innerText = data[i].name;
        tr.appendChild(name)

        let description = document.createElement('td');
        description.innerText = data[i].description;
        tr.appendChild(description)

        let quant = document.createElement('td');
        quant.innerText = data[i].quant;
        tr.appendChild(quant)

        let img = document.createElement('td');
        img.innerHTML = data[i].img;
        tr.appendChild(img)

        let finalized = document.createElement('td');
        finalized.innerHTML = data[i].finalized;
        tr.appendChild(finalized)

        let actions = document.createElement('td');
        actions.innerHTML = '<div class="btn-group" role="group" aria-label="Ações">\
        <button type="button" class="btn btn-warning btn-sm" disabled>Editar</button>\
        <button type="button" class="btn btn-danger btn-sm">Excluir</button>\
        </div>';
        tr.appendChild(actions)

        actions.querySelector('.btn.btn-danger.btn-sm').addEventListener('click', function() {
            deleteItem('http://127.0.0.1/api/v1/models', data[i].id, this.parentElement.parentElement.parentElement);
        })

        table.appendChild(tr)
    }
}

document.querySelector('.btn.btn-outline-primary.btn-sm').addEventListener('click', function() {
    let show = document.querySelector('.model');
    show.reset();
    if (show.style.display == 'none') {
        show.style.display = "block";
    } else {
        show.style.display = "none";
    }
})

document.querySelector('.model .btn.btn-primary').addEventListener('click', function(e) {
    e.preventDefault();

    let data = {
        name: document.getElementById('inputName').value,
        description: document.getElementById('inputDescription').value,
        quant: document.getElementById('inputQuant').value,
        img: document.getElementById('inputImg').value,
        code: document.getElementById('inputCode').value
    }
    submitData(this.parentElement, 'http://127.0.0.1/api/v1/collections/'+window.location.pathname.split('/').pop()+'/models', data, addItemsTModel);
})

getData('http://127.0.0.1/api/v1/collections/'+window.location.pathname.split('/').pop()+'/models', addItemsTModel)

closeAlert();