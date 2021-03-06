async function deleteTag(id){
    if(confirm("Você tem certeza que deseja excluir esta tag?")){
        await axios.delete(`./tagdelete/${id}`).then(response => {
            response = response.data;
            document.getElementById(id).remove();
            if(document.querySelector(".content table tbody").childElementCount === 0){
                let tr_element = document.createElement("tr");
                let td_element = document.createElement("td");
                td_element.colSpan = 2;
                td_element.innerHTML = "<h3 align='center'>Nenhuma tag cadastrado!</h3>";
                tr_element.appendChild(td_element);
                document.querySelector(".content table tbody").appendChild(tr_element);
            }
            alert(response.message);
        })
        .catch(error => {
            if(error.response && error.response.data && error.response.data.message){
                alert(error.response.data.message);
                return false;
            }
            console.log(error);
            alert("Ocorreu um erro ao excluir a tag!");
        });
    }
}