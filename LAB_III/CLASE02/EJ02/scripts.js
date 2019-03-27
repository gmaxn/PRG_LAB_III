var btnModal = document.getElementById('btnModal');
var btnCerrar = document.getElementById('btnCerrar');
var modal = document.getElementById('modal');

window.addEventListener('load', ()=>{
    btnModal = document.getElementById('btnModal');
    btnCerrar = document.getElementById('btnCerrar');
    modal = document.getElementById('modal');
    
    
    btnModal.addEventListener('click', ()=>{
        
            modal.setAttribute('open', true);
        
    });
    
    btnModal.addEventListener('click', ()=>{
    
        modal.setAttribute('open', true);
    
    });
    
    btnModal.addEventListener('click', ()=>{
    
        modal.removeAttribute('open');
    
    });

});

