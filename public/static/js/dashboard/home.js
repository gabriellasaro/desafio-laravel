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

        let view = document.createElement('td');
        view.innerHTML = '<button type="button" class="btn btn-success btn-sm">Processos</button>';
        tr.appendChild(view);

        view.addEventListener('click', function() {
            document.querySelectorAll('.table.table-bordered tbody')[2].innerHTML = "";
            window.setTimeout(function() {
                getData('http://192.168.6.10/api/v1/users/'+localStorage.getItem('user_id')+'/collections/'+data[i].id+'/processes', addItemsTProcess, {'Meu-Token':localStorage.getItem('token')});
            }, 650);
            document.querySelector('h4 span').innerText = data[i].name;
        })

        table.appendChild(tr)
    }
}

function addItemsTTask(data) {    
    let table = document.querySelectorAll('.table.table-bordered tbody')[1];

    for (let i = 0; i < data.length; i++) {
        let tr = document.createElement('tr');

        let name = document.createElement('td');
        name.innerText = data[i].name;
        tr.appendChild(name)
    
        let descrition = document.createElement('td');
        descrition.innerText = data[i].description;
        tr.appendChild(descrition)
    
        let average = document.createElement('td');
        average.innerText = data[i].average_time+' minutos';
        tr.appendChild(average)
    
        let cost = document.createElement('td');
        cost.innerHTML = 'R$ '+data[i].cost;
        tr.appendChild(cost)

        table.appendChild(tr)
    }
}

function addItemsTProcess(data) {
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
    
        let descrition = document.createElement('td');
        descrition.innerText = data[i].description;
        tr.appendChild(descrition)
    
        let quant = document.createElement('td');
        quant.innerHTML = '<span>' + data[i].quant + '</span> (<span>0</span> <span>minutos</span>)';
        tr.appendChild(quant)
    
        let finish = document.createElement('td');
        finish.innerHTML = '<button type="button" class="btn btn-warning">Finalizar +1</button>'
        tr.appendChild(finish)

        finish.addEventListener('click', function() {
            if (confirm("Deseja adicionar mais um item como finalizado?")) {
                let q = quant.querySelectorAll('span');
                let r = (parseInt(q[0].innerText)+1)*parseInt(document.querySelectorAll('.table.table-bordered tbody')[1].querySelectorAll('tr td')[2].innerText);
                if (r>=60) {
                    q[2].innerText = "horas";
                    r = r/60;
                }
                q[1].innerText = r;
                q[0].innerText = parseInt(q[0].innerText)+1;

                // Enviar para o servidor.
            }
        })

        table.appendChild(tr)
    }
}

getData('http://127.0.0.1/api/v1/collections/production', addItemsTCollection, {'Meu-Token':localStorage.getItem('token')})
window.setTimeout(function(){
    getData('http://127.0.0.1/api/v1/users/'+localStorage.getItem('user_id')+'/tasks', addItemsTTask, {'Meu-Token':localStorage.getItem('token')})
}, 300);