window.addEventListener('load', init)

function init(){
    console.log('init')
    document.getElementById('btn').addEventListener('click', ellenorzes)
    document.getElementById('us').addEventListener('focusout', vizsgal)
    document.getElementById('em').addEventListener('focusout', vizsgal)
}
function ellenorzes(e){
    let jelszo1=document.getElementById('pw1').value
    let jelszo2=document.getElementById('pw2').value
    if(jelszo1 != jelszo2){
        e.preventDefault();
        document.getElementById('msg').innerHTML="Nem egyezik a két jelszó"
    }
}

function vizsgal(e){
    console.log("OK")
    console.log(e.target.id+" --- "+e.target.value)

    let xhr=new XMLHttpRequest()
    xhr.open("GET","userCheck.php?"+e.target.id+"="+e.target.value,true)
    xhr.addEventListener('readystatechange',()=>{
        if(xhr.readyState==4 && xhr.status==200){
            document.getElementById('msg').innerHTML=xhr.responseText
            
            if(xhr.responseText.length>0){
               document.getElementById(e.target.id).value="";
            }
        }
    })
    xhr.send();
}
