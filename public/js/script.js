// CREATE NOTIFY
function CreateNotify(status,message){
  let notifies=document.querySelectorAll(".notify");
  notifies.forEach((note)=>{
    note.remove();
  });
    let notify=document.createElement("section");
    notify.classList.add('notify');
    notify.classList.add(status);
    let icon='';
    if(status == 'success'){
     icon=`<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>`;
    } else{
      icon=`<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path></svg>`;
    }
    notify.innerHTML=`<span class="icon">${icon}</span> <span class="right-auto">${message}</span>
        <svg onclick="HideNotify(document.querySelector('.notify'))" class="bottom-auto pointer close" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
  `;
  document.body.appendChild(notify);
  setTimeout(() => {
    notify.remove()
  },2000);
}
// HIDE NOTIFY
function HideNotify(notify){
notify.remove();
}
// POST REQUEST
async function PostRequest(event,element,callback=null){
 try{
   event.preventDefault();
  let required=element.querySelectorAll(".cont.required");
  let isEmpty=false;
  required.forEach((cont)=>{
    if(cont.querySelector(".inp").value == ''){
      isEmpty=true;
      cont.classList.add('active');
      setTimeout(() => {
        cont.classList.remove("active");
      }, 300);
    }

  });
  if(!isEmpty){
    let button=element.querySelector("button.post");
    button.classList.add("active");
    let inp=element.querySelectorAll(".input");
    let form=new FormData();
    let files=element.querySelectorAll('input[type=file].file');
    if(files){
      files.forEach((inp)=>{
        let file=inp.files[0];
        if(file){
          form.append(inp.name,file);
        }

      })
    }
    inp.forEach((inp)=>{
      form.append(inp.name,inp.value);

    });
    let response=await fetch(element.action,{
      method : 'POST',
      body : form
     });
     if(response.ok){
    
      let data=await response.json();

      CreateNotify(data.status,data.message);
       button.classList.remove('active');
      if(callback !== null){
        callback(JSON.stringify(data),event);
      }

     }
      else{
        CreateNotify('error',response.status + ' Error');
        button.classList.remove('active');
      }
  }
 }
  catch(error){
    alert(error);
  }
}
// stop propagating
function StopProp(event){
  event.stopPropagation();
}
  // Pop up
  function PopUp(content=null){
      if(content != null){
      document.querySelector('.popup .child').innerHTML=content;
    }
    document.querySelector('.popup').classList.add('active');
    document.body.style.overflow='hidden';
  
  }
  
  // hide popup
   function HidePopUp(element,callback=null){
    element.classList.remove('active');
    document.body.style.overflow='auto';
    if(callback !== null){
      callback()
    }
  }
// Get request
async function GetRequest(event,url,element,callback=null){
  try{
      element.classList.add('active');
     let response=await fetch(url);
     if(response.ok){
    
        if(callback !== null){
            callback(await response.text(),event);

        }
        element.classList.remove('active');
     }
      else{
        CreateNotify('error',response.status + ' Error');
         element.classList.remove('active');
      }
  }
   catch(error){
    CreateNotify('error',error);
   }
}
// hide pulse
function HidePulse(){
  document.querySelector('.pulse-container').style.display='none';
  document.body.style.overflow='auto';
}
window.onload=function(){
  HidePulse();
}