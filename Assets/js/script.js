function ajaxDelete(url){
    
    fetch(url).then(response => response.json())
    .then(data=>{
        console.log(data);
        if(data == 1){
            location.reload();
        }else{
            alert("no se a podido borrar");
        }
    })
}