async function deleteTag(id){
    if(confirm("Você tem certeza que deseja excluir esta tag?")){
        await axios.delete(`./tagdelete/${id}`).then(response => {
            response = response.data;
            document.getElementById(id).remove();
            alert(response.message);
        })
        .catch(error => {
            console.log(error);
            alert("Ocorreu um erro ao excluir a tag!");
        });
    }
}