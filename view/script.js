 
/*********************************************JS FOR INDEX PAGE************************************ */

function showSignup() {
    document.querySelector(".signup").classList.remove("d-none");
    document.querySelector(".login").classList.remove("d-flex");
    document.querySelector(".login").classList.add("d-none");
}

/*********************************************JS FOR USER PAGE************************************ */

//HIDE SECTIONS FOR SEARCH

    document.getElementById("myFrm").addEventListener("submit", function(event){
        document.getElementById('myTasks').innerHTML = "";
    });
//MARK DONE CHECK BOX DEACTIVATION
function check(checkbox) {
    var dMarkDone = checkbox.parentElement;
    var isChecked = checkbox.checked;

    if (isChecked) {
        document.getElementById("taskDone").value=checkbox.value;
        dMarkDone.innerHTML = '<i class="fa-solid fa-check"></i>';
        document.getElementById('tD').submit();
    }
}


/*********************************************JS FOR ADMIN PAGE************************************ */
function editContent(link){
if(link.closest('tr').querySelector('#d0').contentEditable==="true"){
console.log(link.closest('tr').querySelector('#d0').isContentEditable);
link.closest('tr').querySelector('#d0').contentEditable=false;
link.closest('tr').querySelector('#d1').contentEditable=false;
link.closest('tr').querySelector('#d2').contentEditable=false;
link.closest('tr').querySelector('#d3').contentEditable=false;
link.closest('tr').querySelector('#d4').contentEditable=false;
link.closest('tr').querySelector('#d5').contentEditable=false;
link.closest('tr').querySelector('#d6').contentEditable=false;
link.closest('tr').querySelector('#d7').innerHTML='<i class="fa-solid fa-pen-to-square"></i>';
console.log(link.closest('tr').querySelector('#d1').textContent);
document.getElementById('updateD0').value=link.closest('tr').querySelector('#d0').textContent;
document.getElementById('updateD1').value=link.closest('tr').querySelector('#d1').textContent;
document.getElementById('updateD2').value=link.closest('tr').querySelector('#d2').textContent;
document.getElementById('updateD3').value=link.closest('tr').querySelector('#d3').textContent;
document.getElementById('updateD4').value=link.closest('tr').querySelector('#d4').textContent;
document.getElementById('updateD5').value=link.closest('tr').querySelector('#d5').textContent;
document.getElementById('updateD6').value=link.closest('tr').querySelector('#d6').textContent;
document.getElementById('updateD7').value=link.closest('tr').querySelector('#d7').textContent;
document.getElementById('formToSubmit').submit();
}
else{
console.log(link.closest('tr').querySelector('#d0').isContentEditable);
link.closest('tr').querySelector('#d0').contentEditable=true;
link.closest('tr').querySelector('#d1').contentEditable=true;
link.closest('tr').querySelector('#d2').contentEditable=true;
link.closest('tr').querySelector('#d3').contentEditable=true;
link.closest('tr').querySelector('#d4').contentEditable=true;
link.closest('tr').querySelector('#d5').contentEditable=true;
link.closest('tr').querySelector('#d6').contentEditable=true;
link.closest('tr').querySelector('#d7').innerHTML='<i class="fa-sharp fa-solid fa-floppy-disk"></i>';}

}

