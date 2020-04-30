function closeAlert() {
    let show = document.querySelectorAll('.alert.alert-danger')
    for (let i = 0; i < show.length; i++) {
        show[i].addEventListener("click", function(){this.style.display="none"})
    }
}

function getData(uri, addLocal) {    
    fetch(uri, {method: 'get'})
    .then(function(response) {
        return response.json()
    })
    .then(function(data) {
        if (!data.status) {
            console.log(data);
        } else {
            addLocal(data.data);
        }
    })
    .catch(function(err) {
        console.log(err);
    });
}

function submitData(pElement, uri, localData, addLocal) {
    let message = pElement.querySelector('.alert.alert-danger');

    fetch(uri, {
        method: 'post',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(localData)
    })
    .then(function(response) {
        return response.json()
    })
    .then(function(data) {
        if (!data.status) {
            message.innerText = data.message;
            message.style.display = "block";
        } else {
            console.log(data)
            console.log(localData)
            pElement.style.display = 'none';
            localData['id'] = data.id;
            addLocal([localData]);
        }
    })
    .catch(function(data) {
        message.innerHTML = "Algo não ocorreu como esperado!<br>";
        message.style.display = "block";
        message.appendChild(document.createTextNode(data));
    });
}

function deleteItem(uri, id, localItem) {
    if (confirm('Deseja realmente excluir?')) {
        fetch(uri+'/'+id, {method: 'delete'})
        .then(function(response) {
            return response.json()
        })
        .then(function(data) {
            if (!data.status) {
                console.log(data);
            } else {
                localItem.remove();
            }
        })
        .catch(function(err) {
            console.log(err);
        });
    }
}