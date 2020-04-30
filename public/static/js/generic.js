function closeAlert() {
    let show = document.querySelectorAll('.alert.alert-danger')
    for (let i = 0; i < show.length; i++) {
        show[i].addEventListener("click", function(){this.style.display="none"})
    }
}

function checkToken(response) {
    if (response.status == 401) {
        window.location.href = "http://127.0.0.1/dashboard/login";
        localStorage.clear();
    } else {
        if (response.headers.get('Meu-Token') != null) {
            localStorage.setItem('token', response.headers.get('Meu-Token'))
        }
    }
    return response
}

function getData(uri, addLocal, headers = {}) {
    fetch(uri, {method: 'get', headers: headers})
    .then(function(response) {return checkToken(response)})
    .then(function(response) {
        return response.json()
    })
    .then(function(data) {
        if (!data.status) {
            console.log(data);
        } else {
            if (typeof(data.data) == 'undefined') {
                addLocal(data);
            } else {
                addLocal(data.data);
            }
        }
    })
    .catch(function(err) {
        console.log(err);
    });
}

function submitData(pElement, uri, localData, addLocal, headers = {"Content-Type": "application/json"}) {
    let message = pElement.querySelector('.alert.alert-danger');

    fetch(uri, {
        method: 'post',
        headers: headers,
        body: JSON.stringify(localData)
    })
    .then(function(response) {return checkToken(response)})
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

function deleteItem(uri, id, localItem, headers = {}) {
    if (confirm('Deseja realmente excluir?')) {
        fetch(uri+'/'+id, {method: 'delete', headers: headers})
        .then(function(response) {return checkToken(response)})
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