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


$("#maker").change(function() {
	var m = $("#maker").val();
	if(m != '') {
		getmodel(m); $("#model").attr("disabled", false), $("#year,#carcode,#sizeno").empty();
	} else { 
		$("#model,#carcode,#sizeno").attr("disabled", true),$("#model,#carcode,#sizeno").empty();
	}
});

$("#model").change(function() {
	var m = $("#maker").val();
	var mo = $("#model").val();
	if(mo != '') {
		getyear(m,mo); $("#year").attr("disabled", false), $("#carcode,#sizeno").empty();
	} else { 
		$("#carcode,#sizeno").attr("disabled", true),$("#carcode,#sizeno").empty();
	}
});

$("#year").change(function() {
	var m = $("#maker").val();
	var mo = $("#model").val();
	var y = $("#year").val();
	if(y != '') {
		getcarcode(m,mo,y); $("#carcode").attr("disabled", false), $("#sizeno").empty();
	} else { 
		$("#maker,#model,#carcode,#sizeno").attr("disabled", true),$("#maker,#model,#carcode,#sizeno").empty();
	}
});

$("#carcode").change(function() {
	var cc = $("#carcode").val();
	if(cc != '') {
		getsizeno(cc); $("#sizeno").attr("disabled", false);
	} else { 
		$("#maker,#model,#carcode,#sizeno").attr("disabled", true),$("#maker,#model,#carcode,#sizeno").empty();
	}
});

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

function getmodel(m){
		$.ajax({
			type: "POST", 
			url: baseurl+"motor_insurance/chkcarp", 
			data: "sdata=model&maker="+m, 
			success: function(data){ 
				$.each(data,function(key,val){
					$("#model").html(val.select);
				});
			}
		});	
}

function getyear(m,mo){
	$.ajax({
		type: "POST", 
		url: baseurl+"motor_insurance/chkcarp", 
		data: "sdata=year_model&model="+mo+"&maker="+m, 
		success: function(data){ 
			$.each(data,function(key,val){
				$("#year").html(val.select);
			});
		}
	});	
}

function getcarcode(m,mo,y){
	$.ajax({
		type: "POST", 
		url: baseurl+"motor_insurance/chkcarp", 
		data: "sdata=carcode&model="+mo+"&maker="+m+"&year="+y+"&carcode=''", 
		success: function(data){ 
			$.each(data,function(key,val){
				$("#carcode").html(val.select);
			});
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
		success: function(data){ 
			$.each(data,function(key,val){
				$("#sizeno").html(val.select);
			});
		}
	});	
}
$("#heading1 a").click(function() {
	$('#agt1-form')[0].reset();
	$('.form-linke, .form-attached').hide();
});
$("#heading2 a").click(function() {
	$('#agt2-form')[0].reset();
	$('.form-linke, .form-attached').hide();
});
$("#heading3 a").click(function() {
	$('#agt3-form')[0].reset();
	$('.form-linke, .form-attached').hide();
});

function checkID(id){
    if(id.substring(0,1)== 0) return false;
    if(id.length != 13) return false;
    for(i=0, sum=0; i < 12; i++)
        sum += parseFloat(id.charAt(i))*(13-i);
    if((11-sum%11)%10!=parseFloat(id.charAt(12))) return false;
    return true;
}

$.formUtils.addValidator({
	name : 'idCradThai',
	validatorFunction : function(value, $el, config, language, $form) {
		return checkID(value);
	},
	errorMessage : 'รูปแบบเลขบัตรประชาชนไม่ถูกต้อง',
	errorMessageKey: 'กรุณากรอกเฉพาะตัวเลข'
});

$.validate({ 
	form : '#form,#formpolicy,#appeal-form,#pro-form,#career-form,#cbkk-form,#ccmi-form,#agt1-form,#agt2-form,#agt3-form',
	modules : 'date, security, file',
    onModulesLoaded : function() {
/*
		$("input[name='agtno']").keyup(function(){
            var agtno = $(this).val();
			if(agtno == "") {
				console.log("remove");
				$('input[name="agtno"]').removeAttr(
					"data-validation data-validation-length"
				);
			} else {
				console.log("add");
				$('input[name="agtno"]').attr({
					'data-validation' : "length",
					'data-validation-length' : "10"
				});
			}
		});
*/
		$("input[name='was_agt']").click(function(){
            var was_agt = $(this).val();
			if(was_agt == "Y") {
				$('input[name="was_agtno"]').attr('data-validation', "required");
			} else {
				$('input[name="was_agtno"]').removeAttr('data-validation');
			}
		});

		$("input[name='mess_addr']").click(function(){
            var mess_addr = $(this).val();
			if(mess_addr == "Y") {
				$('input[name="addressed"]').attr('data-validation', "required");
			} else {
				$('input[name="addressed"]').removeAttr('data-validation');
			}
		});

		$("input[name='upload_type']").click(function(){
            var upload_type = $(this).val();
			console.log(upload_type);

			if(upload_type == "url") {
				$('.form-linke').slideDown(400);
				$('.form-attached').slideUp(400);
				$('input[name="link_file"]').attr('data-validation', "url");
				$('input[name="attached"]').removeAttr("data-validation data-validation-allowing data-validation-max-size");
			} else {
				$('.form-attached').slideDown(400);
				$('.form-linke').slideUp(400);
				$('input[name="attached"]').attr({
					"data-validation" : "required extension",
					"data-validation-allowing" : "pdf",
					"data-validation-max-size" : "10M"
				});
				$('input[name="link_file"]').removeAttr('data-validation');
			}

		});

	},
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
			

			// if (data == 'successful') {
			// 	$(thisForm)[0].reset();
			// 	Swal.fire({ position: 'center', type: 'success', title: 'ส่งข้อความเรียบร้อย', showConfirmButton: true }).then((result) => { location.reload(); });
			// }else if(data.indexOf("วันที่เริ่ม") !== -1){
			// 	Swal.fire({ position: 'center', type: 'success', title: 'รายละเอียดกรมธรรม์',html: data }).then((result) => { location.reload(); });
			// }
			// else {
			// 	Swal.fire({ position: 'center', type: 'error', title: 'Error', html: data }).then((result) => { location.reload(); }); 
			// }d

			if (data == 'successful') {
				$(thisForm)[0].reset();
				Swal.fire({ position: 'center', type: 'success', title: 'ส่งข้อความเรียบร้อย', showConfirmButton: true }).then((result) => { location.reload(); });
			}
            else if(data.indexOf("วันที่เริ่ม") !== -1){
				Swal.fire({ position: 'center', type: 'success', title: 'รายละเอียดกรมธรรม์',html: data }).then((result) => { location.reload(); });
			} else {
				Swal.fire({ position: 'center', type: 'error', title: 'Error', html: data }).then((result) => { location.reload(); }); 
			}



		}
      });
    return false;
};




$('.bin-position').click(function(){
	$('.form-content').slideDown(400);
	$('select[name=pdname]').val($(this).data('position')).trigger('change');
});
