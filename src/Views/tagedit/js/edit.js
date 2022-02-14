
let form = document.forms.tag_form;

form.addEventListener('submit', async function(e){
    e.preventDefault();
    let id = this.id.value;
    let inputName = this.name;

    if(!inputName.value){
        alert("Por favor, preencha o nome da tag!");
        return false;
    }

    await axios.put(`./${id}`, {
        name: inputName.value
    })
    .then(response => {
        response = response.data;
        if(response.error){
            inputName.style.borderBottom = "2px solid red";
            alert(response.message);
            return false;
        }
        alert(response.message);
    })
    .catch(error => {
        console.error(error);
        alert("Erro inesperado ao atualizar tag!");
    });
});
