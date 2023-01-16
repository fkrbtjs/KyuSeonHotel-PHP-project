
function check_input()
{
    let p1 = document.getElementById('error_id');
    let p2 = document.getElementById('error_name');
    let p3 = document.getElementById('error_email1');
    let p4 = document.getElementById('error_phone');
    let p5 = document.getElementById('error_pass1');
    let p6 = document.getElementById('error_pass2');
    let p7 = document.getElementById('error_confirm_pass1');
    if(p1) p1.remove();
    if(p2) p2.remove();
    if(p3) p3.remove();
    if(p4) p4.remove();
    if(p5) p5.remove();
    if(p6) p6.remove();
    if(p7) p7.remove();
    
   
      if (!document.register_form.id.value) {
          let tag = document.querySelector('.confirm_id');
          let p = document.createElement('p');
          p.setAttribute('class','error');
          p.setAttribute('id','error_id');
          p.innerHTML = "아이디를 입력해주세요";
          tag.append(p);
          document.register_form.id.focus();
          return;
      }
      if (!document.register_form.name.value) {
          let tag = document.querySelector('.confirm_name');
          let p = document.createElement('p');
          p.setAttribute('id','error_name');
          p.setAttribute('class','error');
          p.innerHTML = "이름을 입력해주세요";
          tag.append(p);
          document.register_form.name.focus();
          return;  
      }
      if (!document.register_form.email1.value) {
          let tag = document.querySelector('.confirm_email1');
          let p = document.createElement('p');
          p.setAttribute('id','error_email1');
          p.setAttribute('class','error');
          p.innerHTML = "이메일을 입력해주세요";
          tag.append(p);
          document.register_form.email1.focus();
          return;
      }
      if (!document.register_form.phone.value) {
          let tag = document.querySelector('.confirm_phone');
          let p = document.createElement('p');
          p.setAttribute('id','error_phone');
          p.setAttribute('class','error');
          p.innerHTML = "전화번호를 입력해주세요";
          tag.append(p);
          document.register_form.phone.focus();
          return;
      }
      if (!document.register_form.pass1.value) {
          let tag = document.querySelector('.confirm_pass1');
          let p = document.createElement('p');
          p.setAttribute('id','error_pass1');
          p.setAttribute('class','error');
          p.innerHTML = "비밀번호를 입력해주세요";
          tag.append(p);
          document.register_form.pass1.focus();
          return;
      }
      if (!document.register_form.pass2.value) {
          let tag = document.querySelector('.confirm_pass2');
          let p = document.createElement('p');
          p.setAttribute('id','error_pass2');
          p.setAttribute('class','error');
          p.innerHTML = "비밀번호를 확인해주세요";
          tag.append(p);
          document.register_form.pass1.focus();
          return;
      }
      if (document.register_form.pass1.value != 
            document.register_form.pass2.value) {
          let tag = document.querySelector('.confirm_pass1');
          let p = document.createElement('p');
          p.setAttribute('class','error');
          p.setAttribute('id','error_confirm_pass1');
          p.innerHTML = "비밀번호가 일치하지 않습니다";
          tag.append(p);      
          document.register_form.pass1.value ="";
          document.register_form.pass2.value ="";
          document.register_form.pass.focus();
          return;
      }
          document.register_form.submit();  
   }

   function reset_input() {
    let p1 = document.getElementById('error_id');
    let p2 = document.getElementById('error_name');
    let p3 = document.getElementById('error_email1');
    let p4 = document.getElementById('error_phone');
    let p5 = document.getElementById('error_pass1');
    let p6 = document.getElementById('error_pass2');
    let p7 = document.getElementById('error_confirm_pass1');
    if(p1) p1.remove();
    if(p2) p2.remove();
    if(p3) p3.remove();
    if(p4) p4.remove();
    if(p5) p5.remove();
    if(p6) p6.remove();
    if(p7) p7.remove(); 
    document.register_form.name.value = "";
    document.register_form.email1.value = "";
    document.register_form.phone.value = "";
    document.register_form.pass1.value = "";
    document.register_form.pass2.value = "";
    document.register_form.name.focus();
    return;
 }

   function check_id() {
    window.open("register_check_id.php?id=" + document.register_form.id.value,
    "IDcheck",
     "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
   }