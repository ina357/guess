/* let banner=$('.photo>ul>li'); 
let current=0;

setInterval(function(){
    let prev=banner.eq(current);
    move(prev,'100%',0);
    current++;

    if(current==banner.size()) current=0; 
    let next=banner.eq(current);
    move(next,0,'100%');
},2000);

function move(tg,start,end){
    tg.css('width',start).stop().animate({width:end});
}
 */
document.addEventListener('DOMContentLoaded', function(){ //DOM 생성 후 이벤트 리스너 등록
    //더보기 버튼 이벤트 리스너
    document.querySelector('.btn_open').addEventListener('click', function(e){
        
        let classList = document.querySelector('.detailinfo').classList; // 더보기 프레임의 클래스 정보 얻기
        let contentHeight = document.querySelector('.detailinfo > .content').offsetHeight; //컨텐츠 높이 얻기

        // 2단계이면 전체보기로
        if(classList.contains('showstep2')){
            classList.remove('showstep2');
        }
        // 1단계이면 2단계로
        if(classList.contains('showstep1')){
            classList.remove('showstep1');
            if(contentHeight > 600){
                classList.add('showstep2');
            }else{
                document.querySelector('.btn_open').classList.add('hide');
            }
        }        
    });
    document.querySelector('.btn_open1').addEventListener('click', function(e){
        
      let classList = document.querySelector('.detailinfo1').classList; // 더보기 프레임의 클래스 정보 얻기
      let contentHeight = document.querySelector('.detailinfo1 > .content1').offsetHeight; //컨텐츠 높이 얻기

      // 2단계이면 전체보기로
      if(classList.contains('showstep4')){
          classList.remove('showstep4');
      }
      // 1단계이면 2단계로
      if(classList.contains('showstep3')){
          classList.remove('showstep3');
          if(contentHeight > 600){
              classList.add('showstep4');
          }else{
              document.querySelector('.btn_open').classList.add('hide');
          }
      }        
  });
});
var swiper = new Swiper(".goslide", {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    
  });
  var swiper = new Swiper(".slide1", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });  