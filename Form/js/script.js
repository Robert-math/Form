document.addEventListener('DOMContentLoaded',function(){

   let b1 = document.getElementById('b1');
   let b2 = document.getElementById('b2');
   let b3 = document.getElementById('b3');
   let b4 = document.getElementById('b4');
    let form = document.getElementById('form');
    form.addEventListener('submit',formSend);
    async function formSend(e){
        let count = 0;
        e.preventDefault();
        let formData = new FormData(form);
        if(b1.classList.contains('active')){formData.append('B1','Այո');count++;}else{formData.append('B1','Ոչ')}
        if(b2.classList.contains('active')){formData.append('B2','Այո');count++;}else{formData.append('B2','Ոչ')}
        if(b3.classList.contains('active')){formData.append('B3','Այո');count++;}else{formData.append('B3','Ոչ')}
        if(b4.classList.contains('active')){formData.append('B4','Այո');count++;}else{formData.append('B4','Ոչ')}
        showBedge(count);
        window.scrollBy(0,400);
        let response = await fetch('sendmail.php',{
            method: 'POST',
            body: formData
        });
        if(response.ok){
            let result = await response.json();
           
            formPreview.innerHTML = '';
            form.reset();
            b1.classList.remove('active');
            b2.classList.remove('active');
            b3.classList.remove('active');
            b4.classList.remove('active');
        }
    }

    function showBedge(count){
        if(count==4){document.getElementById('green').classList.toggle('show'); return;}
        if(count ==3 || count == 2){document.getElementById('yellow').classList.toggle('show'); return;}
        if(count ==1 || count == 0){document.getElementById('red').classList.toggle('show'); return;}
    }
});
