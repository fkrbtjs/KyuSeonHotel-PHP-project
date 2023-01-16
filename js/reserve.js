function check_input() {
  if (!document.reserve_form.check_in.value)
  {
      alert("체크인 날짜를 선택해주세요");
      document.reserve_form.check_in.focus();
      return;
  }
  if (!document.reserve_form.check_out.value)
  {
      alert("체크아웃 날짜를 선택해주세요");
      document.reserve_form.check_out.focus();
      return;
  }
  document.reserve_form.submit();
}

function calc_rate() {
  let check_in = document.querySelector('.check_in');
  let check_out = document.querySelector('.check_out');
  let person = document.querySelector('.person');
  let breakfast = document.querySelector('.breakfast');
  let check_in2 = document.querySelector('.check_in2');
  let check_out2 = document.querySelector('.check_out2');
  let person2 = document.querySelector('.person2');
  let breakfast2 = document.querySelector('.breakfast2');
  let day = document.querySelectorAll('.day');
  let room_rate = document.querySelector('.room_rate');
  let option_rate = document.querySelector('.option_rate');
  let total_rate = document.querySelector('.total_rate');
  let room_type = document.getElementById('h1');
  let discount = document.querySelector('.discount').textContent;
  let dis_price = document.querySelector('.dis_price');
  let total_rate2 = document.querySelector('.total_rate2');
  
  const getRoomRate = (room_type)=>{
    if(room_type.textContent=='그랜드 디럭스 더블'){
      return 200000;
    }else if(room_type.textContent=='프리미어 더블'){
      return 500000;
    }else if(room_type.textContent=='스위트 더블'){
      return 700000;
    }else if(room_type.textContent=='로얄 스위트'){
      return 1000000;
    }
  }

  const getDateDiff = (d1, d2) => {
    const date1 = new Date(d1);
    const date2 = new Date(d2);
    
    const diffDate = date1.getTime() - date2.getTime();
    
    return (diffDate / (1000 * 60 * 60 * 24)); // 밀리세컨 * 초 * 분 * 시 = 일
  }
  const getRate = (person,day,room_type)=>{
    let rate = getRoomRate(room_type);
    return person * day * rate;
  }

  const getOptionRate = (breakfast,day)=>{
    return breakfast * day * 50000;
  }

  const getDiscountRate = (total_rate,discount)=>{
    return total_rate * (discount / 100);
  }

  const getTotalRate = (room_rate,option_rate)=>{
    return (room_rate + option_rate);
  }

  check_in.addEventListener('change',()=>{
    let date_diff = getDateDiff(check_out.value , check_in.value);
    if(date_diff < 1){
      alert('체크아웃 날짜가 체크인 날짜보다 빠릅니다!');
    }else{
      check_in2.innerHTML = check_in.value;
      if(check_out.value !=""){
        day[0].innerHTML = getDateDiff(check_out.value,check_in.value);
        day[1].innerHTML = getDateDiff(check_out.value,check_in.value);
        room_rate.innerHTML = getRate(person.value,date_diff,room_type);
        option_rate.innerHTML = getOptionRate(breakfast.value, date_diff);
        dis_price.innerHTML = getDiscountRate(getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff)),discount);
        total_rate.innerHTML = getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff))-getDiscountRate(getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff)),discount);
        total_rate2.value = getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff))-getDiscountRate(getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff)),discount);
      }
    }
  })

  check_out.addEventListener('change',()=>{
    let date_diff = getDateDiff(check_out.value , check_in.value);
    if(check_in.value == ""){
      alert('체크인 날짜를 먼저 설정해 주세요!');
    }else if(date_diff < 1){
      alert('체크아웃 날짜가 체크인 날짜보다 빠릅니다!');
    }else{
      check_out2.innerHTML = check_out.value;
      day[0].innerHTML = getDateDiff(check_out.value,check_in.value);
      day[1].innerHTML = getDateDiff(check_out.value,check_in.value);
      room_rate.innerHTML = getRate(person.value,date_diff,room_type);
      option_rate.innerHTML = getOptionRate(breakfast.value, date_diff);
      total_rate.innerHTML = getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff));
      dis_price.innerHTML = getDiscountRate(getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff)),discount);
      total_rate.innerHTML = getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff))-getDiscountRate(getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff)),discount);
      total_rate2.value = getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff))-getDiscountRate(getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff)),discount);
    }
  })

  person.addEventListener('change',()=>{
    let date_diff = getDateDiff(check_out.value,check_in.value);
    person2.innerHTML = person.value;
    if(date_diff > 0){
      console.log(discount);
      room_rate.innerHTML = getRate(person.value, date_diff,room_type);
      option_rate.innerHTML = getOptionRate(breakfast.value, date_diff);
      total_rate.innerHTML = getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff));
      dis_price.innerHTML = getDiscountRate(getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff)),discount);
        total_rate.innerHTML = getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff))-getDiscountRate(getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff)),discount);
        total_rate2.value = getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff))-getDiscountRate(getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff)),discount);
    }
  })

  breakfast.addEventListener('change',()=>{
    let date_diff = getDateDiff(check_out.value,check_in.value);
    breakfast2.innerHTML = breakfast.value ;
    if(date_diff > 0){
      option_rate.innerHTML = getOptionRate(breakfast.value, date_diff);
      total_rate.innerHTML = getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff));
      dis_price.innerHTML = getDiscountRate(getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff)),discount);
        total_rate.innerHTML = getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff))-getDiscountRate(getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff)),discount);
        total_rate2.value = getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff))-getDiscountRate(getTotalRate(getRate(person.value,date_diff,room_type),getOptionRate(breakfast.value, date_diff)),discount);
    }
  })
}

