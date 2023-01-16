function slide_show() {
    //화면객체참조변수지정
    let slideshow = document.querySelector('.slideshow');
    let slideshowSlides = document.querySelector('.slideshow_slides');
    let slides = document.querySelectorAll('.slideshow_slides a');
    let currentIndex = 0;
    let timer = "";
    let prev = document.querySelector('.prev')
    let next = document.querySelector('.next')
    let slideCount = slides.length;
    let indicators = document.querySelectorAll('.indicator a');
  
    // 사진들을 오른쪽으로 한칸씩 배치
    for (let i = 0; i < slides.length; i++) {
      let newLeft = i * 100 + '%';
      slides[i].style.left = newLeft;
    }
  
    // 사진들을 한칸씩 왼쪽으로 이동
    function gotoSlide(index) {
      currentIndex = index;
      let newLeft = index * -100 + '%';
      slideshowSlides.style.left = newLeft;
      // for(let i=0; i<indicators.length;i++){
      //   indicators[i].classList.remove('active');
      // }
      indicators.forEach((obj)=>{
        obj.classList.remove('active')  
      });
      indicators[index].classList.add('active');
    }
  
    gotoSlide(0);
  
    //3초마다 함수를 부른다.
    function startTimer() {
      timer = setInterval(function () {
        let nextIndex = (currentIndex + 1) % slideCount;
        gotoSlide(nextIndex);
      }, 5000)
    }
  
    startTimer();
  
    //마우스포인터가 slideshow_slides에 들어오면 타이머를 멈춘다.
    slideshowSlides.addEventListener('mouseenter', () => {
      clearInterval(timer);
    })
    slideshowSlides.addEventListener('mouseleave', function () {
      startTimer();
    })
  
    prev.addEventListener('mouseenter',()=>{
      clearInterval(timer);
    })
  
    prev.addEventListener('click', (e) => {
      e.preventDefault(); // a 태그의 기본 기능을 막는다.
      currentIndex -= 1;
      if (currentIndex < 0) {
        currentIndex = 3
      }
      gotoSlide(currentIndex)
    });
  
    next.addEventListener('mouseenter',()=>{
      clearInterval(timer);
    })
  
    next.addEventListener('click', (e) => {
      e.preventDefault(); // a 태그의 기본 기능을 막는다.
      currentIndex += 1;
      if (currentIndex > 3) {
        currentIndex = 0
      }
      gotoSlide(currentIndex)
    });
  
  
    // indicator click시 해당 화면으로 이동
    indicators.forEach((obj)=>{
      obj.addEventListener('mouseenter',()=>{
        clearInterval(timer);
      })  
    });
    
    for(let i=0;i<indicators.length;i++){
      indicators[i].addEventListener('click',(e)=>{
        e.preventDefault();
        gotoSlide(i);
      })
    }
  }