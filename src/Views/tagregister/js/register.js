
let form = document.forms.tag_form;

form.addEventListener('submit', async function(e){
    e.preventDefault();
    let inputName = this.name;

    if(!inputName.value){
        alert("Por favor, preencha o nome da tag!");
        return false;
    }

    await axios.post("./tagregister", {
        //name: inputName.value
    })
    .then(response => {
        response = response.data;
        if(response.error){
            inputName.style.borderBottom = "2px solid red";
            alert(response.message);
            return false;
        }
        alert(response.message);
        form.reset();
    })
    .catch(error => {
        if(error.response && error.response.data && error.response.data.message){
            inputName.style.borderBottom = "2px solid red";
            alert(error.response.data.message);
            return false;
        }
        console.error(error);
        alert("Erro inesperado ao cadastrar tag! ");
    });
});
