// TOGGLE MODE
function ToggleMode(element,mode,v){
   let current=localStorage.getItem('mode') ?? 'light';
   if(current == 'light'){
      document.querySelector("#mode").href=`${mode}/dark.css?v=${v}`;
      localStorage.setItem('mode','dark');
      element.innerHTML=`<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M240,96a8,8,0,0,1-8,8H216v16a8,8,0,0,1-16,0V104H184a8,8,0,0,1,0-16h16V72a8,8,0,0,1,16,0V88h16A8,8,0,0,1,240,96ZM144,56h8v8a8,8,0,0,0,16,0V56h8a8,8,0,0,0,0-16h-8V32a8,8,0,0,0-16,0v8h-8a8,8,0,0,0,0,16Zm65.14,94.33A88.07,88.07,0,0,1,105.67,46.86a8,8,0,0,0-10.6-9.06A96,96,0,1,0,218.2,160.93a8,8,0,0,0-9.06-10.6Z"></path></svg>`;
   }
    else{
       document.querySelector("#mode").href=`${mode}/light.css?v=${v}`;
      localStorage.setItem('mode','light');  
      element.innerHTML=`<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M120,40V32a8,8,0,0,1,16,0v8a8,8,0,0,1-16,0Zm8,24a64,64,0,1,0,64,64A64.07,64.07,0,0,0,128,64ZM58.34,69.66A8,8,0,0,0,69.66,58.34l-8-8A8,8,0,0,0,50.34,61.66Zm0,116.68-8,8a8,8,0,0,0,11.32,11.32l8-8a8,8,0,0,0-11.32-11.32ZM192,72a8,8,0,0,0,5.66-2.34l8-8a8,8,0,0,0-11.32-11.32l-8,8A8,8,0,0,0,192,72Zm5.66,114.34a8,8,0,0,0-11.32,11.32l8,8a8,8,0,0,0,11.32-11.32ZM40,120H32a8,8,0,0,0,0,16h8a8,8,0,0,0,0-16Zm88,88a8,8,0,0,0-8,8v8a8,8,0,0,0,16,0v-8A8,8,0,0,0,128,208Zm96-88h-8a8,8,0,0,0,0,16h8a8,8,0,0,0,0-16Z"></path></svg>`;
    }
}


