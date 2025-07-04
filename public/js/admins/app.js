function ExpandNav(element){
   let parent=element.parentNode;
  if(parent.classList.contains('active')){
    parent.classList.remove('active');
  }
   else{
    parent.classList.add('active');
   }
}

// Toggle Menu
function ToggleMenu(){
    let nav=document.querySelector('nav');
    nav.classList.add('active');
    document.body.style.overflow="hidden";
}
// Hide Menu
function HideMenu(){
     let nav=document.querySelector('nav');
    nav.classList.remove('active');
    document.body.style.overflow="auto";
}
// style main
function StyleMain(){
    let header=document.querySelector("header");
   
    let main=document.querySelector('main');
  
    main.style.marginTop=header.offsetHeight + 'px';
   
   

}
// Search Request
async function SearchRequest(input,url,suggest){
    if(input.value == ''){
        suggest.innerHTML='';
    }
    let response=await fetch(`${url}?q=${encodeURIComponent(input.value)}`);
    if(response.ok){
        let data=await response.text();
        suggest.innerHTML=data;
    }
     else{
        suggest.innerHTML=` <a><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216ZM80,108a12,12,0,1,1,12,12A12,12,0,0,1,80,108Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,176,108Zm-1.08,64a8,8,0,1,1-13.84,8c-7.47-12.91-19.21-20-33.08-20s-25.61,7.1-33.08,20a8,8,0,1,1-13.84-8c10.29-17.79,27.39-28,46.92-28S164.63,154.2,174.92,172Z"></path></svg><span class="right-auto">${response.status} Error</span></a>
`;
     }
}
// toggle
function Toggle(element,inp){
    let parent=element.parentNode;
    if(parent.classList.contains('active')){
        parent.classList.remove('active');
        inp.value='inactive';
    }
     else{
          parent.classList.add('active');
        inp.value='active';
     }
}
// Calling Functions
StyleMain();