

  var deviceAgent = navigator.userAgent.toLowerCase();

  var isTouchDevice = Modernizr.touch ||
  (deviceAgent.match(/(iphone|ipod|ipad)/) ||
  deviceAgent.match(/(android)/)  ||
  deviceAgent.match(/(iemobile)/) ||
  deviceAgent.match(/iphone/i) ||
  deviceAgent.match(/ipad/i) ||
  deviceAgent.match(/ipod/i) ||
  deviceAgent.match(/blackberry/i) ||
  deviceAgent.match(/bada/i));
  
  if (isTouchDevice) {
          //Do something touchy
          location.href='http://cjh7652.dothome.co.kr/mokup/mobile/'
      } else {
          //Can't touch this
}