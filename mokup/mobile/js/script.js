const moreBtn=document.querySelector('.info .moreBtn');
const title=document.querySelector('.info .metadata .title');
moreBtn.addEventListener('click', ()=>{
    title.classList.toggle('addClick');
    moreBtn.classList.toggle('clicked');
});