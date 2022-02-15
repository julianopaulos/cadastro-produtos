async function deleteProduct(id){
    if(confirm("Você tem certeza que deseja excluir este produto e as tags relacionadas a ele?")){
        await axios.delete(`./productdelete/${id}`).then(response => {
            response = response.data;
            document.getElementById(id).remove();
            alert(response.message);
        })
        .catch(error => {
            console.log(error);
            alert("Ocorreu um erro ao excluir o produto!");
        });
    }
}