<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.min.js"></script>
<style>


form,textarea,input{
	font-size:19px
}

#form{
	position:absolute;
	left:1040px;
	top:0px;
}
#update{
	background-color:black;
	color:white;
	padding:3px;
	border-color:0px solid black;
	border-radius:3px;
	cursor:pointer;
}

.selected{
	background-color:#92a8d1;
}

.tab{
	padding:5px;
	border:3px solid #92a8d1;
	top-right-radius:10px;
	cursor:pointer;
}

.pdfobject-container{ 
	position:fixed;
	top:30px;
	height: 600px; 
	border: 5px solid #92a8d1; 
	width: 1000px;
}

#text{ 
	padding:50px;
	position:fixed;
	top:30px;
	height: 500px; 
	border: 5px solid #92a8d1; 
	width: 900px;
	display:none;
	overflow-y:scroll;
	white-space:pre-line;
}

#results{
	position-relative;
	padding-top:10px;
	padding-bottom:10px;
	font-size:24px;
	color:red;
}

#already{
	color:red;
}

#thumbnail{
	position:relative;
	width:400px;
}

</style>
</head>
<script>
var written = {};
<?php
$angstcode = "@@@";
$filename = "csv/$angstcode.csv";
$lines = explode("\n", file_get_contents($filename));
$total = count($lines);
for ($i=1;$i<$total-1;$i++){
	$values = explode(",",$lines[$i]);
	
	//Angst code,Angst number,Puppet Name,Provenance,Region,Note,Flagged,Biography,Link
	$puppetname = $values[2];
	$provenance = filter_var($values[3], FILTER_SANITIZE_STRING);
	$region = filter_var($values[4], FILTER_SANITIZE_STRING);
	$note = filter_var($values[5], FILTER_SANITIZE_STRING);
	
	print("\nwritten['$values[1]'] = {};");
	print("\nwritten['$values[1]']['puppetname'] = '$puppetname';");
	print("\nwritten['$values[1]']['provenance'] = '$provenance';");
	print("\nwritten['$values[1]']['region'] = '$region';");
	print("\nwritten['$values[1]']['note'] = '$note';");
}
?>

console.log(written);
</script>

<div id="menu">
	<span class="tab selected" id="angst">Angst</span>
	<span class="tab" id="cohen">Cohen</span>
</div>

<div id="pdf"></div>
<div id="text">
<!--here's where the Cohen notes go-->
@cohen@

</div>

<form id="form" autocomplete="off">

<label for="angstcode">Angst Code </label>
<input type="text" id="angstcode" name="angstcode" value="@@@"/>
<p>
<label for="angstcode">Angst Number </label>
<input type="text" id="angstnumber" name="angstnumber" value=""/><span id="already"></span>
</p>

<p>
<label for="name">Puppet Name </label>
<input type="text" id="puppetname" name="puppetname" value=""/>
</p>

<p>
<label for="name">Regional style </label>
<input type="text" id="region" name="region" value=""/>
</p>

<p>
<label for="name">Provenance notes</label>
<textarea id="provenance" name="provenance" value=""></textarea>
</p>

<p>
<label for="name">Other notes</label>
<textarea id="note" name="note" value=""></textarea>
</p>

<p>Genre: 
<select id="genre" name="genre">
  <option value=""></option>
  <option value="Wayang Golek Menak">Wayang Golek Menak</option>
	<option value="Wayang Kulit Menak">Wayang Kulit Menak</option>
	<option value="Wayang Kancil">Wayang Kancil</option>
	<option value="Wayang Wahyu">Wayang Wahyu</option>
	<option value="Wayang Potehi">Wayang Potehi</option>
	<option value="Wayang Cina-Jawa or Wayang Titi (Thithi)">Wayang Cina-Jawa or Wayang Titi (Thithi)</option>
	<option value="Wayang Calon Arang">Wayang Calon Arang</option>
	<option value="Wayang Golek Pakuan">Wayang Golek Pakuan</option>
	<option value="Wayang Keluarga Berencana">Wayang Keluarga Berencana</option>
	<option value="Wayang Jawa">Wayang Jawa</option>
	<option value="Wayang Wasana  ">Wayang Wasana  </option>
	<option value="Wayang Madya">Wayang Madya</option>
	<option value="Wayang Babad">Wayang Babad</option>
	<option value="Wayang Perjuangan">Wayang Perjuangan</option>
	<option value="Wayang Suluh">Wayang Suluh</option>
	<option value="Wayang Lenong Betawi  ">Wayang Lenong Betawi  </option>
	<option value="Wayang Parwa">Wayang Parwa</option>
	<option value="Bajang Kole ">Bajang Kole </option>
	<option value="Wayang Golek Purwa">Wayang Golek Purwa</option>
	<option value="Wayang Kulit Purwa">Wayang Kulit Purwa</option>
	<option value="Wayang Wong">Wayang Wong</option>
	<option value="Wayang Ukur">Wayang Ukur</option>
	<option value="Wayang Pancasila">Wayang Pancasila</option>
	<option value="Wayang Sarung Tangan">Wayang Sarung Tangan</option>
	<option value="Wayang Topeng">Wayang Topeng</option>
	<option value="Wayang Golek Cepak">Wayang Golek Cepak</option>
	<option value="Wayang Krucil or Klitik">Wayang Krucil or Klitik</option>
	<option value="Wayang Thengul">Wayang Thengul</option>
	<option value="Wayang Sasak">Wayang Sasak</option>
	<option value="Wayang Suket">Wayang Suket</option>
	<option value="Wayang Beber">Wayang Beber</option>
	<option value="Wayang Gambuh">Wayang Gambuh</option>
	<option value="Wayang Gedog">Wayang Gedog</option>
	<option value="Wayang Ramayana">Wayang Ramayana</option>
	<option value="Wayang Cupak">Wayang Cupak</option>
</select>
</p>

<p>Story: 
<select id="story" name="story">
	<option value=""></option>
	<option value="Amir Hamzah  stories">Amir Hamzah  stories</option>
	<option value="Animal Fables, featuring the trickster mouse deer">Animal Fables, featuring the trickster mouse deer</option>
	<option value="Bible stories and lives of the saints  ">Bible stories and lives of the saints  </option>
	<option value="Chinese legends and myths">Chinese legends and myths</option>
	<option value="East Javanese stories">East Javanese stories</option>
	<option value="History and Propaganda">History and Propaganda</option>
	<option value="History and Propaganda: family planning">History and Propaganda: family planning</option>
	<option value="History and Propaganda: Javanese history and legend">History and Propaganda: Javanese history and legend</option>
	<option value="History and Propaganda: Late Javanese and colonial history">History and Propaganda: Late Javanese and colonial history</option>
	<option value="History and Propaganda: medieval Javanese history">History and Propaganda: medieval Javanese history</option>
	<option value="History and Propaganda: national heroes">History and Propaganda: national heroes</option>
	<option value="History and Propaganda: resistance to imperialism">History and Propaganda: resistance to imperialism</option>
	<option value="History and Propaganda: resistance to imperialism and revolution">History and Propaganda: resistance to imperialism and revolution</option>
	<option value="History and Propaganda: stories from old Batavia">History and Propaganda: stories from old Batavia</option>
	<option value="Mahabharata">Mahabharata</option>
	<option value="Mahabharata and Ramayana">Mahabharata and Ramayana</option>
	<option value="History and Propaganda: nationalist re-telling of Mahabharata and Ramayana">History and Propaganda: nationalist re-telling of Mahabharata and Ramayana</option>
	<option value="Supplemental material for Wayang Thengul">Supplemental material for Wayang Thengul</option>
	<option value="Mixed repertoire">Mixed repertoire</option>
	<option value="Mixed repertoire: Menak (Amir Hamzah), Panji and other stories">Mixed repertoire: Menak (Amir Hamzah), Panji and other stories</option>
	<option value="Mostly Amir Hamzah stories">Mostly Amir Hamzah stories</option>
	<option value="Mostly Mahabharata">Mostly Mahabharata</option>
	<option value="Panji">Panji</option>
	<option value="Panji and other Javanese legends">Panji and other Javanese legends</option>
	<option value="Ramayana">Ramayana</option>
	<option value="Stories of Cupak and Grantang">Stories of Cupak and Grantang</option>	
</select>
</p>

<p>
<input type="checkbox" id="flagged" name="flagged" value="flagged">
<label for="vehicle1">Flag?</label><br>
</p>

<span id="update">Add</span>
<br/>
<div id="results"></div>
<br/>
<img id="thumbnail" src="" width=""/>

</form>
<script>

PDFObject.embed("pdf/@@@.pdf", "#pdf");
	
$(document).ready(function(){
	
	$('#angstcode').on("input", check);
	$('#angstnumber').on("input", check);

	function check(){
		angstcode = $('#angstcode').val();
		angstnumber = $('#angstnumber').val();
		
		
		strcode = String(angstnumber);
	
		if (strcode.length == 1){
			strcode = "00" + strcode;
		}
		else if(strcode.length == 2){
			strcode = "0" + strcode;
		}
		
		$.ajax({
			type: "POST",
			url: 'checkImageName.php',
			data:{angstcode:angstcode,boxnumber:@boxnumber@,angstnumber:angstnumber},
			success: function(response){
				console.log(response);
				image = response
			}
		});
		
		$('#results').html("");
		$("#thumbnail").attr("src",image);
		if (angstnumber != "" ){
			if (angstnumber.toString() in written){
				$("#already").html("Already on record!");
				$("#puppetname").val(written[angstnumber.toString()]["puppetname"]);
				$("#provenance").val(written[angstnumber.toString()]["provenance"]);
				$("#region").val(written[angstnumber.toString()]["region"]);
				$("#note").val(written[angstnumber.toString()]["notes"]);
				$("input,textarea").css("color","red");
				$("#update").css("display","none");
			}else{
				$("#already").html("");
				$("#puppetname").val("");
				$("#region").val("");
				$("#provenance").val("");
				$("#note").val("");
				$("input,textarea").css("color","black");
				$("#update").css("display","inline-block");
			}
		}
		else{
			$("#already").html("");
			$("#puppetname").val("");
			("#region").val("");
			$("#provenance").val("");
			$("#notes").val("");
			$("input,textarea").css("color","black");
			$("#update").css("display","inline-block");
		}
		//check if record exists
		
		$.ajax({url:image,type:'HEAD',error:do_something});
		function do_something(){
			$('#results').html("no image");
		}
	}
	
	//add new record
	$("#update").click(function(){
		angstcode = $("#angstcode").val();
		angstnumber = $("#angstnumber").val();
		puppetname = $("#puppetname").val();
		provenance = $("#provenance").val();
		region = $("#region").val();
		note = $("#note").val();
		
		genre = $("#genre").val();
		story = $("#story").val();
		
		if($("#flagged").is(':checked')){
		    flagged = "Yes";
		}
		else{
		    flagged = "";
		}
		
		data = {"angstcode":angstcode,"angstnumber":angstnumber,"puppetname":puppetname,"provenance":provenance,"region":region,"note":note,"flagged":flagged,"genre":genre,"story":story}
		
		written[angstnumber] = {puppetname,"provenance":provenance,"region":region,"note":note};
		
		$.ajax({
			type: "POST",
			url: 'harmonizecsv.php',
			data:data,
			success: function(response){
				console.log(response);
				angstnumber = $("#angstnumber").val("");
				puppetname = $("#puppetname").val("");
				provenance = $("#provenance").val("");
				region = $("#region").val("");
				note = $("#note").val("");
				genre = $("#genre").val("");
				story = $("#story").val("");
			}
		});
	});
	
	$("#cohen").click(function(){
		$("#text").css("display","block");
		$("#pdf").css("display","none");
		$("#angst").removeClass("selected");
		$("#cohen").addClass("selected");
	})
	
	$("#angst").click(function(){
		$("#pdf").css("display","block");
		$("#text").css("display","none");
		$("#cohen").removeClass("selected");
		$("#angst").addClass("selected");
	})

});
</script>

</html>
