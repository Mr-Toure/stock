
let base = window.location.origin;
let link = window.location.origin + '/besoins/images/user.png';

/* CODE DE L'AJAX */


//  CREATION DE L'OBJET XMLHTTPREQUEST

function getXMLHttpRequest() {

    let xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject) {

        if (window.ActiveXObject) {

            try {

                xhr = new ActiveXObject("Msxml2.XMLHTTP");

            } catch(e) {

                xhr = new ActiveXObject("Microsoft.XMLHTTP");

            }

        } else {

            xhr = new XMLHttpRequest();

        }

    } else {

        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");

        return null;
    }


    return xhr;
}

/* var btnAddComment = document.querySelector('#btnAddComment');
var nav = document.querySelector('#nav'); */


let url = base + '/persons';

function request(callback, url) {
    let xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function(e) {

        if (xhr.readyState === 4 && (xhr.status === 200 || xhr.status === 0)) {
            callback(xhr.responseText, xhr.statusText);
        }
    };

    xhr.open("GET", url, true);
    xhr.send(null);
}

function readData(data, status) {
    // On peut maintenant traiter les données sans encombrer l'objet XHR.
    if (status === "OK") {
        document.querySelector("#result").innerHTML = data;
    } else {
        alert("Y'a eu un problème");
    }
}
let needs = document.querySelector('#needs');
let parents = document.querySelector('#newNeed');
let clickBtn = document.querySelectorAll(".admore");
let load = function(element){
    let counter = parseInt(element.getAttribute('data-count')) + 1;
    if(counter === 40){
        element.style.display = 'none';
    }
    let parent = parseInt(parents.getAttribute('data-parent'))
    const formDiv = document.createElement("div");
    formDiv.setAttribute('class', 'form-group');
    const label = document.createElement("label");
    label.innerText = "Fourniture " + counter;
    const div = document.createElement('div');
    div.setAttribute('class', 'form-inline');
    const select = document.createElement('select');
    select.setAttribute('name', 'agent-' + parent + '[article-' + counter + '][name]');
    select.setAttribute('class', 'chosen2 custom-select col-8 mr-2');
    let qte = document.createElement('input');
    qte.setAttribute('class', 'form-control col-3');
    qte.setAttribute('type', 'number');
    qte.setAttribute('name', 'agent-' + parent + '[article-' + counter + '][qte]');
    qte.setAttribute('placeholder', 'Quantité');
    qte.setAttribute('min', '0');
    qte.setAttribute('value', '1');
    for (let i =0; i< data.length ; i++){
        let option = document.createElement('option');
        option.setAttribute('value', data[i][0]);
        option.innerText = data[i][1];
        select.appendChild(option);
    }
    formDiv.appendChild(label);
    div.appendChild(select);
    div.appendChild(qte);
    formDiv.appendChild(div);
    document.querySelector('#element-' + parent + ' .input').append(formDiv);

    element.setAttribute('data-count', counter);
}
clickBtn.forEach(function(click){
    click.addEventListener("click", function(e){
        // let counted = parseInt(needs.getAttribute('data-counter'))
        load(this);
        
    });
})

if(document.querySelector("#newNeed")){
    let more = document.querySelector("#newNeed");
    more.addEventListener("click", function(e){
        e.preventDefault();
        let counter = parseInt(this.getAttribute('data-parent')) + 1;
        if(counter === 20){
            this.style.display = 'none';
        }
        const need = document.createElement("div");
        need.setAttribute('class', 'one-need');
        const agent = document.createElement("div");
        agent.setAttribute('class', 'agent');
        const profil = document.createElement("div");
        profil.setAttribute('class', 'profil');
        profil.setAttribute('id', 'need-' + counter);
        const img = document.createElement('img');
        img.setAttribute('id', 'profil-' + counter);
        img.src = link;
        const loader = document.createElement("div");
        loader.setAttribute('class', 'loader');
        const forms = document.createElement("div");
        forms.setAttribute('class', 'form-group');
        const labels = document.createElement("label");
        labels.innerText = "Choisir l'Agent " + counter;
        const select = document.createElement('select');
        select.setAttribute('class', 'custom-select form-control agents');
        select.setAttribute('name', 'agent-' + counter + '[name]');
        select.setAttribute('data-count', counter);
        select.setAttribute('id', 'agent-' + counter);
        let opt =  document.createElement('option');
        opt.innerText = 'Choisir Agent';
        opt.setAttribute('desabled', 'desabled')
        opt.setAttribute('selected', '')
        select.appendChild(opt)
        for (let i =0; i< allAgent.length ; i++){
            let option = document.createElement('option');
            option.setAttribute('value', allAgent[i][0]);
            option.innerText = allAgent[i][1];
            select.appendChild(option);
        }
        select.addEventListener('change', function(e){
            let uri = e.target.options[e.target.selectedIndex].value
            let img = document.querySelector("#profil-" + counter)
            img.src = base + "/mystock/persons/d/agents/" + uri;
            document.querySelector("#element-" + counter).style.display = 'block';
        })
        profil.appendChild(img)
        profil.appendChild(loader)
        need.appendChild(profil);
        agent.appendChild(profil)
        forms.appendChild(labels)
        forms.appendChild(select)
        agent.appendChild(forms);
        need.appendChild(agent)

        const elmt = document.createElement("div");
        elmt.setAttribute('class', 'elements');
        elmt.setAttribute('id', 'element-' + counter);
        const inputs = document.createElement("div");
        inputs.setAttribute('class', 'input');
        const btn = document.createElement('div');
        btn.setAttribute('class', 'btn btn-outline-info d-none float-right custom-radio admore');
        btn.setAttribute('data-count', '1');
        btn.addEventListener('click', function(e){
            load(this);
        })
        const icon = document.createElement('i');
        icon.setAttribute('class', 'fas fa-plus');

        const formDiv = document.createElement("div");
        formDiv.setAttribute('class', 'form-group');
        const label = document.createElement("label");
        label.innerText = "Fourniture 1";
        const div = document.createElement('div');
        div.setAttribute('class', 'form-inline');
        const selects = document.createElement('select');
        selects.setAttribute('class', 'chosen custom-select col-8 mr-2');
        selects.setAttribute('required', '')
        selects.setAttribute('name', 'agent-' + counter + '[article-1][name]');
        let qte = document.createElement('input');
        qte.setAttribute('class', 'form-control col-3');
        qte.setAttribute('type', 'number');
        qte.setAttribute('name', 'agent-' + counter + '[article-1][qte]');
        qte.setAttribute('placeholder', 'Quantité');
        qte.setAttribute('min', '0');
        qte.setAttribute('value', '1');
        for (let i =0; i< data.length ; i++){
            let option = document.createElement('option');
            option.setAttribute('value', data[i][0]);
            option.innerText = data[i][1];
            selects.appendChild(option);
        }
        formDiv.appendChild(label);
        div.appendChild(selects);
        div.appendChild(qte);
        formDiv.appendChild(div);
        inputs.appendChild(formDiv);
        elmt.appendChild(inputs);
        btn.appendChild(icon);
        elmt.appendChild(btn);
        need.appendChild(elmt)
        document.querySelector('#needs').appendChild(need);
        this.setAttribute('data-parent', counter);
    });
}




