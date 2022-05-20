
function getCookie(c_name) {
	cookie = document.cookie;
	index = cookie.indexOf(c_name + "=");
	if (index == -1) return "";
	index = cookie.indexOf("=", index) + 1;
	var endstr = cookie.indexOf(";", index);
	if (endstr == -1) endstr = cookie.length;
	return unescape(cookie.substring(index, endstr));
}

function setCookie(c_name, c_value, c_expire_day ) {
    if ( c_expire_day == undefined ) {
        document.cookie = c_name + "=" + c_value + ";";
    } else {
        var todayDate = new Date();
        todayDate.setHours( 24 * c_expire_day );
        document.cookie = c_name + "=" + escape( c_value ) + "; path=/; expires=" +   todayDate.toGMTString() + ";";
    }
}

// 즐겨찾기 추가 스크립트
function addBookmark() { 
    var title = 'C.A.S.H Urban contemporary concept store';
    var url = 'http://www.guesskorea.com';

    if(document.all || ( navigator.appName == 'Netscape' && navigator.userAgent.search('Trident') != -1 ) ) {
        // Internet Explorer
        window.external.AddFavorite(url, title); 
    } else if(window.chrome) {
        // Google Chrome
        alert("Ctrl+D키를 누르시면 즐겨찾기에 추가하실 수 있습니다.");
    } else if (window.sidebar) {
        // Firefox
        window.sidebar.addPanel(title, url, ""); 
    } else if(window.opera && window.print) { 
        // opera 
        var elem = document.createElement('a'); 
        elem.setAttribute('href',url); 
        elem.setAttribute('title',title); 
        elem.setAttribute('rel','sidebar'); 
        elem.click(); 
    } else {
        alert("해당브라우저는 즐겨찾기 추가기능이 지원되지 않습니다.\n\n수동으로 즐겨찾기에 추가해주세요.");
    }
} 

// 브랜드 위시리스트 등록
function setBrandWishList(obj, bridx, redirect_url) {
            if ( redirect_url.indexOf("/m/") >= 0 ) {
            popup_open('#popup-login');return false;
        } else {
            var loginUrl = "/front/login.php?chUrl=";
            if ( confirm("로그인이 필요합니다.") ) {
                location.href = loginUrl + encodeURIComponent(redirect_url);
            }
        }
    }

// 상품 위시리스트 등록
function setProductWishList(obj, prodcode, redirect_url) {
            if ( redirect_url.indexOf("/m/") >= 0 ) {
            popup_open('#popup-login');return false;
        } else {
            var loginUrl = "/front/login.php?chUrl=";
            if ( confirm("로그인이 필요합니다.") ) {
                location.href = loginUrl + encodeURIComponent(redirect_url);
            }
        }
    }

// 출석체크하기
function setAttendance(pridx, redirect_url) {
            if ( redirect_url.indexOf("/m/") >= 0 ) {
            popup_open('#popup-login');return false;
        } else {
            var loginUrl = "/front/login.php?chUrl=";
            if ( confirm("로그인이 필요합니다.") ) {
                location.href = loginUrl + encodeURIComponent(redirect_url);
            }
        }
    }

// 장바구니에 담기
function insert_basket(productcode, option_code){
    var quantity    = 1;
    var option_type = 0; //데코앤이는 필수옵션만 존재함
    
    // 장바구니를 거쳐서 가는것을 ajax로 변경 2015 11 09 유동혁
    $.ajax({
        method : 'POST',
        url : 'confirm_basket_proc.php',
        data: { productcode : productcode, option_code : option_code, quantity : quantity, option_type : option_type, mode : 'insert' },
        dataType : 'json'
    }).done( function( data ) {
        if( data.code == 'S01' ){
            alert("장바구니에 등록되었습니다.");
        } else {
            alert('장바구니 등록이 실패되었습니다.');
        }
    });
}

// 리뷰 작성시 최소 'maxLength'만큼은 입력해야 함. 
function chkReviewContentLength(obj) {
    var maxLength = 5;

    var strValue    = obj.value;
    var strLen      = strValue.length;

    if (strLen < maxLength) {
        alert("내용 입력은 최소 " + maxLength + "이상, 최대 500자미만으로 입력해주세요.");
        return false;
    }

    return true;
}

