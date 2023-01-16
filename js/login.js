function check_input()
{
    let p1 = document.getElementById('error_id');
    let p2 = document.getElementById('error_pass1');
    if(p1) p1.remove();
    if(p2) p2.remove();

    if (!document.login_form.id.value) {
        let tag = document.querySelector('.confirm_id');
        let p = document.createElement('p');
        p.setAttribute('class','error');
        p.setAttribute('id','error_id');
        p.innerHTML = "아이디를 입력해주세요";
        tag.append(p);
        document.login_form.id.focus();
        return;
    }
    if (!document.login_form.pass1.value) {
        let tag = document.querySelector('.confirm_pass1');
        let p = document.createElement('p');
        p.setAttribute('class','error');
        p.setAttribute('id','error_pass1');
        p.innerHTML = "비밀번호를 입력해주세요";
        tag.append(p);
        document.login_form.pass1.focus();
        return;
    }
    document.login_form.submit();
}