 
/*********************************************JS FOR INDEX PAGE************************************ */

function showSignup() {
    document.querySelector(".signup").classList.remove("d-none");
    document.querySelector(".login").classList.remove("d-flex");
    document.querySelector(".login").classList.add("d-none");
}

/*********************************************JS FOR USER PAGE************************************ */



/*********************************************JS FOR ADMIN PAGE************************************ */
function editContent(link){
if(link.closest('tr').querySelector('#d0').contentEditable===true){
link.closest('tr').querySelector('#d0').contentEditable=false;
link.closest('tr').querySelector('#d1').contentEditable=false;
link.closest('tr').querySelector('#d2').contentEditable=false;
link.closest('tr').querySelector('#d3').contentEditable=false;
link.closest('tr').querySelector('#d4').contentEditable=false;
link.closest('tr').querySelector('#d5').contentEditable=false;
link.closest('tr').querySelector('#d6').contentEditable=false;
link.closest('tr').querySelector('#d7').innerHTML='<i class="fa-solid fa-pen-to-square"></i>';
}
else{
link.closest('tr').querySelector('#d0').contentEditable=true;
link.closest('tr').querySelector('#d1').contentEditable=true;
link.closest('tr').querySelector('#d2').contentEditable=true;
link.closest('tr').querySelector('#d3').contentEditable=true;
link.closest('tr').querySelector('#d4').contentEditable=true;
link.closest('tr').querySelector('#d5').contentEditable=true;
link.closest('tr').querySelector('#d6').contentEditable=true;
link.closest('tr').querySelector('#d7').innerHTML='<i class="fa-sharp fa-solid fa-floppy-disk"></i>';}

}