// LOAD MODE ON LOAD
function LoadMode(mode,v){
    let current=localStorage.getItem('mode') ?? 'light';
    let element=document.querySelector(".mode");
    if(current == 'light'){
   document.querySelector("#mode").href=`${mode}/light.css?v=${v}`; 
      element.innerHTML=`<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M120,40V32a8,8,0,0,1,16,0v8a8,8,0,0,1-16,0Zm8,24a64,64,0,1,0,64,64A64.07,64.07,0,0,0,128,64ZM58.34,69.66A8,8,0,0,0,69.66,58.34l-8-8A8,8,0,0,0,50.34,61.66Zm0,116.68-8,8a8,8,0,0,0,11.32,11.32l8-8a8,8,0,0,0-11.32-11.32ZM192,72a8,8,0,0,0,5.66-2.34l8-8a8,8,0,0,0-11.32-11.32l-8,8A8,8,0,0,0,192,72Zm5.66,114.34a8,8,0,0,0-11.32,11.32l8,8a8,8,0,0,0,11.32-11.32ZM40,120H32a8,8,0,0,0,0,16h8a8,8,0,0,0,0-16Zm88,88a8,8,0,0,0-8,8v8a8,8,0,0,0,16,0v-8A8,8,0,0,0,128,208Zm96-88h-8a8,8,0,0,0,0,16h8a8,8,0,0,0,0-16Z"></path></svg>`;
  
    }
     else{
          document.querySelector("#mode").href=`${mode}/dark.css?v=${v}`;
    
      element.innerHTML=`<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M240,96a8,8,0,0,1-8,8H216v16a8,8,0,0,1-16,0V104H184a8,8,0,0,1,0-16h16V72a8,8,0,0,1,16,0V88h16A8,8,0,0,1,240,96ZM144,56h8v8a8,8,0,0,0,16,0V56h8a8,8,0,0,0,0-16h-8V32a8,8,0,0,0-16,0v8h-8a8,8,0,0,0,0,16Zm65.14,94.33A88.07,88.07,0,0,1,105.67,46.86a8,8,0,0,0-10.6-9.06A96,96,0,1,0,218.2,160.93a8,8,0,0,0-9.06-10.6Z"></path></svg>`;
 
     }
}
// style main
function StyleMain(){
    let header=document.querySelector("header");
    let footer=document.querySelector('footer');
    let main=document.querySelector('main');
    let skeletons=document.querySelectorAll(".skeletons");
    main.style.marginTop=header.offsetHeight + 'px';
    main.style.marginBottom=footer.offsetHeight + 'px';
    skeletons.forEach((skeleton)=>{
        skeleton.style.paddingTop=header.offsetHeight + 10 +  'px';
  
    });

}
// SPA
async function spa(event,url,skeleton,element,active=null){
try{
    event.preventDefault();
if(active !== null){
    let links=document.querySelectorAll('footer .column');
    links.forEach((link)=>{
        link.classList.remove('active');
    })
    element.classList.add('active');
}
 else{
      let links=document.querySelectorAll('footer .column');
    links.forEach((link)=>{
        link.classList.remove('active');
    })
    document.querySelector('footer .home').classList.add('active');
 }
let loading=document.querySelector(`.${skeleton}-skeleton`);
document.body.style.overflow='hidden';
let main=document.querySelector("main");

main.innerHTML=loading.outerHTML;
main.querySelector('.skeletons').style.display="flex";
let response=await fetch(url);
if(response.ok){
    let data=await response.text();
    let div=document.createElement('div');
    div.innerHTML=data;
    let old_css=document.querySelectorAll(".css");
    if(old_css){
        
      old_css.forEach((css)=>{
          css.remove();
         
      })
    }
    let new_css=div.querySelectorAll(".css");
    if(new_css){
       new_css.forEach((css)=>{
        let link=document.createElement('link');
        link.rel='stylesheet';
        link.href=css.href;
        link.classList.add('css');
        document.head.appendChild(link);
       }) ;

    }
    let old_js=document.querySelectorAll('.js');
    if(old_js){
      if(window.MyFunc){
         delete window.MyFunc;
      }
        old_js.forEach((js)=>{
            js.remove();
        })
    }
    let new_js=div.querySelectorAll(".js");
    if(new_js){
        new_js.forEach((js)=>{
            let script=document.createElement('script');
            script.innerHTML=js.innerHTML;
            script.classList.add('js');
            if(js.src){
                script.src=js.src;
            }
            document.body.appendChild(script);
        });
    }
  main.innerHTML=div.querySelector('main').innerHTML;
 history.pushState({},'',url);
 document.body.style.overflow="auto";


}
 else{
    main.innerHTML=` <section class="fix">
        <img src="${fixImg}" alt="error">
        <b style="font-weight:800">${response.status} Error</b>
        <p>Oops! an error occured,please try again....</p>
     </section>`;
 }

}
 catch(error){
   CreateNotify('error',error.message + ' At' + error.stack);
 }

}

// Keyboard
function Keyboard(value,input,callback=null){
  try{
  
      if(value == 'x'){
        input.value=input.value.slice(0,-1);
      }
        else{
             input.value=input.value + value;
        }
         if(callback !== null){
            callback(input.value);
         }
  } catch(error){
    alert(error)
  }
       } 


// copy
function copy(content){
    if(navigator.clipboard.writeText(content)){
        CreateNotify('success','Copied successully');
    }
}
// slide up
function SlideUp(body=null){
    let parent=document.querySelector(".slideup");
    parent.classList.add('active');
    document.body.style.overflow='hidden';
    if(body !== null){
        parent.querySelector(".child .body").innerHTML=body;
    }
}
// hide slide up
function HideSlideUp(element){
    element.classList.remove('active');
    document.body.style.overflow='auto';
}
// Online 
function OnlineStatus(event,url){
     GetRequest(event,url,document.createElement('button'));
   setInterval(()=>{
     GetRequest(event,url,document.createElement('button'));
   },300000)
}

// calling functions
StyleMain();
