let loaderWrapper = document.querySelector('.loader-wrapper');
let logo = document.querySelector('.loader');
let logoSpan = document.querySelectorAll('.loader-logo');

window.addEventListener('DOMContentLoaded', ()=>{
    setTimeout(() => {
        logoSpan.forEach((span, idx)=>
        {
            setTimeout(() => {
                span.classList.add('active');
            }, (idx+1) * 400)
        });

        setTimeout(()=>
        {
            logoSpan.forEach((span, idx) =>
            {
                setTimeout(()=>{
                    span.classList.remove('active');
                    span.classList.add('fade');                    
                }, (idx + 1) * 50)
            })
        },2000);

        setTimeout(()=>
        {
            loaderWrapper.style.top = '-100vh';
        },3500)
    })
    if ( ! sessionStorage.getItem('doNotShow') ) 
    {
        sessionStorage.setItem( 'doNotShow', true );
    } 
    else 
    {
        $ ('.loader, .loader-wrapper').hide();
    }
})
