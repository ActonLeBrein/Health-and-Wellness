<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../fonts/stylesheet.css" />
	<link rel="stylesheet" type="text/css" href="style.css" />
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
	<script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'></script>	
	<script src="js/simpleFacebookGraph.js"></script>	
	<script src="js/fblogin.js"></script>	
	<script src="js/simpletip.js"></script>
	<script src="js/funcionalidad.js"></script>		
	<script>
		$(document).ready(function(){
			var ancho = $(window).width();
			if(ancho<=320){			
				$("#link_consulta").attr("href","http://m.www.univision.com/interactivos/openpage/2013-11-13/body-mass-index-movil");
				$("#link_version").attr("href","http://m.www.univision.com/interactivos/openpage/2013-11-13/cual-es-tu-numero-de-salud-movil");
			}else{				
				$("#link_consulta").attr("href","http://www.univision.com/interactivos/openpage/2013-11-13/body-mass-index");
				$("#link_version").attr("href","http://www.univision.com/interactivos/openpage/2013-11-13/cual-es-tu-numero-de-salud");
			}
			var paises = ["Afghanistan","Albania","Algeria","American Samoa","Andorra","Angola","Antigua and Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas, The","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Brazil","Brunei Darussalam","Bulgaria","Burkina Faso","Burundi","Cabo Verde","Cambodia","Cameroon","Canada","Cayman Islands","Central African Republic","Chad","Channel Islands","Chile","China","Colombia","Comoros","Congo, Dem. Rep.","Congo, Rep.","Costa Rica","Cote d'Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt, Arab Rep.","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Faeroe Islands","Fiji","Finland","France","French Polynesia","Gabon","Gambia, The","Georgia","Germany","Ghana","Greece","Greenland","Grenada","Guam","Guatemala","Guinea","Guinea-Bissau","Guyana","Haiti","Honduras","Hong Kong SAR, China","Hungary","Iceland","India","Indonesia","Iran, Islamic Rep.","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Korea, Dem. Rep.","Korea, Rep.","Kosovo","Kuwait","Kyrgyz Republic","Lao PDR","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macao SAR, China","Macedonia, FYR","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia, Fed. Sts.","Moldova","Monaco","Mongolia","Montenegro","Morocco","Mozambique","Myanmar","Namibia","Nepal","Netherlands","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North America","Northern Mariana Islands","Norway","Oman","Pakistan","Palau","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Romania","Russian Federation","Rwanda","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovak Republic","Slovenia","Solomon Islands","Somalia","South Africa","South Asia","South Sudan","Spain","Sri Lanka","St. Kitts and Nevis","St. Lucia","St. Martin (French part)","St. Vincent and the Grenadines","Sudan","Suriname","Swaziland","Sweden","Switzerland","Tajikistan","Tanzania","Thailand","Timor-Leste","Togo","Tonga","Trinidad and Tobago","Tunisia","Turkey","Turkmenistan","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","Uruguay","Uzbekistan","Vanuatu","Venezuela, RB","Vietnam","Virgin Islands (U.S.)","West Bank and Gaza","Yemen, Rep.","Zambia","Zimbabwe"];			
			$.each(paises, function(index,value){
				$("<option value='"+value+"'>"+value+"</option>").appendTo("#paises");
			});
			$("#cp").change(function() {
				$("#codigo_postal").val($(this).val());
			});
			$("#paises").change(function() {
				$("#pais").val($(this).val());
			});			
		});
	</script>
    <script type="text/javascript">
      /*Login con Google+ */
      var loginFinished = function(authResult) {
        if (authResult) {      
          //var el = document.getElementById('oauth2-results');
          if (authResult['status']['signed_in']) {
            gapi.auth.setToken(authResult);
            gapi.client.load('plus', 'v1', function() {
                // This sample assumes a client object has been created.
                // To learn more about creating a client, check out the starter:
                //  https://developers.google.com/+/quickstart/javascript
                var request = gapi.client.plus.people.get({
                  'userId' : 'me'
                });
                request.execute(function(resp) {
                  //el.innerHTML = "ID:"+ resp.id+" Name:"+resp.displayName;
                  $("#google_id").val(resp.id);
                  $("#google_name").val(resp.displayName);
                  mostrar("pregunta0");
                  $("#facebook").css({"display":"none"});
                });
            });

          }     
        }
      }; 
  </script>
