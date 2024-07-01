$("#typeis").change(function() {
	var t = $("#typeis").val();
	if(t != '') {
		getyear(t); $("#year").attr("disabled", false), $("#maker,#model,#engdesc,#price").attr("disabled", true), $("#maker,#model,#engdesc,#price").empty();
	} else { 
		$("#year,#maker,#model,#engdesc,#price").attr("disabled", true),$("#year,#maker,#model,#engdesc,#price").empty();
	}
});

$("#year").change(function() {
	var t = $("#typeis").val();
	var y = $("#year").val();
	if(y != '') {
		getmaker(t,y); $("#maker").attr("disabled", false), $("#model,#engdesc,#price").attr("disabled", true), $("#model,#engdesc,#price").empty();
	} else { 
		$("#maker,#model,#engdesc,#price").attr("disabled", true),$("#maker,#model,#engdesc,#price").empty();
	}
});

$("#maker").change(function() {
	var t = $("#typeis").val();
	var y = $("#year").val();
	var m = $("#maker").val();
	if(m != '') {
		getmodel(t,y,m); $("#model").attr("disabled", false), $("#engdesc,#price").attr("disabled", true), $("#engdesc,#price").empty();
	} else { 
		$("#model,#engdesc,#price").attr("disabled", true),$("#model,#engdesc,#price").empty();
	}
});

$("#model").change(function() {
	var t = $("#typeis").val();
	var y = $("#year").val();
	var m = $("#maker").val();
	var mo = $("#model").val();
	if(mo != '') {
		getengdesc(t,y,m,mo); $("#engdesc").attr("disabled", false), $("#price").attr("disabled", true), $("#price").empty();
	} else { 
		$("#engdesc,#price").attr("disabled", true),$("#engdesc,#price").empty();
	}
});

$("#engdesc").change(function() {
	var t = $("#typeis").val();
	var y = $("#year").val();
	var m = $("#maker").val();
	var mo = $("#model").val();
	var eng = $("#engdesc").val();
	if(eng != '') {
		getprice(t,y,m,mo,eng); $("#price").attr("disabled", false); 
	} else { 
		$("#price").attr("disabled", true),$("#price").empty();
	}
});

function getyear(t){
		$.ajax({
			type: "POST", 
			url: "http://localhost/ci/car_insurance/chkcarp", 
			data: "sdata=year_model&typeis="+t, 
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
			url: "http://localhost/ci/car_insurance/chkcarp", 
			data: "sdata=maker&typeis="+t+"&year="+y, 
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
			url: "http://localhost/ci/car_insurance/chkcarp", 
			data: "sdata=model&typeis="+t+"&year="+y+"&maker="+m, 
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
			url: "http://localhost/ci/car_insurance/chkcarp", 
			data: "sdata=engdesc&typeis="+t+"&year="+y+"&maker="+m+"&model="+mo, 
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

function getprice(t,y,m,mo,eng){
		$.ajax({
			type: "POST", 
			url: "http://localhost/ci/car_insurance/chkcarp", 
			data: "sdata=newprice&typeis="+t+"&year="+y+"&maker="+m+"&model="+mo+"&engdesc="+eng, 
			success: function(msg)
			{ 
				if(msg=="<option value=''>เลือก</option>"){
					msg="<option value=''>ไม่พบข้อมูล</option>"
				} else {
					$("#price").html(msg);
				}
			}
		});	
}