function reWriteName(form) {
    try {
        for(var i=0;i<form.elements.length;i++) {
            if(form.elements[i].name.length>0) {
                if (form.elements[i].name.indexOf("ins4eField")) {
                    if ( form.elements[i].name == "sms-send" ) {
                        var obj = form.elements[i];
                        if ( $(obj).is(":checked") === true ) {
                            form["ins4eField["+form.elements[i].name+"]"].value = form.elements[i].value;
                            form["ins4eField["+form.elements[i].name+"]"].name = form["ins4eField["+form.elements[i].name+"]"].name.replace("Field","");
                        }
                    } else {
                        form["ins4eField["+form.elements[i].name+"]"].value = form.elements[i].value;
                        form["ins4eField["+form.elements[i].name+"]"].name = form["ins4eField["+form.elements[i].name+"]"].name.replace("Field","");
                    }
                }
            }
        }
    } catch (e) {
        alert(e.toString());
    }
}


// 상품 미리보기 레이어 팝업
function setProductPopup(prodcode) {
	$('#productdetail_popup').attr('src','about:blank');
	$('#productdetail_popup').attr('src','../front/productdetail.php?productcode='+prodcode+'&popup=ok');
	$('.layer-before-view').fadeIn();
}
// 모바일 페이징용(공통)
function GoPage_Mobile(block,gotopage) {
    document.form_m.block.value=block;
    document.form_m.gotopage.value=gotopage;
    document.form_m.submit();
}

function changeSort_Mobile(obj) {
    document.form_m.sort.value=$(obj).children("option:selected").val();
    document.form_m.submit();
}

function changeBrand_Mobile(obj) {
    document.form_m.bridx.value=$(obj).children("option:selected").val();
    document.form_m.submit();
}

// ==================================================================================
// 모바일
// ==================================================================================

// 진행중 프로모션 리스트 가져오기
function GoPageAjax_running_promotion(block, gotopage) {
    var listnum = 5;

    var params = {
        block : block,
        gotopage : gotopage,
        listnum : listnum,
    };

    $.ajax({
        type        : "GET", 
        url         : "/front/ajax_get_running_promotion_list.php", 
        contentType : "application/x-www-form-urlencoded; charset=UTF-8",
        data        : params
    }).done(function ( data ) {
        var arrData = data.split("|||");

        $("#running_promo_list").html(arrData[0]);
        $("#running_promo_page").html(arrData[1]);

        ui_init();
    });         
}

// 진행중 프로모션 리스트 가져오기
function GoPageAjax_end_promotion(block, gotopage) {
    var listnum = 5;

    var params = {
        block : block,
        gotopage : gotopage,
        listnum : listnum,
    };

    $.ajax({
        type        : "GET", 
        url         : "/front/ajax_get_end_promotion_list.php", 
        contentType : "application/x-www-form-urlencoded; charset=UTF-8",
        data        : params
    }).done(function ( data ) {
        var arrData = data.split("|||");

        $("#end_promo_list").html(arrData[0]);
        $("#end_promo_page").html(arrData[1]);

        ui_init();
    });         
}

// 당첨자 발표 프로모션 리스트 가져오기
function GoPageAjax_winner_list_promotion(block, gotopage) {
    var listnum = 5;

    var params = {
        block : block,
        gotopage : gotopage,
        listnum : listnum,
    };

    $.ajax({
        type        : "GET", 
        url         : "/front/ajax_get_winner_promotion_list.php", 
        contentType : "application/x-www-form-urlencoded; charset=UTF-8",
        data        : params
    }).done(function ( data ) {
        var arrData = data.split("|||");

        $("#winner_promo_list").html(arrData[0]);
        $("#winner_promo_page").html(arrData[1]);
    });         
}