</head>
<body>
    <!-- Place this asynchronous JavaScript just before your </body> tag -->
    <script type="text/javascript">
      (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client:plusone.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();
    </script>
	<div id="content">
		<div id="header">				
			<a href="#" class="consulta" id="link_consulta" target="_top">IDENTIFY YOUR BMI</a>
			<a href="#" class="version" id="link_version" data-ver="ing" target="_top">ESP</a>	
		</div>	
		<div id="en_contenido">
			<?php if (isset($_POST['facebook_id'])==false){?>
			<div id="preguntas">
				<div id="data_facebook"></div>
				<div id="facebook">
					<h3>Start the quiz</h3>
					<div id="btn_facebook"><span>Connect with Facebook</span></div>
					<div id="btn_sin_facebook"><span>No, go to the quiz.</span></div>
                    <div class="btn_google">
                        <span id="signinButton">
                          <span
                            class="g-signin custom"
                            data-callback="loginFinished"
                            data-clientid="847964566173-vc06veo4srmtisjc5bq33fctlapo22nv.apps.googleusercontent.com"
                            data-cookiepolicy="single_host_origin"
                            data-requestvisibleactions="http://schemas.google.com/AddActivity"
                            data-scope="https://www.googleapis.com/auth/plus.login"
                            data-width="wide"
                            data-height="tall"
                          >

                          </span>
                        </span>
                    </div>
				</div>
				<div id="pregunta0" style="display:none" class="pregunta" data-next="pregunta1">
					<h3>Do you have information from  recent medical exams?</h3>
					<div class="regresar" onclick="mostrar('facebook');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>					
				</div>

				<div id="pregunta1" style="display:none" class="pregunta"  data-next="pregunta2">
					<h3>Are you male or female?</h3>
					<div class="regresar" onclick="mostrar('pregunta0');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Female</div>
					<div class="respuesta respuesta2" data-respuesta="2">Male</div>									
				</div>						
				
				<div id="pregunta2" style="display:none" class="pregunta mujer" data-next="pregunta3">
					<h3>What is your age?</h3>
					<div class="regresar" onclick="mostrar('pregunta1');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Younger than 45 years old</div>
					<div class="respuesta respuesta2" data-respuesta="2">45 years old or above</div>									
				</div>						
				
				<div id="pregunta3" style="display:none" class="pregunta" data-next="pregunta4">
					<h3>How many days per week do you exercise?</h3>
					<div class="regresar" onclick="mostrar('pregunta2');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">0 days a week</div>
					<div class="respuesta respuesta2" data-respuesta="2">1 to 2 days a week</div>				
					<div class="respuesta respuesta3" data-respuesta="3">3 to 4 days a week</div>				
					<div class="respuesta respuesta4" data-respuesta="4">5 to 7 days a week</div>													
				</div>						
				<div id="pregunta4" style="display:none" class="pregunta" data-next="pregunta5">
					<h3>Do you avoid eating junk food and unhealthy snacks?</h3>
					<div class="regresar" onclick="mostrar('pregunta3');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>													
				</div>									
				<div id="pregunta5" style="display:none" class="pregunta" data-next="pregunta6">
					<h3>Do you follow a low-fat diet?</h3>
					<div class="regresar" onclick="mostrar('pregunta4');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>													
				</div>						
				<div id="pregunta6" style="display:none" class="pregunta" data-next="pregunta7">
					<h3>Do you have a good fiber intake or eat multigrain foods?</h3>
					<div class="regresar" onclick="mostrar('pregunta5');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>													
				</div>						
				<div id="pregunta7" style="display:none" class="pregunta" data-next="pregunta8">
					<h3>Do you eat five servings of fruits or vegetables each day?</h3>
					<div class="regresar" onclick="mostrar('pregunta6');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>													
				</div>						
				<div id="pregunta8" style="display:none" class="pregunta" data-next="pregunta9">
					<h3>Do you drink 7 to 8 cups of water each day?</h3>
					<div class="regresar" onclick="mostrar('pregunta7');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>					
				</div>						
				<div id="pregunta9" style="display:none" class="pregunta" data-next="pregunta10">
					<h3>Do you follow a low-salt diet?</h3>
					<div class="regresar" onclick="mostrar('pregunta8');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>												
				</div>						
				<div id="pregunta10" style="display:none" class="pregunta" data-next="pregunta11">
					<h3>What is your Body Mass Index? (If you don’t know your <a class="link" href="http://www.univision.com/interactivos/openpage/2013-11-13/body-mass-index" target="_blank">BMI</a>, use our calculator to find out.)</h3>
					<div class="regresar" onclick="mostrar('pregunta9');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Less than 18.5</div>
					<div class="respuesta respuesta2" data-respuesta="2">18.5 to 24.9</div>								
					<div class="respuesta respuesta3" data-respuesta="3">25 to 29.9</div>								
					<div class="respuesta respuesta4" data-respuesta="4">30 or more</div>													
				</div>						
				<div id="pregunta11" style="display:none" class="pregunta" data-next="pregunta12">
					<h3>Are you diabetic?</h3>
					<div class="regresar" onclick="mostrar('pregunta10');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>													
				</div>						
				<div id="pregunta12" style="display:none" class="pregunta" data-next="pregunta13">
					<h3>Do you feel anxious or irritable?</h3>
					<div class="regresar" onclick="mostrar('pregunta11');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>													
				</div>					
				<div id="pregunta13" style="display:none" class="pregunta" data-next="pregunta14">
					<h3>Are you overly self-critical or fearful of failure?</h3>
					<div class="regresar" onclick="mostrar('pregunta12');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>													
				</div>					
				<div id="pregunta14" style="display:none" class="pregunta" data-next="pregunta15">
					<h3>Do you cry frequently or act impulsively?</h3>
					<div class="regresar" onclick="mostrar('pregunta13');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>													
				</div>					
				<div id="pregunta15" style="display:none" class="pregunta" data-next="pregunta16">
					<h3>Do you suffer from sleeplessness, frequent headaches or stomach distress?</h3>
					<div class="regresar" onclick="mostrar('pregunta14');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>													
				</div>					
				<div id="pregunta16" style="display:none" class="pregunta" data-next="pregunta17">
					<h3>What is your weekly intake of alcoholic beverages?</h3>
					<div class="regresar" onclick="mostrar('pregunta15');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">0 to 4 drinks</div>
					<div class="respuesta respuesta2" data-respuesta="2">5 to 7 drinks</div>								
					<div class="respuesta respuesta3" data-respuesta="2">8 to 13 drinks</div>								
					<div class="respuesta respuesta4" data-respuesta="2">More than 13 drinks</div>													
				</div>					
				<div id="pregunta17" style="display:none" class="pregunta" data-next="pregunta18">
					<h3>Do you sleep 7 to 9 hours each night?</h3>
					<div class="regresar" onclick="mostrar('pregunta16');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>													
				</div>					
				<div id="pregunta18" style="display:none" class="pregunta" data-next="pregunta19">
					<h3>Were you sick for less than 5 days in the past year?</h3>
					<div class="regresar" onclick="mostrar('pregunta17');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>													
				</div>					
				<div id="pregunta19" style="display:none" class="pregunta" data-next="pregunta20">
					<h3>Tobacco</h3>
					<div class="regresar" onclick="mostrar('pregunta18');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Never smoked or stopped smoking more than two years ago</div>
					<div class="respuesta respuesta2" data-respuesta="2">Stopped smoking less than two years ago</div>
					<div class="respuesta respuesta3" data-respuesta="3">Smoke cigars or pipes, or frequent exposure to second-hand smoke</div>
					<div class="respuesta respuesta4" data-respuesta="4">Smoke cigarettes</div>					
				</div>			
				<div id="pregunta20" style="display:none" class="pregunta" data-next="pregunta21">
					<h3>Do you eat breakfast on a daily basis?</h3>
					<div class="regresar" onclick="mostrar('pregunta19');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>													
				</div>					
				<div id="pregunta21" style="display:none" class="pregunta" data-next="pregunta25">
					<h3>Do you wear sunscreen?</h3>
					<div class="regresar" onclick="mostrar('pregunta20');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
					<div class="respuesta respuesta2" data-respuesta="2">No</div>													
				</div>	
				<div id="pregunta25" style="display:none" class="pregunta last">
					<h3>What's your zip code?</h3>
					<div class="regresar" onclick="mostrar('pregunta20');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="codigo_postal">
						<input type="text" name="cp" id="cp" maxlength="5" size="5">
						<br>
						<p>If you don't live in the U.S., choose your country</p>													
						<select id="paises">
							<option value=""></option>
						</select>
					</div>					
					<div class="respuesta centrada">What’s my Wellness Score?</div>
				</div>									
				<div id="pregunta22" style="display:none" class="pregunta" data-next="pregunta23">
					<h3>What is your total cholesterol?</h3>
					<div class="regresar" onclick="mostrar('pregunta9');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">240 or more</div>
					<div class="respuesta respuesta2" data-respuesta="2">200 to 239</div>								
					<div class="respuesta respuesta3" data-respuesta="3">160 to 199</div>								
					<div class="respuesta respuesta4" data-respuesta="4">less than 160</div>													
				</div>					
				<div id="pregunta23" style="display:none" class="pregunta" data-next="pregunta24">
					<h3>What is your diastolic blood pressure (lower)?</h3>
					<div class="regresar" onclick="mostrar('pregunta22');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">90 or more</div>
					<div class="respuesta respuesta2" data-respuesta="2">80 to 89</div>								
					<div class="respuesta respuesta3" data-respuesta="3">76 to 79</div>								
					<div class="respuesta respuesta4" data-respuesta="4">75 or less</div>													
				</div>					
				<div id="pregunta24" style="display:none" class="pregunta" data-next="pregunta10">
					<h3>What is your systolic blood pressure (higher)?</h3>
					<div class="regresar" onclick="mostrar('pregunta23');">
						BACK
						<div class="trazo"></div>
					</div>
					<div class="respuesta respuesta1" data-respuesta="1">140 or more</div>
					<div class="respuesta respuesta2" data-respuesta="2">120 to 139</div>								
					<div class="respuesta respuesta3" data-respuesta="3">116 to 119</div>								
					<div class="respuesta respuesta4" data-respuesta="4">115 or less</div>													
				</div>					
			</div>	
			<?php  } else if( ($_POST["preguntax"]=="") && ($_POST["preguntay"]=="") ){
				$pregunta2[1]=8;
				$pregunta2[2]=0;								
				$pregunta3[1]=0;
				$pregunta3[2]=1.66521511179645;
				$pregunta3[3]=3.33043022359291;
				$pregunta3[4]=4.99614494988435;
				$pregunta4[1]=0.809560524286816;
				$pregunta4[2]=0;								
				$pregunta5[1]=0.809560524286816;
				$pregunta5[2]=0;								
				$pregunta6[1]=0.809560524286816;
				$pregunta6[2]=0;								
				$pregunta7[1]=0.809560524286816;
				$pregunta7[2]=0;								
				$pregunta8[1]=0.809560524286816;
				$pregunta8[2]=0;								
				$pregunta9[1]=0.809560524286816;
				$pregunta9[2]=0;								
				$pregunta10[1]=0;
				$pregunta10[2]=15.4047802621434;
				$pregunta10[3]=0;
				$pregunta10[4]=0;
				$pregunta11[1]=0;
				$pregunta11[2]=21.3723978411719;								
				$pregunta12[1]=0;
				$pregunta12[2]=4.35427910562837;								
				$pregunta13[1]=0;
				$pregunta13[2]=4.35427910562837;								
				$pregunta14[1]=0;
				$pregunta14[2]=4.35427910562837;								
				$pregunta15[1]=0;
				$pregunta15[2]=4.35427910562837;								
				$pregunta16[1]=5.48188126445644;
				$pregunta16[2]=3.65422205088666;								
				$pregunta16[3]=1.82711102544333;
				$pregunta16[4]=0;
				$pregunta17[1]=0.5;
				$pregunta17[2]=0;
				$pregunta18[1]=0.5;
				$pregunta18[2]=0;
				$pregunta19[1]=20.4703161141095;
				$pregunta19[2]=13.6455127216654;
				$pregunta19[3]=6.82275636083269;
				$pregunta19[4]=0;
				$pregunta20[1]=0.5;
				$pregunta20[2]=0;
				$pregunta21[1]=0.5;
				$pregunta21[2]=0;									
								
				if ($_POST["pregunta0"]==1){
					$pregunta3[1]=0;
					$pregunta3[2]=1.11790062111801;
					$pregunta3[3]=2.23580124223602;
					$pregunta3[4]=3.35403726708074;
					$pregunta4[1]=0.543478260869565;
					$pregunta4[2]=0;								
					$pregunta5[1]=0.543478260869565;
					$pregunta5[2]=0;								
					$pregunta6[1]=0.543478260869565;
					$pregunta6[2]=0;								
					$pregunta7[1]=0.543478260869565;
					$pregunta7[2]=0;								
					$pregunta8[1]=0.543478260869565;
					$pregunta8[2]=0;								
					$pregunta9[1]=0.543478260869565;
					$pregunta9[2]=0;								
					$pregunta10[1]=0;
					$pregunta10[2]=10.3416149068323;
					$pregunta10[3]=0;
					$pregunta10[4]=0;
					$pregunta11[1]=0;
					$pregunta11[2]=14.3478260869565;								
					$pregunta12[1]=0;
					$pregunta12[2]=2.92313664596273;								
					$pregunta13[1]=0;
					$pregunta13[2]=2.92313664596273;								
					$pregunta14[1]=0;
					$pregunta14[2]=2.92313664596273;								
					$pregunta15[1]=0;
					$pregunta15[2]=2.92313664596273;								
					$pregunta16[1]=3.68012422360248;
					$pregunta16[2]=2.45317080745342;								
					$pregunta16[3]=1.22658540372671;
					$pregunta16[4]=0;				
					$pregunta19[1]=13.7422360248447;
					$pregunta19[2]=9.16057453416149;
					$pregunta19[3]=4.58028726708074;
					$pregunta19[4]=0;
					$pregunta22[1]=0;
					$pregunta22[2]=6.00871583850931;
					$pregunta22[3]=12.0174316770186;
					$pregunta22[4]=18.027950310559;
					$pregunta23[1]=0;
					$pregunta23[2]=1.92527329192547;
					$pregunta23[3]=3.85054658385093;
					$pregunta23[4]=5.77639751552795;
					$pregunta24[1]=0;
					$pregunta24[2]=1.92527329192547;
					$pregunta24[3]=3.85054658385093;
					$pregunta24[4]=5.77639751552795;				
				}
				$suma = 0;
				
				if ($_POST["pregunta2"]!="null")
						$suma = $suma + $pregunta2[$_POST["pregunta2"]];
				if ($_POST["pregunta3"]!="null")
						$suma = $suma + $pregunta3[$_POST["pregunta3"]];
				if ($_POST["pregunta4"]!="null")
						$suma = $suma + $pregunta4[$_POST["pregunta4"]];
				if ($_POST["pregunta5"]!="null")
						$suma = $suma + $pregunta5[$_POST["pregunta5"]];
				if ($_POST["pregunta6"]!="null")
						$suma = $suma + $pregunta6[$_POST["pregunta6"]];
				if ($_POST["pregunta7"]!="null")
						$suma = $suma + $pregunta7[$_POST["pregunta7"]];
				if ($_POST["pregunta8"]!="null")
						$suma = $suma + $pregunta8[$_POST["pregunta8"]];
				if ($_POST["pregunta9"]!="null")
						$suma = $suma + $pregunta9[$_POST["pregunta9"]];
				if ($_POST["pregunta10"]!="null")
						$suma = $suma + $pregunta10[$_POST["pregunta10"]];
				if ($_POST["pregunta11"]!="null")
						$suma = $suma + $pregunta11[$_POST["pregunta11"]];
				if ($_POST["pregunta12"]!="null")
						$suma = $suma + $pregunta12[$_POST["pregunta12"]];
				if ($_POST["pregunta13"]!="null")
						$suma = $suma + $pregunta13[$_POST["pregunta13"]];
				if ($_POST["pregunta14"]!="null")
						$suma = $suma + $pregunta14[$_POST["pregunta14"]];
				if ($_POST["pregunta15"]!="null")
						$suma = $suma + $pregunta15[$_POST["pregunta15"]];
				if ($_POST["pregunta16"]!="null")
						$suma = $suma + $pregunta16[$_POST["pregunta16"]];
				if ($_POST["pregunta17"]!="null")
						$suma = $suma + $pregunta17[$_POST["pregunta17"]];
				if ($_POST["pregunta18"]!="null")
						$suma = $suma + $pregunta18[$_POST["pregunta18"]];
				if ($_POST["pregunta19"]!="null")
						$suma = $suma + $pregunta19[$_POST["pregunta19"]];
				if ($_POST["pregunta20"]!="null")
						$suma = $suma + $pregunta20[$_POST["pregunta20"]];
				if ($_POST["pregunta21"]!="null")
						$suma = $suma + $pregunta21[$_POST["pregunta21"]];
				if ($_POST["pregunta22"]!="null")
						$suma = $suma + $pregunta22[$_POST["pregunta22"]];
				if ($_POST["pregunta23"]!="null")
						$suma = $suma + $pregunta23[$_POST["pregunta23"]];
				if ($_POST["pregunta24"]!="null")
						$suma = $suma + $pregunta24[$_POST["pregunta24"]];
				$resultado = "4";
				if ($suma<=100 and $suma>=93)
					$resultado = "10";
				if ($suma<=92 and $suma>=85)
					$resultado = "9.5";
				if ($suma<=84 and $suma>=76)
					$resultado = "9";
				if ($suma<=75 and $suma>=68)
					$resultado = "8.5";
				if ($suma<=67 and $suma>=60)
					$resultado = "8";	
				if ($suma<=59 and $suma>=51)
					$resultado = "7.5";
				if ($suma<=50 and $suma>=43)
					$resultado = "7";
				if ($suma<=42 and $suma>=35)
					$resultado = "6.5";
				if ($suma<=34 and $suma>=26)
					$resultado = "6";
				if ($suma<=25 and $suma>=18)
					$resultado = "5.5";
				if ($suma<=17 and $suma>=10)
					$resultado = "5";
				if ($suma<=9 and $suma>=1)
					$resultado = "4.5";
				if ($suma==0)
					$resultado = "4";									
			?>
			
			<div class="valores">
				<div class="fondo_calificacion">			
					<div class="calificacion" id="calificacion">
						<h3 class="tit">Score</h3>
						<div id="resultado"><?php echo $resultado; if ($resultado==4){ echo"<br/><span>OR LESS</span>";} ?></div>
					</div>
					<div id="mensaje" class="mensaje">
						<div style="display:<?php if (in_array($resultado, array("10","9.5","9"))){ echo 'block'; }else{ echo 'none';}?>">
						<span>Congratulations! You lead a very healthy lifestyle!</span> Continue doing so and be sure to share all your tips and secrets with friends and family 
						</div>
						<div style="display:<?php if (in_array($resultado, array("8.5","8","7.5"))){ echo 'block'; }else{ echo 'none';}?>">
						<span>Your overall health is good,</span> yet there are several areas of improvement. If you take into account your recommendations and start leading a healthier lifestyle you’ll soon be getting a nine.
						</div>
						<div style="display:<?php if (in_array($resultado, array("7","6.5","6"))){ echo 'block'; }else{ echo 'none';}?>">
						<span>Your overall health is not very good.</span> You need to start changing your eating and exercising habits because your not heading in the right direction. Ask your doctor for advice on how to become a healthier person.
						</div>
						<div style="display:<?php if (in_array($resultado, array("5.5","5","4.5","4"))){ echo 'block'; }else{ echo 'none';}?>">
						<span>You need to drastically change your eating and exercising habits. </span>Ask your doctor for advice on how to begin making these changes without further compromising your health.
						</div>					
					</div>
				</div>
				<div class="mejora">
                    <div class="contenedor_btn_fb"></div>
                    <?php 
                        $href = "http://univision.data4.mx/ws/share.php?pts=".$suma;							                                        
                    ?>
                    <script>
    						var href = 'https://www.facebook.com/dialog/feed?app_id=121515388058397&name=This%20is%20my%20Wellness%20Score.%20Take%20your%20own%20Wellness%20Score%20and%20discover%20how%20healthy%20is%20your%20lifestyle%20&picture=http://univision.data4.mx/ws/images/salud.png&display=popup&caption=¿What%20is%20your%20Wellness%20Score%20Number%3f&link='+escape('<?php echo $href; ?>')+'&redirect_uri='+escape('<?php echo $href; ?>');						
    						var html = '<a href="'+href+'" target="_blank"><div class="share-on-facebook">Share my score &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span>Facebook</span></div></a>';
    						$(".contenedor_btn_fb").html(html);
    			    </script>
					<div class="tit">Suggestions for Improvement</div>
					<div class="titulo web">
						Click the buttons for tips on how to improve your number. To close de window click on it again.
					</div>
					<div class="titulo_movil">
						Click the buttons for tips on how to improve your number.
					</div>
                    <div id="ver_todos" class="boton2">Show all tips</div>
                    <div id="instruccion_tip"></div>
					<div class="tips">
						<div id="tip_pregunta3" class="tip <?php if (in_array($_POST["pregunta3"], array(1,2))) {echo 'sprite-ejercicio_active tip_activo'; }else{ echo 'sprite-ejercicio_inactive';} ?>"></div>
						<div id="tip_pregunta4" class="tip <?php if ($_POST["pregunta4"]==2) {echo 'sprite-chatarra_active tip_activo'; }else{ echo 'sprite-chatarra_inactive';} ?>"></div>
						<div id="tip_pregunta5" class="tip <?php if ($_POST["pregunta5"]==2) {echo 'sprite-grasas_active tip_activo'; }else{ echo 'sprite-grasas_inactive';} ?>"></div>
						<div id="tip_pregunta6" class="tip <?php if ($_POST["pregunta6"]==2) {echo 'sprite-fibra_active tip_activo'; }else{ echo 'sprite-fibra_inactive';} ?>"></div>
						<div id="tip_pregunta7" class="tip <?php if ($_POST["pregunta7"]==2) {echo 'sprite-frutas-verduras_active tip_activo'; }else{ echo 'sprite-frutas-verduras_inactive';}?>"></div>
						<div id="tip_pregunta8" class="tip <?php if ($_POST["pregunta8"]==2) {echo 'sprite-agua_active tip_activo'; }else{ echo 'sprite-agua_inactive';}?>"></div>
						<div id="tip_pregunta9" class="tip <?php if ($_POST["pregunta9"]==2) {echo 'sprite-sal_active tip_activo'; }else{ echo 'sprite-sal_inactive';}?>"></div>
						<div id="tip_pregunta22" class="tip <?php if (in_array($_POST["pregunta22"], array(1,2))) {echo 'sprite-colesterol_active tip_activo'; }else{ echo 'sprite-colesterol_inactive';} ?>"></div>						
						<div id="tip_pregunta23_24" class="tip <?php if (in_array(1, array($_POST["pregunta23"],$_POST["pregunta34"])) || in_array(2, array($_POST["pregunta23"],$_POST["pregunta34"]))) {echo 'sprite-presion-sanguinea_active tip_activo';}else{ echo 'sprite-presion-sanguinea_inactive';} ?>"></div>						
						<div id="tip_pregunta10" class="tip <?php if (in_array($_POST["pregunta10"], array(1,3,4))) {echo 'sprite-imc_active tip_activo'; }else{ echo 'sprite-imc_inactive';} ?>" ></div>
						<div id="tip_pregunta11" class="tip <?php if ($_POST["pregunta11"]==1) {echo 'sprite-diabetes_active tip_activo'; }else{ echo 'sprite-diabetes_inactive';}?>"></div>
						<div id="tip_estres" class="tip <?php if (in_array(1, array($_POST["pregunta12"],$_POST["pregunta13"],$_POST["pregunta14"],$_POST["pregunta15"]))) {echo 'sprite-estres_active tip_activo'; }else{ echo 'sprite-estres_inactive';}?>"></div>
						<div id="tip_pregunta16" class="tip <?php if (in_array($_POST["pregunta16"], array(3,4))) {echo 'sprite-alcohol_active tip_activo'; }else{ echo 'sprite-alcohol_inactive';} ?>"></div>
						<div id="tip_pregunta17" class="tip <?php if ($_POST["pregunta17"]==2) {echo 'sprite-dormir_active tip_activo'; }else{ echo 'sprite-dormir_inactive';}?>"></div>
						<div id="tip_pregunta18" class="tip <?php if ($_POST["pregunta18"]==2) {echo 'sprite-enfermo_active tip_activo'; }else{ echo 'sprite-enfermo_inactive';}?>"></div>
						<div id="tip_pregunta19" class="tip <?php if (in_array($_POST["pregunta19"], array(3,4))) {echo 'sprite-tabaco_active tip_activo'; }else{ echo 'sprite-tabaco_inactive';} ?>"></div>
						<div id="tip_pregunta20" class="tip <?php if ($_POST["pregunta20"]==2) {echo 'sprite-desayuno_active tip_activo'; }else{ echo 'sprite-desayuno_inactive';} ?>"></div>
						<div id="tip_pregunta21" class="tip <?php if ($_POST["pregunta21"]==2) {echo 'sprite-proteccion-solar_active tip_activo'; }else{ echo 'sprite-proteccion-solar_inactive';} ?>"></div>
					</div>				
					<div id="mensaje_tip">
					</div>
					
				</div>
        		<script>
                function crearTooltips(){
                    var link_ejercicio = "http://noticias.univision.com/article/1922486/2014-04-16/la-salud-empieza-aqui/physical-activity-exercise-whats-your-number-dr-juan";
                    var link_chatarra = "http://noticias.univision.com/article/1922492/2014-04-16/la-salud-empieza-aqui/eating-junk-food-unhealthy-snacks-whats-your-number-dr-juan";
                    var link_grasas = "http://noticias.univision.com/article/1922494/2014-04-16/la-salud-empieza-aqui/low-fat-diet-whats-your-number-dr-juan";
                    var link_fibra = "http://noticias.univision.com/article/1922504/2014-04-16/la-salud-empieza-aqui/fiber-intake-multigrain-foods-whats-your-number-dr-juan";
                    var link_frutas = "http://noticias.univision.com/article/1922505/2014-04-16/la-salud-empieza-aqui/fruits-vegetables-nutrient-whats-your-number-dr-juan";
                    var link_agua = "http://noticias.univision.com/article/1922520/2014-04-16/la-salud-empieza-aqui/water-cups-drink-whats-your-number-dr-juan";
                    var link_sal ="http://noticias.univision.com/article/1922507/2014-04-16/la-salud-empieza-aqui/low-salt-diet-whats-your-number-dr-juan";
                    var link_colesterol = "http://noticias.univision.com/article/1922526/2014-04-16/la-salud-empieza-aqui/heart-attack-colesterol-whats-your-number-dr-juan";
                    var link_presion = "http://noticias.univision.com/article/1922529/2014-04-16/la-salud-empieza-aqui/blood-pressure-high-low-whats-your-number-dr-juan";
                    var link_imc = "http://noticias.univision.com/article/1922546/2014-04-16/la-salud-empieza-aqui/body-mass-index-whats-your-number-dr-juan";
                    var link_diabetes ="http://noticias.univision.com/article/1922552/2014-04-16/la-salud-empieza-aqui/diabetes-insulin-whats-your-number-dr-juan";
                    var link_estres="http://noticias.univision.com/article/1922558/2014-04-16/la-salud-empieza-aqui/stress-anxiety-irritation-whats-your-number-dr-juan";
                    var link_dormir="http://noticias.univision.com/article/1922565/2014-04-16/la-salud-empieza-aqui/sleeping-hours-whats-your-number-dr-juan";
                    var link_alcohol="http://noticias.univision.com/article/1922562/2014-04-16/la-salud-empieza-aqui/alcoholic-beverages-drinking-cirrhosis-whats-your-number-dr-juan";
                    var link_enfermo="http://noticias.univision.com/article/1922566/2014-04-16/la-salud-empieza-aqui/sick-days-health-whats-your-number-dr-juan";
                    var link_tabaco="http://noticias.univision.com/article/1922570/2014-04-16/la-salud-empieza-aqui/tobacco-smoking-lung-cancer-whats-your-number-dr-juan";
                    var link_desayuno="http://noticias.univision.com/article/1922572/2014-04-16/la-salud-empieza-aqui/breakfast-food-diet-nutrition-whats-your-number-dr-juan";
                    var link_proteccion_solar ="http://noticias.univision.com/article/1922573/2014-04-16/la-salud-empieza-aqui/sunscreen-whats-your-number-dr-juan";
					$(".sprite-ejercicio_active").simpletip({content: "<p class='p_tips'> Each week do at least:</p><ul class='l_tips'><li>180 mins. of moderate aerobic activity</li><li>Or 75 mins. intense aerobic activity</li><li>Or a combination of both</li><li>If you double the exercise, you will benefit much more. </li><li>The American Heart Association recommends giving 10,000 steps every day.</li></ul><a href='"+link_ejercicio+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["0px","-15px"], persistent:true});		
					$(".sprite-chatarra_active").simpletip({content: "<p class='p_tips'>It’s healthy to snack between meals as long as it’s in a planned manner and includes healthy food</p><ul class='l_tips'><li>You should have breakfast every morning </li><li>Eat small portion meals 5 times a day</li><li>Choose healthy carbohydrates instead of unhealthy ones</li><li>Also, avoid junk food.</li></ul><a href='"+link_chatarra+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["0px","-15px"], persistent:true});		
					$(".sprite-grasas_active").simpletip({content: "<p class='p_tips'></p><ul class='l_tips'><li>Avoid saturated and trans fats</li><li>Add mono- and poly-unsaturated fats</li><li>Choose more avocado, nuts, seeds and fish and less dairy, butter and fried food</li><li>Foods that possess Omega 3 help lower triglycerides and blood pressure.</li></ul><a href='"+link_grasas+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["0px","-15px"], persistent:true});		
					$(".sprite-fibra_active").simpletip({content: "<p class='p_tips'>Fiber helps to keep a good intestinal flow and a normal BMI </p><ul class='l_tips'><li>It also plays an important role in the prevention of colon cancer</li><li>You should intake 25 to 30 grams of fiber every day</li><li>You can find high fiber content in: seeds, grains, legumes, berries, fruits and vegetables.</li></ul><a href='"+link_fibra+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["-280px","-15px"], persistent:true});		
					$(".sprite-frutas-verduras_active").simpletip({content: "<p class='p_tips'></p><ul class='l_tips'><li>Fruits and vegetables are essential for staying healthy</li><li>Their calorie count is low and they are high in nutrients, they are full of vitamins, minerals, antioxidants and fiber </li><li>Make sure you eat 5 fruits or vegetables every day</li><li>If you eat 5 times every day, you can reach and even exceed this goal easily by including just 1 fruit or vegetable each time. </li></ul><a href='"+link_frutas+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["-280px","-15px"], persistent:true});		
					$(".sprite-agua_active").simpletip({content: "<p class='p_tips'></p><ul class='l_tips'><li>Water intake helps us eliminate toxins and stay hydrated</li><li>Dehydration many times is confused with hunger</li><li>Drink 8 glasses of water every day </li><li>You must drink them throughout the day, not at once, for it to have a positive effect</li><li>Create habits to make it easier, like keeping a glass at your desk, seeing it will remind you of your goal.</li></ul><a href='"+link_agua+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["-280px","-15px"], persistent:true});		
					$(".sprite-sal_active").simpletip({content: "<p class='p_tips'></p><ul class='l_tips'><li>A high sodium/salt diet can cause high blood pressure and lead to several health problems </li><li>Keep your daily sodium consumption between 1.5 and 2.3 grams</li><li>This equals a teaspoon of salt. </li><li>Keep in mind that processed foods usually have high levels of “hidden” salt.</li></ul><a href='"+link_sal+"' target='_blank' class='link_tips'>See more</a>", fixed: false, position:["0px","0px"], persistent:true});		
					$(".sprite-colesterol_active").simpletip({content: "<p class='p_tips'></p><ul class='l_tips'><li>Keep your total cholesterol below 200mg/dL</li><li>Also, LDL and triglycerides below 100 mg/dL</li><li>Also, your HDL (good cholesterol) shouldn’t be too low</li><li>Reduce your saturated and trans fats intake</li><li>Replace them with mono- and polyunsaturated fats</li><li>Increase your intake of fruits, vegetables, fiber and Omega 3.</li></ul><a href='"+link_colesterol+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["0px","-15px"], persistent:true});		
					$(".sprite-presion-sanguinea_active").simpletip({content: "<p class='p_tips'></p><ul class='l_tips'><li>High blood pressure (bp) puts you at risk of having a stroke</li><li>Although it varies by age and gender, a systolic bp below 120mmHg and a diastolic bp below 80 mmHg are recommended</li><li>Keep a balanced, low sodium/salt diet</li><li>Reduce your stress and stay away from tobacco</li><li>Reduce your alcohol consumption</li></ul><a href='"+link_presion+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["0px","-15px"], persistent:true});		
					$(".sprite-imc_active").simpletip({content: "<p class='p_tips'> If your BMI = Overweight (>24)<br>Choose healthy options like:</p><ul class='l_tips'><li>Replace saturated and trans fats for unsaturated ones</li><li>Replace white rice and flours with whole-wheat alternatives</li><li>Eat more fruits and vegetables</li><li>Drink 8 glasses of water and exercise every day.</li></ul><a href='"+link_imc+"' target='_blank' class='link_tips'>See more</a><br><p class='p_tips'>If your BMI = Underweight (<18.5)</p><ul class='l_tips'><li>Increase your daily calorie intake in a balanced manner</li><li>Include fruits and vegetables in your diet</li><li>Add healthy fats and carbohydrates</li><li>Eat moderate portions of food, 5 times each day and exercise.</li></ul><a href='"+link_imc+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["-280px","-15px"], persistent:true});		
					$(".sprite-diabetes_active").simpletip({content: "<p class='p_tips'></p><ul class='l_tips'><li>If you are diabetic then you must learn to live day to day with it</li><li>You should avoid foods that are high in calories, trans and saturated fats, sugar and salt. </li><li>Instead, choose food like multigrains, whole wheat, fruits and vegetables</li><li>Drink water instead of juice and sodas</li><li>Exercise and stay away from stress</li><li>Eat moderate portions of food, 5 times each day to avoid blood sugar spikes and lows.</li></ul><a href='"+link_diabetes+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["-280px","-15px"], persistent:true});		
					$(".sprite-estres_active").simpletip({content: "<p class='p_tips'>To keep you stress levels low, you must learn to manage your time<br>Some techniques and practices that might help are:</p><ul class='l_tips'><li>Avoid multi-tasking, write to-do lists</li><li>Make a pause in your day to relax</li><li>Sleep well, exercise, keep a healthy diet</li><li>Always save some time in your week for yourself and friends.</li></ul><a href='"+link_estres+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["-280px","-15px"], persistent:true});		
					$(".sprite-alcohol_active").simpletip({content: "<p class='p_tips'></p><ul class='l_tips'><li>A high consumption of alcohol increases your risk of cancer, cirrhosis and other diseases</li><li>Reduce your alcohol consumption and increase your water intake.</li><li>Women should not have more than 1 drink per day and men not more than 2 drinks per day.</li></ul><a href='"+link_alcohol+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["0px","-15px"], persistent:true});		
					$(".sprite-dormir_active").simpletip({content: "<p class='p_tips'></p><ul class='l_tips'><li>Few hours of sleep increases your risk of traffic accidents, a high BMI, diabetes, heart problems and depression</li><li>It also reduces your ability to focus, your memory and your learning skills</li><li>If you are 20 or older, you should sleep 7 to 9 hours per day</li><li>If you are younger than 20 sleep 8 to 9 hours every day.</li></ul><a href='"+link_dormir+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["0px","-15px"], persistent:true});		
					$(".sprite-enfermo_active").simpletip({content: "<p class='p_tips'></p><ul class='l_tips'><li>More than 5 consecutive sick days per year could be the result of bad health decisions</li><li>You should try to keep a balanced diet and exercise</li><li>Eat 5 portions of fruits and vegetables daily, keep a low level of stress</li><li>Stay hydrated and get enough sleep to stay healthy.</li></ul><a href='"+link_enfermo+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["0px","-15px"], persistent:true});		
					$(".sprite-tabaco_active").simpletip({content: "<p class='p_tips'></p><ul class='l_tips'><li>Tobacco is harmful in all its forms; there is not a safe use of it</li><li>Smoking is the greatest cause of preventable death in our society </li><li>There are many treatments and support groups that can help you quit smoking</li><li>Ask your doctor which is the most adequate method for you</li><li>If you are a passive smoker, ask your friends to quit smoking or avoid being in closed environments with them. </li></ul><a href='"+link_tabaco+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["-280px","-15px"], persistent:true});		
					$(".sprite-desayuno_active").simpletip({content: "<p class='p_tips'></p><ul class='l_tips'><li>Breakfast is the most important meal of the day</li><li>It’s essential to have breakfast every day to keep a normal BMI</li><li>Include in your breakfast all the components of a healthy diet: good carbs, good fats and protein</li><li>This will improve your eating habits and enhance your exercise performance</li><li>Also this speeds up your metabolism and improves your well-being.</li></ul><a href='"+link_desayuno+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["-280px","-15px"], persistent:true});		
					$(".sprite-proteccion-solar_active").simpletip({content: "<p class='p_tips'></p><ul class='l_tips'><li>Everybody needs to use sunscreen every single day</li><li>You should use protection against UVA and UVB rays with an SPF 15 or higher</li><li>In the water or if you sweat too much, use a water resistant product with SPF 30 or higher</li><li>Apply it 30 mins. before getting in the sun, and reapply every 2 hrs if you are sweating or in contact with water</li><li>Stay in the shade when possible and wear clothes that cover you, even sunglasses.</li></ul><a href='"+link_proteccion_solar+"' target='_blank' class='link_tips'>See more</a>", fixed: true, position:["-280px","-15px"], persistent:true});		
                }
                crearTooltips();
                $("#ver_todos").on("click", function(){
                    if (!$(this).hasClass("clicked")){
                            $(".tip_activo").map(function(){
                                $(this).addClass("miTip");
                            })
                            $("#tip_pregunta3").removeClass("sprite-ejercicio_inactive").addClass("tip sprite-ejercicio_active tip_activo");
						    $("#tip_pregunta4").removeClass("sprite-chatarra_inactive").addClass("tip sprite-chatarra_active tip_activo");
						    $("#tip_pregunta5").removeClass("sprite-grasas_inactive").addClass("tip sprite-grasas_active tip_activo");
						    $("#tip_pregunta6").removeClass("sprite-fibra_inactive").addClass("tip sprite-fibra_active tip_activo");
						    $("#tip_pregunta7").removeClass("sprite-frutas-verduras_inactive").addClass("tip sprite-frutas-verduras_active tip_activo");
						    $("#tip_pregunta8").removeClass("sprite-agua_inactive").addClass("tip sprite-agua_active tip_activo");
						    $("#tip_pregunta9").removeClass("sprite-sal_inactive").addClass("tip sprite-sal_active tip_activo");
						    $("#tip_pregunta22").removeClass("sprite-colesterol_inactive").addClass("tip sprite-colesterol_active tip_activo");
						    $("#tip_pregunta23_24").removeClass("sprite-presion-sanguinea_inactive").addClass("tip sprite-presion-sanguinea_active tip_activo");
						    $("#tip_pregunta10").removeClass("sprite-imc_inactive").addClass("tip sprite-imc_active tip_activo");
						    $("#tip_pregunta11").removeClass("sprite-diabetes_inactive").addClass("tip sprite-diabetes_active tip_activo");
						    $("#tip_estres").removeClass("sprite-estres_inactive").addClass("tip sprite-estres_active tip_activo");
						    $("#tip_pregunta16").removeClass("sprite-alcohol_inactive").addClass("tip sprite-alcohol_active tip_activo");
						    $("#tip_pregunta17").removeClass("sprite-dormir_inactive").addClass("tip sprite-dormir_active tip_activo");
						    $("#tip_pregunta18").removeClass("sprite-enfermo_inactive").addClass("tip sprite-enfermo_active tip_activo");
						    $("#tip_pregunta19").removeClass("sprite-tabaco_inactive").addClass("tip sprite-tabaco_active tip_activo");
						    $("#tip_pregunta20").removeClass("sprite-desayuno_inactive").addClass("tip sprite-desayuno_active tip_activo");
						    $("#tip_pregunta21").removeClass("sprite-proteccion-solar_inactive").addClass("tip sprite-proteccion-solar_active tip_activo");   
                            crearTooltips();
                            var ancho_p = $(window).width();	
	                        if (ancho_p<=400){
		                        $(".tip_activo").on("click", function(){						
			                        $("#mensaje_tip").html("<div class='contenido_mensaje'>"+$(this).find(".tooltip").html()+"<a id='cerrar'>CLOSE</a></div>");
			                        scrollToAnchor('#mensaje_tip');
			                        $("#cerrar").on("click", function(){
				                        $("#mensaje_tip").html("");
				                        scrollToAnchor('.mejora');
			                        });			
		                        })	
	                        }
                            $("#instruccion_tip").html("Those related to your Wellness Score have a blue border.");
                            $(this).addClass("clicked");
                        }
                });
				</script>

				<?php 
				
					// Function to get the client ip address
					function get_client_ip() {
						$ipaddress = '';
						if ($_SERVER['HTTP_CLIENT_IP'])
							$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
						else if($_SERVER['HTTP_X_FORWARDED_FOR'])
							$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
						else if($_SERVER['HTTP_X_FORWARDED'])
							$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
						else if($_SERVER['HTTP_FORWARDED_FOR'])
							$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
						else if($_SERVER['HTTP_FORWARDED'])
							$ipaddress = $_SERVER['HTTP_FORWARDED'];
						else if($_SERVER['REMOTE_ADDR'])
							$ipaddress = $_SERVER['REMOTE_ADDR'];
						else
							$ipaddress = 'UNKNOWN';
					 
						return $ipaddress;
					}
					
					$hoy = getdate();
					$fecha = $hoy["mday"]."-".$hoy["mon"]."-".$hoy["year"];
					$hora = $hoy["hours"].":".$hoy["minutes"].":".$hoy["seconds"];
				
					$conexion = mysql_connect('mysql51-030.wc1:3306', '721651_bmi_user', 'Us3r_bm1');											
					$db_selected = mysql_select_db('721651_bmi', $conexion);
					mysql_set_charset('utf8');
					//$conexion = mysql_connect('localhost', 'root', '');
					//$db_selected = mysql_select_db('bmi', $conexion);
					if (!$conexion) {
						die('Could not connect: ' . mysql_error());
					}
					
					if (!mysql_query("insert into ws values (id,'".$_POST["facebook_id"]."','".$_POST["location"]."',".$_POST["pregunta0"].",".$_POST["pregunta1"].",".$_POST["pregunta2"]."
						,".$_POST["pregunta3"].",".$_POST["pregunta4"].",".$_POST["pregunta5"].",".$_POST["pregunta6"].",".$_POST["pregunta7"].",".$_POST["pregunta8"]."
						,".$_POST["pregunta9"].",".$_POST["pregunta10"].",".$_POST["pregunta11"].",".$_POST["pregunta12"].",".$_POST["pregunta13"].",".$_POST["pregunta14"]."
						,".$_POST["pregunta15"].",".$_POST["pregunta16"].",".$_POST["pregunta17"].",".$_POST["pregunta18"].",".$_POST["pregunta19"].",".$_POST["pregunta20"]."
						,".$_POST["pregunta21"].",".$_POST["pregunta22"].",".$_POST["pregunta23"].",".$_POST["pregunta24"].",'".$resultado."','".$_POST["google_id"]."','".$_POST["google_name"]."', '".get_client_ip()."','".$fecha."','".$hora."','".$_POST["codigo_postal"]."','".$_POST["pais"]."')")){
							die('Error: ' . mysql_error($conexion));
						}							
					$total = 0;
					$Amas = 0;
					$A = 0;
					$Amenos = 0;
					$Bmas = 0;
					$B = 0;
					$Bmenos = 0;
					$Cmas = 0;
					$C = 0;
					$Cmenos = 0;
					$Dmas = 0;
					$D = 0;
					$Dmenos = 0;
					$F = 0;
					$result = mysql_query("SELECT * FROM ws");
					if($result){						
						while ($registro = mysql_fetch_array($result, MYSQL_NUM)) {													
							$total = $total + 1;
							if ($registro[28]=="10"){ $Amas = $Amas + 1;}
							if ($registro[28]=="9.5"){ $A = $A + 1;}
							if ($registro[28]=="9"){ $Amenos = $Amenos + 1;}
							if ($registro[28]=="8.5"){ $Bmas = $Bmas + 1;}
							if ($registro[28]=="8"){ $B = $B + 1;}
							if ($registro[28]=="7.5"){ $Bmenos = $Bmenos + 1;}
							if ($registro[28]=="7"){ $Cmas = $Cmas + 1;}
							if ($registro[28]=="6.5"){ $C = $C + 1;}
							if ($registro[28]=="6"){ $Cmenos = $Cmenos + 1;}
							if ($registro[28]=="5.5"){ $Dmas = $Dmas + 1;}
							if ($registro[28]=="5"){ $D = $D + 1;}
							if ($registro[28]=="4.5"){ $Dmenos = $Dmenos + 1;}							
							if ($registro[28]=="4"){ $F = $F + 1;}							
						}						
					}
				?>						
			
				
		
				<div class="resultado_grafica resultado_en">
					<h1 class="tit">Compare your results</h1>
					<div id="resultados">
						<?php 
							$tamanio = $_POST["ancho"];							
						?>
						<div id="Amas" style="height:<?php 
							$alto = ($Amas * 100)/$total;
							echo $alto;							
						?>%;margin-top:<?php 
							$margen = $tamanio-($alto*$tamanio)/100;
							echo $margen;
						?>px; <?php if ($resultado == "10") echo "background-color:#FFFFFF !important; 
						background-image:none;
						-webkit-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						-moz-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;"?>"></div>
						<div id="A" style="height:<?php 
							$alto = ($A * 100)/$total;
							echo $alto;							
						?>%;margin-top:<?php 
							$margen = $tamanio-($alto*$tamanio)/100;
							echo $margen;
						?>px; <?php if ($resultado == "9.5") echo "background-color:#FFFFFF !important; 
						background-image:none;
						-webkit-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						-moz-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;"?>"></div>
						<div id="Amenos" style="height:<?php 
							$alto = ($Amenos * 100)/$total;
							echo $alto;							
						?>%;margin-top:<?php 
							$margen = $tamanio-($alto*$tamanio)/100;
							echo $margen;
						?>px; <?php if ($resultado == "9") echo "background-color:#FFFFFF !important; 
						background-image:none;
						-webkit-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						-moz-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;"?>"></div>						
						<div id="Bmas" style="height:<?php 
							$alto = ($Bmas * 100)/$total;
							echo $alto;							
						?>%;margin-top:<?php 
							$margen = $tamanio-($alto*$tamanio)/100;
							echo $margen;
						?>px; <?php if ($resultado == "8.5") echo "background-color:#FFFFFF !important; 
						background-image:none;
						-webkit-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						-moz-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;"?>"></div>						
						<div id="B" style="height:<?php 
							$alto = ($B * 100)/$total;
							echo $alto;							
						?>%;margin-top:<?php 
							$margen = $tamanio-($alto*$tamanio)/100;
							echo $margen;
						?>px; <?php if ($resultado == "8") echo "background-color:#FFFFFF !important; 
						background-image:none;
						-webkit-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						-moz-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;"?>"></div>						
						<div id="Bmenos" style="height:<?php 
							$alto = ($Bmenos * 100)/$total;
							echo $alto;							
						?>%;margin-top:<?php 
							$margen = $tamanio-($alto*$tamanio)/100;
							echo $margen;
						?>px; <?php if ($resultado == "7.5") echo "background-color:#FFFFFF !important; 
						background-image:none;
						-webkit-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						-moz-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;"?>"></div>						
						<div id="Cmas" style="height:<?php 
							$alto = ($Cmas * 100)/$total;
							echo $alto;							
						?>%;margin-top:<?php 
							$margen = $tamanio-($alto*$tamanio)/100;
							echo $margen;
						?>px;  <?php if ($resultado == "7") echo "background-color:#FFFFFF !important; 
						background-image:none;
						-webkit-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						-moz-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;"?>"></div>						
						<div id="C" style="height:<?php 
							$alto = ($C * 100)/$total;
							echo $alto;							
						?>%;margin-top:<?php 
							$margen = $tamanio-($alto*$tamanio)/100;
							echo $margen;
						?>px; <?php if ($resultado == "6.5") echo "background-color:#FFFFFF !important; 
						background-image:none;
						-webkit-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						-moz-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;"?>"></div>						
						<div id="Cmenos" style="height:<?php 
							$alto = ($Cmenos * 100)/$total;
							echo $alto;							
						?>%;margin-top:<?php 
							$margen = $tamanio-($alto*$tamanio)/100;
							echo $margen;
						?>px; <?php if ($resultado == "6") echo "background-color:#FFFFFF !important; 
						background-image:none;
						-webkit-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						-moz-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;"?>"></div>						
						<div id="Dmas" style="height:<?php 
							$alto = ($Dmas * 100)/$total;
							echo $alto;							
						?>%;margin-top:<?php 
							$margen = $tamanio-($alto*$tamanio)/100;
							echo $margen;
						?>px; <?php if ($resultado == "5.5") echo "background-color:#FFFFFF !important; 
						background-image:none;
						-webkit-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						-moz-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;"?>"></div>						
						<div id="D" style="height:<?php 
							$alto = ($D * 100)/$total;
							echo $alto;							
						?>%;margin-top:<?php 
							$margen = $tamanio-($alto*$tamanio)/100;
							echo $margen;
						?>px; <?php if ($resultado == "5") echo "background-color:#FFFFFF !important; 
						background-image:none;
						-webkit-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						-moz-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;"?>"></div>						
						<div id="Dmenos" style="height:<?php 
							$alto = ($Dmenos * 100)/$total;
							echo $alto;							
						?>%;margin-top:<?php 
							$margen = $tamanio-($alto*$tamanio)/100;
							echo $margen;
						?>px; <?php if ($resultado == "4.5") echo "background-color:#FFFFFF !important; 
						background-image:none;
						-webkit-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						-moz-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;"?>"></div>						
						<div id="F" style="height:<?php 
							$alto = ($F * 100)/$total;
							echo $alto;							
						?>%;margin-top:<?php 
							$margen = $tamanio-($alto*$tamanio)/100;
							echo $margen;
						?>px; <?php if ($resultado == "4") echo "background-color:#FFFFFF !important; 
						background-image:none;
						-webkit-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						-moz-box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;
						box-shadow: 0px 0px 15px rgba(255,255,255,50) !important;"?>"></div>												
					</div>
					<div class="calificaciones">
						<div class="rango_calificacion primero"><span>10-9</span> = Excellent</div>
						<div class="rango_calificacion"><span>8.5-7.5</span> = Doing Well</div>
						<div class="rango_calificacion"><span>7-6</span> = Needs Improvement</div>
						<div class="rango_calificacion"><span>5.5-4.5</span> = At Risk </div>
						<div class="rango_calificacion"><span>4 or less</span> = High Risk</div>
					</div>
				</div>			
				<?php if ($_POST["facebook_id"]!="null"){?>
				<script>							
				$f_Amas = new Array();
				$f_A = new Array();
				$f_Amenos = new Array();
				$f_Bmas = new Array();
				$f_B = new Array();
				$f_Bmenos = new Array();
				$f_Cmas = new Array();
				$f_C = new Array();
				$f_Cmenos = new Array();
				$f_Dmas = new Array();
				$f_D = new Array();
				$f_Dmenos = new Array();
				$f_F = new Array();
			<?php 
				mysql_data_seek($result, 0);
				while ($registro = mysql_fetch_array($result, MYSQL_NUM)) {											?>						
							<?php
					
							if ($registro[28]=="A+"){ 
								if ($registro[1]!="null"){
							?> 								
									$f_Amas[$f_Amas.length]=<?php echo "'".$registro[1]."'"; ?>;								
							<?php
								}
							}
							if ($registro[28]=="A"){ 
								if ($registro[1]!="null"){
							?> 								
									$f_A[$f_A.length]=<?php echo "'".$registro[1]."'"; ?>;								
							<?php 
								}
							}
							if ($registro[28]=="A-"){  
								if ($registro[1]!="null"){
							?> 										
									$f_Amenos[$f_Amenos.length]=<?php echo "'".$registro[1]."'"; ?>;								
							<?php 
								}
							}
							if ($registro[28]=="B+"){  
								if ($registro[1]!="null"){
							?>							
									$f_Bmas[$f_Bmas.length]=<?php echo "'".$registro[1]."'"; ?>;								
							<?php 
								}
							}
							if ($registro[28]=="B"){  
								if ($registro[1]!="null"){							
							?>								
									$f_B[$f_B.length]=<?php echo "'".$registro[1]."'"; ?>;								
							<?php 
								}
							}
							if ($registro[28]=="B-"){  
								if ($registro[1]!="null"){
							?>								
									$f_Bmenos[$f_Bmenos.length]=<?php echo "'".$registro[1]."'"; ?>;								
							<?php 
								}
							}
							if ($registro[28]=="C+"){  
								if ($registro[1]!="null"){
							?>								
									$f_Cmas[$f_Cmas.length]=<?php echo "'".$registro[1]."'"; ?>;								
							<?php 
								}
							}
							if ($registro[28]=="C"){  
								if ($registro[1]!="null"){
							?>								
									$f_C[$f_C.length]=<?php echo "'".$registro[1]."'"; ?>;
							<?php 
								}
							}
							if ($registro[28]=="C-"){  
								if ($registro[1]!="null"){
							?>								
									$f_Cmenos[$f_Cmenos.length]=<?php echo "'".$registro[1]."'"; ?>;								
							<?php 
								}
							}
							if ($registro[28]=="D+"){  
								if ($registro[1]!="null"){
							?>								
									$f_Dmas[$f_Dmas.length]=<?php echo "'".$registro[1]."'"; ?>;								
							<?php 
								}
							}
							if ($registro[28]=="D"){  
								if ($registro[1]!="null"){
							?>								
									$f_D[$f_D.length]=<?php echo "'".$registro[1]."'"; ?>;								
							<?php 
								}
							}
							if ($registro[28]=="D-"){  
								if ($registro[1]!="null"){
							?>								
									$f_Dmenos[$f_Dmenos.length]=<?php echo "'".$registro[1]."'"; ?>;								
							<?php 
								}
							}
							if ($registro[28]=="D"){  
								if ($registro[1]!="null"){
							?>								
									$f_D[$f_D.length]=<?php echo "'".$registro[1]."'"; ?>;								
							<?php 
								}
							}
							if ($registro[28]=="F"){  
								if ($registro[1]!="null"){
							?>								
									$f_F[$f_F.length]=<?php echo "'".$registro[1]."'"; ?>;						
							<?php 
								}
							}							
						}
						mysql_free_result($result);
			
			?>
				
				/*console.log($f_Amas);
				console.log($f_A)
				console.log($f_Amenos);
				console.log($f_Bmas);
				console.log($f_B);
				console.log($f_Bmenos);
				console.log($f_Cmas);
				console.log($f_C);
				console.log($f_Cmenos);
				console.log($f_Dmas);
				console.log($f_D);
				console.log($f_Dmenos);
				console.log($f_F);*/
				
				
				$("#resultados div").on("mouseover", function(){					
					$i = 0;
					$amigos = new Array();
					switch ($(this).attr("id")){
						case "Amas":
							for($i=0; $i <=$f_Amas.length; $i++){
								if (jQuery.inArray($f_Amas[$i], window.friends) != -1){
									$amigos[$amigos.length]=$f_Amas[$i];
								}
							}
							break;
						case "Amenos":
							for($i=0; $i <=$f_Amenos.length; $i++){
								if (jQuery.inArray($f_Amenos[$i], window.friends) != -1){
									$amigos[$amigos.length]=$f_Amenos[$i];
								}
							}
							break;	
						case "A":
							for($i=0; $i <=$f_A.length; $i++){
								if (jQuery.inArray($f_A[$i], window.friends) != -1){
									$amigos[$amigos.length]=$f_A[$i];
								}
							}
							break;	
						case "Bmas":
							for($i=0; $i <=$f_Bmas.length; $i++){
								if (jQuery.inArray($f_Bmas[$i], window.friends) != -1){
									$amigos[$amigos.length]=$f_Bmas[$i];
								}
							}
							break;		
						case "B":
							for($i=0; $i <=$f_B.length; $i++){
								if (jQuery.inArray($f_B[$i], window.friends) != -1){
									$amigos[$amigos.length]=$f_B[$i];
								}
							}
							break;	
						case "Bmenos":
							for($i=0; $i <=$f_Bmenos.length; $i++){
								if (jQuery.inArray($f_Bmenos[$i], window.friends) != -1){
									$amigos[$amigos.length]=$f_Bmenos[$i];
								}
							}
							break;	
							
						default:
							for($i=0; $i <=$f_F.length; $i++){
								if (jQuery.inArray($f_F[$i], window.friends) != -1){
									$amigos[$amigos.length]=$f_F[$i];
								}
							}
							break;						
					}					
					if ($amigos.length != 0){
						$content ="<p><span>Scores of your friends on <img src='images/facebook.png'></span>";
						for ($i=0; $i<$amigos.length; $i++){
							$content = $content + "<img src='https://graph.facebook.com/"+$amigos[$i]+"/picture'>";
						$content = $content + "</p>";
						$(this).simpletip({content: $content, fixed: true, position:["-145px","-100px"]});
					}else{
						$(this).simpletip({content: "<p>None of your friends on <img src='images/facebook.png'> has earned this score</p>", fixed: true, position:["-145px","-100px"]});
					}					
				});
				
				
				</script>
			<?php }
				mysql_close($conexion);
			} ?>
		</div>
		<form id="formulario" name="formulario" action="en_index.php#calificacion" method="post">		
			<input type="hidden" name="facebook_id" id="facebook_id" value="null">
			<input type="hidden" name="pregunta0" id="valor_pregunta0" value="null">
			<input type="hidden" name="pregunta1" id="valor_pregunta1" value="null">
			<input type="hidden" name="pregunta2" id="valor_pregunta2" value="null">
			<input type="hidden" name="pregunta3" id="valor_pregunta3" value="null">
			<input type="hidden" name="pregunta4" id="valor_pregunta4" value="null">
			<input type="hidden" name="pregunta5" id="valor_pregunta5" value="null">
			<input type="hidden" name="pregunta6" id="valor_pregunta6" value="null">
			<input type="hidden" name="pregunta7" id="valor_pregunta7" value="null">
			<input type="hidden" name="pregunta8" id="valor_pregunta8" value="null">
			<input type="hidden" name="pregunta9" id="valor_pregunta9" value="null">
			<input type="hidden" name="pregunta10" id="valor_pregunta10" value="null">
			<input type="hidden" name="pregunta11" id="valor_pregunta11" value="null">
			<input type="hidden" name="pregunta12" id="valor_pregunta12" value="null">
			<input type="hidden" name="pregunta13" id="valor_pregunta13" value="null">
			<input type="hidden" name="pregunta14" id="valor_pregunta14" value="null">
			<input type="hidden" name="pregunta15" id="valor_pregunta15" value="null">
			<input type="hidden" name="pregunta16" id="valor_pregunta16" value="null">
			<input type="hidden" name="pregunta17" id="valor_pregunta17" value="null">
			<input type="hidden" name="pregunta18" id="valor_pregunta18" value="null">			
			<input type="hidden" name="pregunta19" id="valor_pregunta19" value="null">			
			<input type="hidden" name="pregunta20" id="valor_pregunta20" value="null">			
			<input type="hidden" name="pregunta21" id="valor_pregunta21" value="null">			
			<input type="hidden" name="pregunta22" id="valor_pregunta22" value="null">			
			<input type="hidden" name="pregunta23" id="valor_pregunta23" value="null">			
			<input type="hidden" name="pregunta24" id="valor_pregunta24" value="null">	
			<input type="hidden" name="codigo_postal" id="codigo_postal" value="null">			
			<input type="hidden" name="pais" id="pais" value="null">					
			<input type="hidden" name="ancho" id="ancho" value="297">	
            <input type="hidden" name="location" id="location" value="null">		
            <input type="hidden" name="google_id" id="google_id" value="null">
            <input type="hidden" name="google_name" id="google_name" value="null">
            <input type="hidden" name="preguntax" id="preguntax" value="">
            <input type="hidden" name="preguntay" id="preguntay" value="">
		</form>
		<div class="footer">
			This quiz is intended for readers over 18 years of age only. This quiz is for information purposes only and is not intended to substitute for a consultation with a physician. 
			Please consult with your healthcare provider.
		</div>
        <div class="logos">
            <div class="logo_univision"></div>
            <div class="logo_contigo"></div>
        </div>

	</div>	
        <!-- Geolocation -->
    <script>
    function initialize() {
       geocoder = new google.maps.Geocoder();
      // Try HTML5 geolocation
      if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var latlng = new google.maps.LatLng(position.coords.latitude,
                                           position.coords.longitude);
          geocoder.geocode({'latLng': latlng}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              if (results[1]) {
                $("#location").val(results[1].formatted_address.replace(/\,/g," "));
                console.log(results[1]);   
              } else {
                console.log('No results found');
              }
            } else {
              console.log('Geocoder failed due to: ' + status);
            }
          });
        }, function() {
          handleNoGeolocation(true);
        });
      } else {
        // Browser doesn't support Geolocation
        handleNoGeolocation(false);
      }
    }

    function handleNoGeolocation(errorFlag) {
      if (errorFlag) {
        console.log('Error: The Geolocation service failed.');
      } else {
        console.log('Error: Your browser doesn\'t support geolocation.');
      }
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    </script>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-36920824-38', 'akorahq.com');
  ga('send', 'pageview');

</script>
</body>
</html>
