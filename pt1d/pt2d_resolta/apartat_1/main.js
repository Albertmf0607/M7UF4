window.onload=()=>{
    
    
    const form = document.getElementById('form');

    form.addEventListener('submit', (event) => {
        const date = document.getElementById('date').value;
        const date2 = new Date(date);
        if (date2 > new Date()) {
            alert('La fecha no puede ser futura');
            event.preventDefault();
        }
    });
    
    
    var input = document.getElementById('input');
    input.style.display = 'none';
    var checkbox = document.getElementById('checkbox');
    checkbox.addEventListener('click', () => {
        var select = document.getElementById('select');
        var input = document.getElementById('input');
        if(checkbox.checked){
            select.style.display = 'none';
            input.style.display = 'block';
        }else{
            select.style.display = 'block';
            input.style.display = 'none';
        }
    })
}
function eliminar(nom){

    if(!confirm('Vols eliminar: ' + nom)){
        return false;
    }

}