// 룩북관련 상품 리스트 구하기
function show_lookbook_prodlist(lbno, no) {
    var params = {
        lbno : lbno,
        no : no,
    };

    $.ajax({
        type        : "GET", 
        url         : "/front/ajax_get_lookbook_product_list.php", 
        contentType : "application/x-www-form-urlencoded; charset=UTF-8",
        data        : params
    }).done(function ( data ) {
//        $("#lookbook_prod_list").html(data);
//        $(".js-goods-list").html(data);

        if ( data ) { 
            $(".studio-lookbook-list").html(data).show();
        } else {
            $(".studio-lookbook-list").hide();
        }
    });         
}

function find_lookbook() {
//    var funcCall = $("#lookbook_thumb_list").find("li.on").attr('onclick');
    var funcCall = $("#lookbook_thumb_list").find("li.flex-active-slide").attr('onclick');
    eval(funcCall)
}
// 콤마
function comma(x)
{
	var temp = "";
	var x = String(uncomma(x));

	num_len = x.length;
	co = 3;
	while (num_len>0){
		num_len = num_len - co;
		if (num_len<0){
			co = num_len + co;
			num_len = 0;
		}
		temp = ","+x.substr(num_len,co)+temp;
	}
	return temp.substr(1);
}
// 콤마 해제
function uncomma(x)
{
	var reg = /(,)*/g;
	x = parseInt(String(x).replace(reg,""));
	return (isNaN(x)) ? 0 : x;
}
// 숫자 확인
function strnumkeyup(field) {
	if (!isNumber(field.value)) {
		alert("숫자만 입력하세요.");
		field.value=strLenCnt(field.value,field.value.length - 1);
		field.focus();
		return;
	}
}
// 숫자 확인 2
function isNumber(arg) {
	for (i =0 ; i < arg.length; i++) {
	  	if (arg.charCodeAt(i) < 48 || arg.charCodeAt(i) > 57) {
	  		return false;
	  	}
	}
	return true;
}
// 숫자확인 3
function IsNumeric(data) {
	var numstr = "0123456789";
	var thischar;
	var count = 0;
	data = data.toUpperCase( data )

	for ( var i=0; i < data.length; i++ ) {
		thischar = data.substring(i, i+1 );
		if ( numstr.indexOf( thischar ) != -1 )
			count++;
	}
	if ( count == data.length )
		return(true);
	else
		return( false );
}
// 메일 체크
function IsMailCheck(email) {
	isMailChk = /^[^@ ]+@([a-zA-Z0-9\-]+\.)+([a-zA-Z0-9\-]{2}|net|com|gov|mil|org|edu|int)$/;
	if(isMailChk.test(email)) {
		return true;
	} else {
		return false;
	}
}
// 숫자키 막기
function chkNoChar(str) {
	for(i=0;i<str.length;i++) {
		if(str.charCodeAt(i)==34 || str.charCodeAt(i)==39 || str.charCodeAt(i)==42 || str.charCodeAt(i)==92) {
			return false;
		}
	}
	return true;
}

//숫자키 이외의 것을 막음
function isNumKey( event ){
	var charCode = event.charCode || event.keyCode;
	
	if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)){
		if( charCode > 95 && charCode < 106 ){ // 오른쪽 숫자키
			return true;
		} else {
			return false;
		}
	} else {
		return true;
	}
}

// ==================================================================================
// 숫자만 체크하도록 하는 스크립트 (2016.08.05 - 김재수 추가)
// input 예시 : <input type="text" class='chk_only_number' style='ime-mode:disabled;'>
// ==================================================================================
/*
$(document).on({ 
  "keydown" : function(event){
		event = event || window.event;
		var keyID = (event.which) ? event.which : event.keyCode;
		if ( (keyID >= 48 && keyID <= 57) || (keyID >= 96 && keyID <= 105) || keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39 ) 
			return;
		else
			return false;
	},
  "keyup" : function(event){
		event = event || window.event;
		var keyID = (event.which) ? event.which : event.keyCode;
		if ( keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39 ) 
			return;
		else
			return false;
	} 
}, ".chk_only_number");
*/
// 정회원, 준회원 구분
function chkAuthMemLoc(loc, is_type) {
	location.href=loc;
}