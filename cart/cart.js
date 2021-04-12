window.addEventListener('load',()=>{
    document.getElementById('table').addEventListener('change', updateQty)
})

const updateQty=(e)=>{
    let id=e.target.id;
    let qty=e.target.value;

    let xhr=new XMLHttpRequest();
    xhr.open('GET','cart_qty.php?id='+id+'&qty='+qty,true);
    xhr.addEventListener('readystatechange',()=>{
        if(xhr.readyState==4 &&xhr.status==200){
            console.log("XHR OK");
            location.reload();
        }
    })
    xhr.send();
}