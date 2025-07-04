function UpdateSend(element){
    if(element.value.trim() == ''){
        document.querySelector(".send").classList.add('active');
    }
     else{
        document.querySelector(".send").classList.remove('active');
     }
}
// send message
let ChatId=null;
async function SendMessage(element,url,token,id=null){
   try{
     if(id !== null){
        ChatId=id;

    }
   let message=document.querySelector('input.message');
   let form=new FormData();
   form.append('message',message.value);
    form.append('_token',token);
if(ChatId !== null){
    form.append('chat_id',ChatId);
}
element.classList.add('active');
let body=document.querySelector('.section1 .body');
body.innerHTML+=`<div class="messages receiver">
       <span>${message.value}</span>
       <span class="frame">sending....</span>
    </div>`;
    message.value='';
   let response=await fetch(url,{
    method : 'POST',
    body : form
    });
    if(response.ok){
        let data=await response.json();
       body.innerHTML=data.chats;
       ChatId=data.chat_id;
       scrollToLast();
       let chat_link=new URL(window.location.href);
       chat_link.searchParams.set('chat_id',ChatId);
       history.pushState({},'',chat_link);
        document.querySelector('.header .admin').innerHTML=data.head;
    }
     else{
        
        CreateNotify('error',response.status);
     }
     
   }
    catch(error){
        alert(error.stack)
    }
    
}
function scrollToLast(){
    let a=document.createElement('a');
    a.href='#last';
    a.click();
}
// cakling function
scrollToLast();