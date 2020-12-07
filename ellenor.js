window.addEventListener('load', init);

function init(){
    document.getElementById('btn').addEventListener('click', ellenorzes)
}
function ellenorzes(e){
    let jelszo1=document.getElementById('pw1').value
    let jelszo2=document.getElementById('pw2').value
    if(jelszo1 != jelszo2){
        e.preventDefault();
        document.getElementById('msg').innerHTML="Nem egyezik a két jelszó"
    }
}