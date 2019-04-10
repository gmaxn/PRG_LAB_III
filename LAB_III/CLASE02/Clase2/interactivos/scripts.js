var btnModal;
var btnCerrar;
var modal;


window.addEventListener('load', ()=>{


    btnModal = document.getElementById('btnModal');
    btnCerrar = document.getElementById('btnCerrar');
    modal = document.getElementById('modal');

    btnModal.addEventListener('click', () => {

        modal.setAttribute('open', true); //---> https://www.w3schools.com/jsref/met_element_setattribute.asp

    });
    
    btnCerrar.addEventListener('click', () => {
    
        modal.removeAttribute('open'); //---> https://www.w3schools.com/jsref/met_element_removeattribute.asp
    
    
    });

})




 

