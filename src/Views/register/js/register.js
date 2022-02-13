
let form = document.forms.product_form;

form.addEventListener('submit', async function(e){
    e.preventDefault();
    let inputName = this.name;
    let tagSelect = this.tags;
    let selectedTags = [];

    for(let i=0; i<tagSelect.length; i++){
        if(tagSelect[i].selected){
            selectedTags.push(tagSelect[i].value);
        }
    }

    if(!inputName.value || !selectedTags.length){
        alert("Por favor, preencha o nome do produto e escolha as tags!");
        return false;
    }

    await axios.post("./register", {
        name: inputName.value,
        tags: selectedTags
    })
    .then(response => {
        response = response.data;
        if(response.error){
            inputName.style.borderBottom = "2px solid red";
            tagSelect.style.borderBottom = "2px solid red";
        }
        alert("Produto cadastrado com sucesso!");
    })
    .catch(error => {
        console.error(error);
        alert("Erro inesperado ao cadastrar produto!");
    });
});
