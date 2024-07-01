$(function ($) {
	//runScriptCareerPage();
});

$("#pdname").change(function() {
	var t = $("#pdname").val();
	if(t == 'การประกันภัยรถยนต์(ภาคสมัครใจ)') {
		$("#insutype").html("<option value=''>เลือก</option><option value='1'>ประกันภัยรถยนต์ ชั้น 1</option><option value='2'>ประกันภัยรถยนต์ ชั้น 2</option><option value='3'>ประกันภัยรถยนต์ ชั้น 3</option><option value='5'>ประกันภัยรถยนต์ ชั้น 5</option>");
	} else { 
		$("#insutype").html("<option value=''>เลือก</option><option value='พรบ.'>การประกันภัยรถยนต์ภาคบังคับ (พรบ.)</option>");
	}
});

$("#insutype").change(function() {
	var t = $("#insutype").val();
	if(t != '') {
		getyear(t); $("#year").attr("disabled", false), $("#maker,#model,#engdesc,#sizeno").attr("disabled", true), $("#maker,#model,#engdesc,#sizeno").empty();
	} else { 
		$("#year,#maker,#model,#engdesc,#sizeno").attr("disabled", true),$("#year,#maker,#model,#engdesc,#sizeno").empty();
	}
});

$("#year").change(function() {
	var t = $("#insutype").val();
	var y = $("#year").val();
	if(y != '') {
		getmaker(t,y); $("#maker").attr("disabled", false), $("#model,#engdesc,#sizeno").attr("disabled", true), $("#model,#engdesc,#sizeno").empty();
	} else { 
		$("#maker,#model,#engdesc,#sizeno").attr("disabled", true),$("#maker,#model,#engdesc,#sizeno").empty();
	}
});

$("#maker").change(function() {
	var t = $("#insutype").val();
	var y = $("#year").val();
	var m = $("#maker").val();
	if(m != '') {
		getmodel(t,y,m); $("#model").attr("disabled", false), $("#engdesc,#sizeno").attr("disabled", true), $("#engdesc,#sizeno").empty();
	} else { 
		$("#model,#engdesc,#sizeno").attr("disabled", true),$("#model,#engdesc,#sizeno").empty();
	}
});

$("#model").change(function() {
	var t = $("#insutype").val();
	var y = $("#year").val();
	var m = $("#maker").val();
	var mo = $("#model").val();
	if(mo != '') {
		getengdesc(t,y,m,mo); $("#engdesc").attr("disabled", false), $("#sizeno").attr("disabled", true), $("#sizeno").empty();
	} else { 
		$("#engdesc,#sizeno").attr("disabled", true),$("#engdesc,#sizeno").empty();
	}
});

$("#engdesc").change(function() {
	var s = $("#engdesc").val();
	if(s != '') {
		getsizeno(s); $("#sizeno").attr("disabled", false),$("#sizeno").empty();
	} else { 
		$("#sizeno").attr("disabled", true),$("#sizeno").empty();
	}
});

function getyear(t){
		$.ajax({
			type: "POST", 
			url: baseurl+"motor_insurance/chkcarp", 
			data: "sdata=year_model&insutype="+t, 
			success: function(msg)
			{ 
				if(msg=="<option value=''>เลือก</option>"){
					msg="<option value=''>ไม่พบข้อมูล</option>"
				} else {
					$("#year").html(msg);
				}
			}
		});	
}

function getmaker(t,y){
		$.ajax({
			type: "POST", 
			url: baseurl+"motor_insurance/chkcarp", 
			data: "sdata=maker&insutype="+t+"&year="+y, 
			success: function(msg)
			{ 
				if(msg=="<option value=''>เลือก</option>"){
					msg="<option value=''>ไม่พบข้อมูล</option>"
				} else {
					$("#maker").html(msg);
				}
			}
		});	
}

function getmodel(t,y,m){
		$.ajax({
			type: "POST", 
			url: baseurl+"motor_insurance/chkcarp", 
			data: "sdata=model&insutype="+t+"&year="+y+"&maker="+m, 
			success: function(msg)
			{ 
				if(msg=="<option value=''>เลือก</option>"){
					msg="<option value=''>ไม่พบข้อมูล</option>"
				} else {
					$("#model").html(msg);
				}
			}
		});	
}

function getengdesc(t,y,m,mo){
		$.ajax({
			type: "POST", 
			url: baseurl+"motor_insurance/chkcarp", 
			data: "sdata=engdesc&insutype="+t+"&year="+y+"&maker="+m+"&model="+mo, 
			success: function(msg)
			{ 
				if(msg=="<option value=''>เลือก</option>"){
					msg="<option value=''>ไม่พบข้อมูล</option>"
				} else {
					$("#engdesc").html(msg);
				}
			}
		});	
}

function getsizeno(s){
		$.ajax({
			type: "POST", 
			url: baseurl+"motor_insurance/chkcars", 
			data: "sdata=SIZENO&carcode="+s, 
			success: function(msg)
			{ 
				if(msg=="<option value=''>เลือก</option>"){
					msg="<option value=''>ไม่พบข้อมูล</option>"
				} else {
					$("#sizeno").html(msg);
				}
			}
		});	
}

$.validate({ 
	form : '#form,#appeal-form,#pro-form,#career-form,#cbkk-form,#ccmi-form',
	modules : 'security, file',
	lang: 'en',
	onSuccess : function(form) { return $.sendFormData(form); }
});

$.sendFormData = function(form) { 
    var thisForm = form;
    var targetUrl = $(thisForm).attr('action');
    var formData = new FormData(thisForm[0]);
	var request = $.ajax({   
		url: targetUrl,
        type: "POST",
        data: formData,
		cache: false,
		contentType: false,
		processData: false,
		beforeSend: function(){
			Swal.fire({ title: 'กรุณารอสักครู่...', text: 'ต้องการยกเลิกหรือไม่', imageUrl: baseurl+"assets/img/preloader.gif", imageWidth: 300, imageHeight: 300, padding: '3em', background: '#fff', backdrop: 'rgba(0,0,0,0.7)' }).then((result) => { location.reload(); });
		},
		success: function(data){
			if (data == 'successful') {
				Swal.fire({ position: 'center', type: 'success', title: 'ส่งข้อความเรียบร้อย', showConfirmButton: true }).then((result) => { location.reload(); });
			} else {
				Swal.fire({ position: 'center', type: 'error', title: 'Error', text: 'ไม่สามารถส่งข้อความได้' }).then((result) => { location.reload(); });
			}
		}
      });
    return false;
};


$('.bin-position').click(function(){
	$('.form-content').slideDown(400);
	$('select[name=pdname]').val($(this).data('position')).trigger('change');
});
