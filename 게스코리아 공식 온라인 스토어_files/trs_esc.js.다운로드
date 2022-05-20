var TRS_SERVER = "adlog.adinsight.co.kr/emnet";
var TRS_SSL_SERVER = "analysis.adinsight.co.kr/emnet";
var TRS_SERVER2 = "adlog2.adinsight.co.kr/emnet";
var TRS_SSL_SERVER2 = "analysis2.adinsight.co.kr/emnet";
var TRS_PROTOCOL = "http:";
var TRS_DN = "";
var regIsNum = /[^0-9]/gi;

if (typeof TRS_AMT == 'undefined') {
	var TRS_AMT = '0';
} else {
	TRS_AMT = TRS_AMT.replace(regIsNum, "");
}
if (typeof TRS_ORDER_ID == 'undefined') {
	var TRS_ORDER_ID = '-';
}
else if (TRS_ORDER_ID == '') {
	TRS_ORDER_ID = '-';
}
if (typeof TRS_PRODUCT == 'undefined') {
	var TRS_PRODUCT = '-';
}
if (typeof TRS_ERRCODE == 'undefined') {
	var TRS_ERRCODE = '200';
}
if (typeof TRS_MEMBER_ID == 'undefined') {
	var TRS_MEMBER_ID = '-';
}
else if (TRS_MEMBER_ID == '') {
	TRS_MEMBER_ID = '-';
}
if (typeof TRS_MEMBER_TYPE == 'undefined') {
	var TRS_MEMBER_TYPE = '-';
}
if (typeof TRS_BASKET_PRODUCT == 'undefined') {
	var TRS_BASKET_PRODUCT = '-';
}
if (typeof TRS_V_CONV_NAME == 'undefined') {
	var TRS_V_CONV_NAME = '-';
}
if (typeof TRS_V_AMOUNT == 'undefined') {
	var TRS_V_AMOUNT = '0';
} else {
	TRS_V_AMOUNT = TRS_V_AMOUNT.replace(regIsNum, "");
}
function removeHTMLtag(string) {
	var regex = new RegExp();
	regex = /[<][^>]*[>]/gi;
	return string.replace(regex, "");
}
function func_esc(str) {
	return escape(str).replace(/\+/g, "%2B").replace(/\//g, "%2F").replace(/\&/g, "%26").replace(/\?/g, "%3F").replace(/\@/g, "%40");
}
function encrypt_str(str, key) {
	var the_res = '';
	for (tri = 0; tri < str.length; ++tri) {
		the_res += String.fromCharCode(key ^ str.charCodeAt(tri));
	}
	return the_res;
}
function decrypt_str(str, key) {
	var the_res = '';
	for (tri = 0; tri < str.length; ++tri) {
		the_res += String.fromCharCode(key ^ str.charCodeAt(tri));
	}
	return the_res;
}
function _trs_IsValid() {
	if (typeof TRS_AIDX == 'undefined') return 1;
	var tmp_dlp = document.location.protocol;
	if (tmp_dlp != "http:" && tmp_dlp != "https:") return 1;
	else {
		TRS_PROTOCOL = tmp_dlp + "//";
		return 0;
	}
}
function _trs_GetCookie(_strName) {
	try {
		var _strCookie = document.cookie;
		var _nStrLen = _strCookie.length;

		var _posName = 0;

		_posName = _strCookie.indexOf(_strName + "=", 0);

		if (_posName != -1) {
			var _posSC = _strCookie.indexOf(";", _posName);
			if (_posSC == -1)
				_posSC = _nStrLen;

			_posName += _strName.length + 1;

			try
			{
				return decodeURIComponent(_strCookie.substr(_posName, _posSC - _posName));
			}
			catch (e) {
				return unescape(_strCookie.substr(_posName, _posSC - _posName));
			}
		}

		return "";
	}
	catch (e) {
		return "";
	}
}
function _trs_hasDomain(_strDomain) {
	if (_strDomain.search(_strDomain) != -1) {
		return _strDomain;
	} else {
		return document.location.hostname;
	}
}
function _trs_SetCookie(_strName, _strValue, _strPath, _tExpiremin, type) {
	try {
		var _strExpires = "";
		if (!type)
		{
                          let _date = new Date();
                          _date.setFullYear(_date.getFullYear() + 3);
                          _strExpires = "; expires=" + _date.toGMTString();
        }
		else {
			if (_tExpiremin != null) {
				var _timeExpires = new Date();
				var _date = new Date();
				_timeExpires.setTime(_date.getTime() + _tExpiremin * 60 * 1000);
				_strExpires = "; expires=" + _timeExpires.toGMTString();
			}
		}

		document.cookie = _strName + "=" + func_esc(_strValue) +
			_strExpires +
			((_strPath != null) ? ("; path=" + _strPath) : "") +
			((typeof TRS_DOMAIN == "undefined") ? "" : "; domain=" + _trs_hasDomain(TRS_DOMAIN)) + ";";
	}
	catch (e) {
	}
}
function _trs_GenerateID() {
	try {
		var _strID;
		var _date = new Date();
		_strID = "c_" + _date.getMonth() + _date.getDate() + _date.getHours() +
			_date.getMilliseconds() + _date.getMinutes() + _date.getSeconds() +
			Math.round(Math.random() * 10000);
		return _strID;
	}
	catch (e) {
		return '';
	}
}
function _trs_setSID() {
	var str;
	var _date = new Date();
	var month, day, hours, minutes;
	month = _date.getMonth();
	day = _date.getDate();
	hours = _date.getHours();
	minutes = _date.getMinutes();

	month += 1;
	if (month < 10) month = "0" + month;
	if (day < 10) day = "0" + day;
	if (hours < 10) hours = "0" + hours;
	if (minutes < 10) minutes = "0" + minutes;

	return str = "C_" + _date.getFullYear() + month + day + hours + minutes;
}
function _trs_insert(trs_path) {
	var writer = TRS_PROTOCOL + ((TRS_PROTOCOL == "https://") ? TRS_SSL_SERVER : TRS_SERVER);

	writer += trs_path;
	if (window.screen ? true : false) {
		var imgWriter = new Image();
		imgWriter.src = writer;
	} else {
		document.write('<img height="0" width="0" border="0" src="' + writer + '"/>');
	}
}
function _trs_insert2(trs_path) {
	var writer = TRS_PROTOCOL + ((TRS_PROTOCOL == "https://") ? TRS_SSL_SERVER2 : TRS_SERVER2);

	writer += trs_path;
	if (window.screen ? true : false) {
		var imgWriter = new Image();
		imgWriter.src = writer;
	} else {
		document.write('<img height="0" width="0" border="0" src="' + writer + '"/>');
	}
}
/*
window.onerror = function (msg,f,l){
	var ewriter_path = '/err_log.php' + '?aidx=' + TRS_AIDX + '&err_url=' + document.URL +'&err_name=' + msg +'&err_f=' + f + '&err_l=' + l;

	_trs_insert(ewriter_path);
	return true;
}
*/
function _trs_analysis() {
	var _date = new Date();
	var _strUrl = '';
	var _strRef = '';
	var _strID = '';
	var _strSID = '';
	var _bVisit = 1;
	var _nVisit = 1;
	var _s = '';

	if (_trs_IsValid()) {
		return;
	}

	TRS_DN = self.document.location.hostname;
	if (TRS_DN.indexOf("www.") == 0) {
		TRS_DN = TRS_DN.substr(4, TRS_DN.length);
	}

	_strID = _trs_GetCookie("_trs_id");
	_strSID = _trs_GetCookie("_trs_sid");

	var d_strID = decrypt_str(_strID, 6);
	if (d_strID == '' || d_strID.indexOf("c_") < 0) {
		_bVisit = 0;

		_strID = _trs_GenerateID();
		var e_strID = encrypt_str(_strID, 6);

		_trs_SetCookie("_trs_id", e_strID, "/", 0, false);
		_strID = _trs_GetCookie("_trs_id");
		if (_strID == '') {
			_strID = '-';
		}
	}

	var d_strSID = decrypt_str(_strSID, 4);
	if (d_strSID == '' || d_strSID.indexOf("C_") < 0 || !_bVisit) {
		_nVisit = 0;

		d_strID = decrypt_str(_strID, 6);
		_strSID = _trs_setSID() + '_' + d_strID;

		var e_strSID = encrypt_str(_strSID, 4);
		_trs_SetCookie("_trs_sid", e_strSID, "/", 30, true);

		_strSID = _trs_GetCookie("_trs_sid");

		if (_strSID == '') {
			_strSID = '-';
		}
	}
	else {
		_trs_SetCookie("_trs_sid", _strSID, "/", 30, true);
	}

	d_strID = decrypt_str(_strID, 6);
	d_strSID = decrypt_str(_strSID, 4);
	if (d_strID.indexOf("c_") < 0 || d_strSID.indexOf("c_") < 0) {
		_strID = _strSID = '-';
		_bVisit = _nVisit = 0;
	}

	_strUrl = self.document.URL;
	_strRef = self.document.referrer;

	var ru = '';
	var rf = '';
	var isframe = false;

	try {
		if (top && typeof (top) == "object" && top.frames != 'undefined' && typeof (top.document) != "unknown") {
			ru = top.document.URL;

			if (ru != _strUrl) {
				rf = top.document.referrer;
				isframe = true;
			}
		}
		var trs_flow = '';
		if (isframe) {
			if (ru == '') {
				ru = parent.document.URL;
				rf = parent.document.referrer;
			}
			if (ru == _strRef || parent.document.URL == _strRef) {
				trs_flow = _trs_GetCookie("_trs_flow");

				if (_nVisit) {
					//_nVisit = 2;
				}

				_strUrl = ru;
				_strRef = rf;
				_trs_SetCookie("_trs_flow", rf, "/", 30, true);
			}
		}
		trs_flow = _trs_GetCookie("_trs_flow");
		_trs_SetCookie("_trs_flow", trs_flow, "/", 30, true);
	}
	catch (e) { }

	if (self.screen)
		_s = screen.width + "x" + screen.height;
	try {
		if (TRS_BASKET_PRODUCT != '-') {

			var btpTemp = _trs_GetCookie("_trs_basket");
			if (TRS_BASKET_PRODUCT == 'empty')
			{
				TRS_BASKET_PRODUCT_TMP = '';
			}
			else
			{
				if (btpTemp != '') {
					var ntbp = TRS_BASKET_PRODUCT.split(' $ ');
					var btbp = btpTemp.split(' $ ');

					for (var i in ntbp) {
						var ntbpd = ntbp[i].split('@');
						for (var j in btbp) {
							var btbpd = btbp[j].split('@');
							if (ntbpd[0] == btbpd[0]) {
								btpTemp = btpTemp.replace(btbp[j], btbpd[0] + '@' + btbpd[1] + '@' + btbpd[2] + '@' + eval(parseInt(ntbpd[3]) + parseInt(btbpd[3])));
								TRS_BASKET_PRODUCT = TRS_BASKET_PRODUCT.replace(ntbp[i], '');
							}
						}
					}
					if (TRS_BASKET_PRODUCT != '') {
						btpTemp += ' $ ';
					}
				}
				TRS_BASKET_PRODUCT_TMP = btpTemp + TRS_BASKET_PRODUCT;
			}

		}

		if (typeof TRS_BASKET_PRODUCT_TMP != 'undefined') {
			var bpTemp = _trs_GetCookie("_trs_basket");
			_trs_SetCookie("_trs_basket", TRS_BASKET_PRODUCT_TMP, "/", 30, true);
			if (bpTemp != '') {
				if (TRS_BASKET_PRODUCT_TMP == '')
				{
					TRS_BASKET_PRODUCT_TMP = 'empty';
				}
				else
				{
					var nbp = TRS_BASKET_PRODUCT_TMP.split(' $ ');
					var bbp = bpTemp.split(' $ ');
					var trs_equal_chk = 0;

					if (nbp.length != bbp.length) {
						TRS_BASKET_PRODUCT = TRS_BASKET_PRODUCT_TMP;
					}
					else {
						for (var i in nbp) {
							var nbpd = nbp[i].split('@');
							for (var j in bbp) {
								var bbpd = bbp[j].split('@');
								if (nbpd[0] == bbpd[0]) {
									trs_equal_chk++;
									if (nbpd[3] != bbpd[3]) {
										TRS_BASKET_PRODUCT = TRS_BASKET_PRODUCT_TMP;
									}
								}
							}
						}
						if (nbp.length != trs_equal_chk) {
							if (TRS_BASKET_PRODUCT == '-') {
								TRS_BASKET_PRODUCT = TRS_BASKET_PRODUCT_TMP;
							}
						}
					}
				}
			}
			else {
				TRS_BASKET_PRODUCT = TRS_BASKET_PRODUCT_TMP;
			}
		}
	}
	catch (e) { }
	if (typeof TRS_MEMBER_ID_COOKIE != 'undefined') {
		var miTempCookie = _trs_GetCookie('_trs_memberID');
		if (miTempCookie != '') {
			TRS_MEMBER_ID = miTempCookie;
		}
	}
	if (TRS_MEMBER_ID != '-') {
		if (TRS_MEMBER_ID == '_trs_memberid_cookie') {
			TRS_MEMBER_ID = d_strID;
		}
		var miTemp = _trs_GetCookie('_trs_memberID');
		_trs_SetCookie("_trs_memberID", TRS_MEMBER_ID, "/", 30, true);
		if (miTemp != TRS_MEMBER_ID) {
			if (TRS_MEMBER_TYPE == '-') {
				TRS_MEMBER_TYPE = 'L';
			}
		}
		if (TRS_MEMBER_TYPE == 'W') {
			_trs_SetCookie("_trs_memberID", "", "/", -1, true);
		}
	}
	
	var writer_path = '/log.php' + '?aidx=' + TRS_AIDX + '&url=' + func_esc(_strUrl) + '&ref=' + func_esc(_strRef) + '&id=' + _strID + '&sid=' + _strSID + '&s=' + _s + '&bv=' + _bVisit + '&nv=' + _nVisit + '&amt=' + TRS_AMT + '&product=' + func_esc(TRS_PRODUCT) + '&ordid=' + func_esc(TRS_ORDER_ID);

	if (TRS_MEMBER_ID != '-') {
		writer_path += '&mid=' + func_esc(TRS_MEMBER_ID);
	}
	if (TRS_MEMBER_TYPE != '-') {
		writer_path += '&mtype=' + TRS_MEMBER_TYPE;
	}
	if (typeof TRS_MEMBER_AGE != 'undefined') {
		writer_path += '&mage=' + TRS_MEMBER_AGE.replace(regIsNum, "");
	}
	if (typeof TRS_MEMBER_MALE != 'undefined') {
		if (TRS_MEMBER_MALE.toUpperCase() == 'M' || TRS_MEMBER_MALE.toUpperCase() == 'F') {
			writer_path += '&mmale=' + TRS_MEMBER_MALE.toUpperCase();
		}
	}
	if (typeof TRS_MEMBER_MARRIED != 'undefined') {
		if (TRS_MEMBER_MARRIED.toUpperCase() == 'T' || TRS_MEMBER_MARRIED.toUpperCase() == 'F') {
			writer_path += '&mmarr=' + TRS_MEMBER_MARRIED.toUpperCase();
		}
	}
	if (typeof TRS_MEMBER_LOCATION != 'undefined') {
		writer_path += '&mloc=' + func_esc(TRS_MEMBER_LOCATION);
	}
	if (typeof TRS_MEMBER_GRADE != 'undefined') {
		writer_path += '&mgrade=' + func_esc(TRS_MEMBER_GRADE);
	}
	if (typeof TRS_ORDER_PRODUCT != 'undefined') {
		writer_path += '&oprd=' + func_esc(TRS_ORDER_PRODUCT);
	}
	if (typeof TRS_VIEW_PRODUCT_ID != 'undefined') {
		writer_path += '&vpid=' + TRS_VIEW_PRODUCT_ID;
	}
	if (typeof TRS_VIEW_PRODUCT_NAME != 'undefined') {
		writer_path += '&vpname=' + func_esc(TRS_VIEW_PRODUCT_NAME);
	}
	if (typeof TRS_VIEW_PRODUCT_PRICE != 'undefined') {
		writer_path += '&vpprice=' + TRS_VIEW_PRODUCT_PRICE.replace(regIsNum, "");
	}
	if (typeof TRS_VIEW_PRODUCT_CATEGORY1 != 'undefined') {
		writer_path += '&vpcat1=' + func_esc(TRS_VIEW_PRODUCT_CATEGORY1);
	}
	if (typeof TRS_VIEW_PRODUCT_CATEGORY2 != 'undefined') {
		writer_path += '&vpcat2=' + func_esc(TRS_VIEW_PRODUCT_CATEGORY2);
	}
	if (typeof TRS_VIEW_PRODUCT_CATEGORY3 != 'undefined') {
		writer_path += '&vpcat3=' + func_esc(TRS_VIEW_PRODUCT_CATEGORY3);
	}
	if (typeof TRS_VIEW_PRODUCT_IMGURL != 'undefined') {
		writer_path += '&vpimg=' + func_esc(TRS_VIEW_PRODUCT_IMGURL);
	}
	if (typeof TRS_IKEYWORD != 'undefined') {
		writer_path += '&ikwd=' + func_esc(TRS_IKEYWORD);
	}
	if (TRS_BASKET_PRODUCT != '-') {
		writer_path += '&bprd=' + func_esc(TRS_BASKET_PRODUCT);
	}
	if (TRS_V_CONV_NAME != '-') {
		writer_path += '&vcname=' + func_esc(TRS_V_CONV_NAME);
	}
	if (TRS_V_AMOUNT != '-' && TRS_V_AMOUNT != '0') {
		writer_path += '&vamt=' + TRS_V_AMOUNT;
	}
	writer_path += '&rnd=' + Math.random();

	if(_strUrl.indexOf('younme.dyndns.tv') < 0){
		_trs_insert(writer_path);	
	}
	//_trs_insert2(writer_path);
}

if (typeof trs_vf == 'undefined') {
	if (typeof TRS_AIDX != 'undefined') {
		var trs_vf = TRS_AIDX;
		_trs_analysis();
	}
}
else {
	if (typeof TRS_AIDX != 'undefined') {
		if (trs_vf != TRS_AIDX) {
			var trs_vf = TRS_AIDX;
			_trs_analysis();
		}
	}
}
function _trs_conv(name) {
	TRS_PRODUCT = name;
	if (typeof TRS_PRODUCT != 'undefined') {
		_trs_analysis();
	}
}
function _trs_basket(product) {
	if (product != '') {
		TRS_BASKET_PRODUCT = product;
		_trs_analysis();
	}
}
function _trs_basket_empty() {
		TRS_BASKET_PRODUCT = 'empty';
		_trs_analysis();
}
function _trs_v_conv(name, amount) {
	var regIsNum = /[^0-9]/gi;
	if (name == '') {
		TRS_V_CONV_NAME = '-';
	}
	else {
		TRS_V_CONV_NAME = name;
	}

	TRS_V_AMOUNT = amount.replace(regIsNum, "");

	if (TRS_V_CONV_NAME != '-') {
		_trs_analysis();
	}
}
function _trs_login_chk(id){
	if (id != '') {
		TRS_MEMBER_ID = id;
		_trs_analysis();
	}
}
function _trs_logout_chk(){
	_trs_SetCookie("_trs_memberID", "", "/", -1, true);
}
function _trs_member_withdraw(){
	TRS_MEMBER_TYPE = 'W';
	_trs_analysis();
}
