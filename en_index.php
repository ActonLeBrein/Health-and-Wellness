<?php 
//ini_set('error_reporting', E_ALL);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title></title>
		<link rel="stylesheet" type="text/css" href="../fonts/stylesheet.css" />
		<link rel="stylesheet" type="text/css" href="n_style.css" />
		<link rel="stylesheet" type="text/css" href="style_bryan_en.css" />
	    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
		<script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js'></script>	
		<!--script src="js/jquery.min1.11.1.js"></script-->	
		<script src="js/simpleFacebookGraph.js"></script>	
		<script src="js/n_fblogin.js"></script>	
		<script src="js/simpletip.js"></script>
		<script src="js/n_funcionalidad_extra.js"></script>		
		<script>
			function mostrar_portada(){					
					$("#portada").css({"display":"block"});
	                $("#preguntas").css({"display":"none"});
	                $("#logos").css({"display":"none"});                  
	                $("#tittle1").css({"display":"none"});                  
			}
			$(document).ready(function(){

				$("#btn_google").on("click", function(){		      		
		      		$(this).data("click","true");
	      		});

	      		$(".input_answer").on()

				var ancho = $(window).width();
				if(ancho<=320){
					$("#link_consulta").attr("href","http://m.www.univision.com/interactivos/openpage/2013-11-13/cual-es-tu-numero-de-masa-corporal-movil");
					$("#link_version").attr("href","http://m.www.univision.com/interactivos/openpage/2013-11-13/health-and-wellness-whats-your-number-mobile");
				}else{			
					$("#link_consulta").attr("href","http://www.univision.com/interactivos/openpage/2013-11-13/cual-es-tu-numero-de-indice-de-masa-corporal");
					$("#link_version").attr("href","http://www.univision.com/interactivos/openpage/2013-11-13/health-and-wellness-whats-your");
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
      	if ($("#btn_google").data("click")=="true"){
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
	                  $("#portada").css({"display":"none"});
	                  $("#preguntas").css({"display":"block"});
	                  $("#logos").css({"display":"block"});                  
	                  $("#tittle1").css({"display":"block"});                  
	                  mostrar("pregunta1");	                  
	                });
	            });

	          }     
	        }
	    }
	  };
      (function() {     	

	    var po = document.createElement('script');
	    po.type = 'text/javascript'; po.async = true;
	    po.src = 'https://apis.google.com/js/client:plusone.js?onload=render';
	    var s = document.getElementsByTagName('script')[0];
	    s.parentNode.insertBefore(po, s);
	  })();

      function render() {
	    gapi.signin.render('customBtn', {
	      'callback': 'loginFinished',
	      'clientid': '847964566173-vc06veo4srmtisjc5bq33fctlapo22nv.apps.googleusercontent.com',
	      'cookiepolicy': 'single_host_origin',
	      'requestvisibleactions': 'http://schema.org/AddAction',
	      'scope': 'https://www.googleapis.com/auth/plus.login'
	    });
	  }
	  </script>
	  <style type="text/css">
	    #customBtn {
	      display: inline-block;
	      background: none;
	      color: white;
	      width: 165px;
	      border-radius: 5px;
	      white-space: nowrap;
	    }
	    #customBtn:hover {
	      background: none;
	      cursor: hand;
	    }
	    span.label {
	      font-weight: bold;
	    }
	    span.icon {
	      /*background: url('/+/images/branding/btn_red_32.png') transparent 5px 50% no-repeat;*/
	      display: inline-block;
	      vertical-align: middle;
	      width: 35px;
	      height: 35px;
	      border-right: #bb3f30 1px solid;
	    }
	    span.buttonText {
	      display: inline-block;
	      vertical-align: middle;
	      padding-left: 35px;
	      padding-right: 35px;
	      font-size: 14px;
	      font-weight: bold;
	      /* Use the Roboto font that is loaded in the <head> */
	      font-family: 'Roboto',arial,sans-serif;
	    }
	    h3{
	    	color:#000;
	    }
	    .respuesta5{
	    	background-color:#d4d4d4;
	    }

	  </style>
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
			<!--div id="header">				
				<a href="#" class="consulta" id="link_consulta" target="_top">CONSULTA TU IMC</a>
				<a href="#" class="version" id="link_version" data-ver="esp" target="_top">ENG</a>	
			</div-->			
			<div id="contenido">
			<form id="formulario" name="formulario" action="en_index.php#calificacion" method="get">
				<?php if (isset($_GET['facebook_id'])==false){ ?>
				<div id="portada" class="portada">
					<div class="social" id="facebook">
						<div id="btn_facebook" class="boton_facebook" data-click="false"></div>
						<div id="btn_google" class="boton_google">
							<div id="gSignInWrapper">						    
							    <div id="customBtn" class="customGPlusSignIn">
							      <span class="icon"></span>
							      <span class="buttonText"></span>
							    </div>
							 </div>
						</div>
						<div id="btn_sin_registro" class="boton_sin_registro"></div>
					</div>
				</div>
				<div id="preguntas">
					<!--div id="data_facebook"></div>
					<div id="facebook">
						<h3>Comienza tu quiz</h3>
						<div id="btn_facebook"><span>Conectar con Facebook</span></div>
						<div id="btn_sin_facebook"><span>No, seguir al quiz</span></div>
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
					</div-->
					<div id="tittle1" class="tittle" style="display:none">Health and wellness: what’s your number?</div>

					<div id="pregunta1" style="display:none" class="pregunta" data-next="pregunta2" data-prev="facebook">
						<h3>Are you male or female?</h3>
						<div class="regresar" onclick="mostrar_portada();">
							Back
							<div class="trazo"></div>
						</div>
						<div class="respuesta respuesta1" data-respuesta="1">Female</div>
						<div class="respuesta respuesta2" data-respuesta="2">Male</div>				
					</div>
					
					<div id="pregunta2" style="display:none" class="pregunta mujer">
						<h3>What is your age?</h3>
						<div class="regresar" onclick="mostrar('pregunta1');">
							Back
							<div class="trazo"></div>
						</div>
						<input class="input_answer numerico" type="text" name="pregunta2">
						<div class="respuesta5" data-sig="pregunta3">Next</div>
					</div>
					
					<div id="pregunta3" style="display:none" class="pregunta">
						<h3>How many days per week do you exercise?</h3>
						<div class="regresar" onclick="mostrar('pregunta2');">
							Back
							<div class="trazo"></div>
						</div>
						<input class="input_answer numerico" type="text" name="pregunta3">
						<div class="respuesta5" data-sig="pregunta4">Next</div>													
					</div>

					<div id="pregunta4" style="display:none" class="pregunta" data-next="pregunta5">
						<h3>Between meals, do you eat junk food or unhealthy snacks?</h3>
						<p class="example">(for example: chips, pizza, donuts, tacos, etc.)</p>
						<div class="regresar" onclick="mostrar('pregunta3');">
							Back
							<div class="trazo"></div>
						</div>
						<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
						<div class="respuesta respuesta2" data-respuesta="2">No</div>													
					</div>

					<div id="pregunta5" style="display:none" class="pregunta" data-next="pregunta6">
						<h3>Do you follow a low-fat diet?</h3>
						<p class="example">(for example: you avoid eating the greasy part of the meat, bacon and fried food)</p>
						<div class="regresar" onclick="mostrar('pregunta4');">
							Back
							<div class="trazo"></div>
						</div>
						<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
						<div class="respuesta respuesta2" data-respuesta="2">No</div>													
					</div>

					<div id="pregunta6" style="display:none" class="pregunta" data-next="pregunta7">
						<h3>Do you have a good fiber intake or eat multigrain foods?</h3>
						<p class="example">(for example: fruits, vegetables or multigrain flour)</p>
						<div class="regresar" onclick="mostrar('pregunta5');">
							Back
							<div class="trazo"></div>
						</div>
						<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
						<div class="respuesta respuesta2" data-respuesta="2">No</div>													
					</div>

					<div id="pregunta7" style="display:none" class="pregunta">
						<h3>How many servings of fruits or vegetables do you eat each day?</h3>
						<div class="regresar" onclick="mostrar('pregunta6');">
							Back
							<div class="trazo"></div>
						</div>
						<input class="input_answer numerico" type="text" name="pregunta7">
						<div class="respuesta5" data-sig="pregunta8">Next</div>
					</div>

					<div id="pregunta8" style="display:none" class="pregunta">
						<h3>How many cups of water do you drink each day?</h3>
						<div class="regresar" onclick="mostrar('pregunta7');">
							Back
							<div class="trazo"></div>
						</div>
						<input class="input_answer numerico" type="text" name="pregunta8">
						<div class="respuesta5" data-sig="pregunta9">Next</div>		
					</div>

					<div id="pregunta9" style="display:none" class="pregunta" data-next="pregunta22">
						<h3>Do you follow a low-salt diet?</h3>
						<div class="regresar" onclick="mostrar('pregunta8');">
							Back
							<div class="trazo"></div>
						</div>
						<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
						<div class="respuesta respuesta2" data-respuesta="2">No</div>													
					</div>

					<div id="pregunta22" style="display:none" class="pregunta">
						<h3>What is your total cholesterol?</h3>
						<div class="regresar" onclick="mostrar('pregunta9');">
							Back
							<div class="trazo"></div>
						</div>
						<input class="input_answer numerico" type="text" name="pregunta22">
						<div class="respuesta5" data-sig="pregunta23">Next</div>
						<div class="respuesta6" onclick="mostrar('pregunta23');">I don’t know</div>
					</div>

					<div id="pregunta23" style="display:none" class="pregunta">
						<h3>What is your diastolic blood pressure?</h3>
						<p class="example">(lower)</p>
						<div class="regresar" onclick="mostrar('pregunta22');">
							Back
							<div class="trazo"></div>
						</div>
						<input class="input_answer numerico" type="text" name="pregunta23">
						<div class="respuesta5" data-sig="pregunta24">Next</div>
						<div class="respuesta6" onclick="mostrar('pregunta24');">I don’t know</div>
					</div>

					<div id="pregunta24" style="display:none" class="pregunta">
						<h3>What is your systolic blood pressure?</h3>
						<p class="example">(higher)</p>
						<div class="regresar" onclick="mostrar('pregunta23');">
							Back
							<div class="trazo"></div>
						</div>
						<input class="input_answer numerico" type="text" name="pregunta24">
						<div class="respuesta5" data-sig="pregunta10a">Next</div>
						<div class="respuesta6" onclick="mostrar('pregunta10a');">I don’t know</div>
					</div>

					<div id="pregunta10a" style="display:none" class="pregunta">
						<h3>What's your height</h3>
						<p class="example"><span>Meters <input type="radio" name="altura" value="metros" checked></span><span>Feet.Inches <input type="radio" name="altura" value="pies_pulgadas"></span></p>
						<p class="example"><span class="dos">(example: 1.75)</span><span class="dos">(example: 5.7)</span></p>
						<div class="regresar" onclick="mostrar('pregunta24');">
							Back
							<div class="trazo"></div>
						</div>
						<input class="input_answer decimal" type="text" name="pregunta10a">
						<div class="respuesta5" data-sig="pregunta10b">Next</div>
					</div>

					<div id="pregunta10b" style="display:none" class="pregunta">
						<h3>What’s your weight?</h3>
						<p class="example">Kilos <input type="radio" name="peso" value="kilo" checked>Pounds <input type="radio" name="peso" value="libra"></p>
						<div class="regresar" onclick="mostrar('pregunta10a');">
							Back
							<div class="trazo"></div>
						</div>
						<input class="input_answer numerico" type="text" name="pregunta10b">
						<div class="respuesta5" data-sig="pregunta11">Next</div>
					</div>

					<div id="pregunta11" style="display:none" class="pregunta" data-next="pregunta12">
						<h3>Are you diabetic?</h3>
						<div class="regresar" onclick="mostrar('pregunta10b');">
							Back
							<div class="trazo"></div>
						</div>
						<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
						<div class="respuesta respuesta2" data-respuesta="2">No</div>
					</div>

					<div id="pregunta12" style="display:none" class="pregunta" data-next="pregunta13">
						<h3>Do you feel anxious or irritable?</h3>
						<div class="regresar" onclick="mostrar('pregunta11');">
							Back
							<div class="trazo"></div>
						</div>
						<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
						<div class="respuesta respuesta2" data-respuesta="2">No</div>
					</div>

					<div id="pregunta13" style="display:none" class="pregunta" data-next="pregunta14">
						<h3>Are you overly self-critical or fearful of failure?</h3>
						<div class="regresar" onclick="mostrar('pregunta12');">
							Back
							<div class="trazo"></div>
						</div>
						<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
						<div class="respuesta respuesta2" data-respuesta="2">No</div>													
					</div>

					<div id="pregunta14" style="display:none" class="pregunta" data-next="pregunta15">
						<h3>Do you cry frequently or act impulsively?</h3>
						<div class="regresar" onclick="mostrar('pregunta13');">
							Back
							<div class="trazo"></div>
						</div>
						<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
						<div class="respuesta respuesta2" data-respuesta="2">No</div>
					</div>

					<div id="pregunta15" style="display:none" class="pregunta" data-next="pregunta16">
						<h3>Do you suffer from sleeplessness, frequent headaches or stomach distress?</h3>
						<div class="regresar" onclick="mostrar('pregunta14');">
							Back
							<div class="trazo"></div>
						</div>
						<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
						<div class="respuesta respuesta2" data-respuesta="2">No</div>
					</div>

					<div id="pregunta16" style="display:none" class="pregunta">
						<h3>How many alcoholic drinks do you take per week?</h3>
						<div class="regresar" onclick="mostrar('pregunta15');">
							Back
							<div class="trazo"></div>
						</div>
						<input class="input_answer numerico" type="text" name="pregunta16">
						<div class="respuesta5" data-sig="pregunta17">Next</div>
						<img class="clock20" src="images/20.png">
					</div>

					<div id="pregunta17" style="display:none" class="pregunta">
						<h3>On average, how many hours do you sleep?</h3>
						<div class="regresar" onclick="mostrar('pregunta16');">
							Back
							<div class="trazo"></div>
						</div>
						<input class="input_answer numerico" type="text" name="pregunta17">
						<div class="respuesta5" data-sig="pregunta18">Next</div>
						<img class="clock" src="images/21.png">
					</div>

					<div id="pregunta18" style="display:none" class="pregunta">
						<h3>How many days were you sick last year?</h3>
						<div class="regresar" onclick="mostrar('pregunta17');">
							Back
							<div class="trazo"></div>
						</div>
						<input class="input_answer numerico" type="text" name="pregunta18">
						<div class="respuesta5" data-sig="pregunta19">Next</div>
						<img class="clock" src="images/22.png">
					</div>

					<div id="pregunta19" style="display:none" class="pregunta" data-next="pregunta20">
						<h3 class="t_tabaco">Regarding tobacco</h3>
						<div class="regresar" onclick="mostrar('pregunta18');">
							Back
							<div class="trazo"></div>
						</div>
						<div class="tabaco respuesta respuesta7 multi1" data-respuesta="1">Never smoked or stopped smoking more than two years ago</div>
						<div class="tabaco respuesta respuesta8 multi1 lr1" data-respuesta="2">Stopped smoking less than two years ago</div>
						<div class="tabaco respuesta respuesta3 multi2 lr2" data-respuesta="3">Smoke cigars or pipes, or frequent exposure to second-hand smoke</div>								
						<div class="tabaco respuesta respuesta4 multi2 lr3" data-respuesta="4">Smoke cigarettes</div>													
						<img class="clock23" src="images/23.png">
					</div>

					<div id="pregunta20" style="display:none" class="pregunta">
						<h3>How many days a week do you eat breakfast?</h3>
						<div class="regresar" onclick="mostrar('pregunta19');">
							Back
							<div class="trazo"></div>
						</div>
						<input class="input_answer numerico" type="text" name="pregunta20">
						<div class="respuesta5" data-sig="pregunta21">Next</div>
						<img class="clock" src="images/24.png">
					</div>

					<div id="pregunta21" style="display:none" class="pregunta" data-next="pregunta25">
						<h3>Do you wear sunscreen?</h3>
						<div class="regresar" onclick="mostrar('pregunta20');">
							Back
							<div class="trazo"></div>
						</div>
						<div class="respuesta respuesta1" data-respuesta="1">Yes</div>
						<div class="respuesta respuesta2" data-respuesta="2">No</div>
						<img class="clock25" src="images/25.png">
					</div>

					<div id="pregunta25" style="display:none" class="pregunta last">
						<h3 id="zip_code">What's your zip code?</h3>
						<div class="regresar" onclick="mostrar('pregunta21');">
							Back
							<div class="trazo"></div>
						</div>
						<div class="codigo_postal">
							<input type="text" name="cp" id="cp" maxlength="5" size="5" class="numerico code">
							<br>
							<p id="country">If you don't live in the U.S., choose your country</p>													
							<select id="paises">
								<option value=""></option>
							</select>
						</div>					
						<div class="respuesta centrada">What’s my Wellness Score?</div>
						<img class="clock26" src="images/26.png">
					</div>
				</div>					
				<input type="hidden" name="facebook_id" id="facebook_id" value="null">
				<input type="hidden" name="pregunta0" id="valor_pregunta0" value="null">
				<input type="hidden" name="pregunta1" id="valor_pregunta1" value="null">
				<!--input type="hidden" name="pregunta2" id="valor_pregunta2" value="null"-->
				<!--input type="hidden" name="pregunta3" id="valor_pregunta3" value="null"-->
				<input type="hidden" name="pregunta4" id="valor_pregunta4" value="null">
				<input type="hidden" name="pregunta5" id="valor_pregunta5" value="null">
				<input type="hidden" name="pregunta6" id="valor_pregunta6" value="null">
				<!--input type="hidden" name="pregunta7" id="valor_pregunta7" value="null">
				<input type="hidden" name="pregunta8" id="valor_pregunta8" value="null"-->
				<input type="hidden" name="pregunta9" id="valor_pregunta9" value="null">
				<!--input type="hidden" name="pregunta10" id="valor_pregunta10" value="null"-->
				<input type="hidden" name="pregunta11" id="valor_pregunta11" value="null">
				<input type="hidden" name="pregunta12" id="valor_pregunta12" value="null">
				<input type="hidden" name="pregunta13" id="valor_pregunta13" value="null">
				<input type="hidden" name="pregunta14" id="valor_pregunta14" value="null">
				<input type="hidden" name="pregunta15" id="valor_pregunta15" value="null">
				<!--input type="hidden" name="pregunta16" id="valor_pregunta16" value="null">
				<input type="hidden" name="pregunta17" id="valor_pregunta17" value="null">
				<input type="hidden" name="pregunta18" id="valor_pregunta18" value="null"-->			
				<input type="hidden" name="pregunta19" id="valor_pregunta19" value="null">			
				<!--input type="hidden" name="pregunta20" id="valor_pregunta20" value="null"-->			
				<input type="hidden" name="pregunta21" id="valor_pregunta21" value="null">			
				<!--input type="hidden" name="pregunta22" id="valor_pregunta22" value="null">			
				<input type="hidden" name="pregunta23" id="valor_pregunta23" value="null">			
				<input type="hidden" name="pregunta24" id="valor_pregunta24" value="null"-->			
				<input type="hidden" name="codigo_postal" id="codigo_postal" value="null">			
				<input type="hidden" name="pais" id="pais" value="null">			
				<input type="hidden" name="ancho" id="ancho" value="297">			
	            <input type="hidden" name="location" id="location" value="null">
	            <input type="hidden" name="google_id" id="google_id" value="null">
	            <input type="hidden" name="google_name" id="google_name" value="null">			
	            <input type="hidden" name="preguntax" id="preguntax" value="">
	            <input type="hidden" name="preguntay" id="preguntay" value="">
			</form>
				<?php  } else if( ($_GET["preguntax"]=="") && ($_GET["preguntay"]=="") ){ 				
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
									
					if (($_GET["pregunta22"]!='') || ($_GET["pregunta23"]!='') || ($_GET["pregunta24"]!='')){						
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
					$bmi = 0;
					if ($_GET["pregunta2"]!="null"){
							$r_p2 = 1;
							if ($_GET["pregunta2"]>=45){
								$r_p2 = 2;
							}
							$suma = $suma + $pregunta2[$r_p2];
					}
					if ($_GET["pregunta3"]!="null"){
							$r_p3 = 1;
							if (($_GET["pregunta3"]>0) && ($_GET["pregunta3"]<3)){
								$r_p3 = 2;
							}else if (($_GET["pregunta3"]>2) && ($_GET["pregunta3"]<5)){
								$r_p3 = 3;							
							}else if ($_GET["pregunta3"]>4){
								$r_p3 = 4;
							}
							$suma = $suma + $pregunta3[$r_p3];
					}							
					if ($_GET["pregunta4"]!="null")
							$suma = $suma + $pregunta4[$_GET["pregunta4"]];
					if ($_GET["pregunta5"]!="null")
							$suma = $suma + $pregunta5[$_GET["pregunta5"]];
					if ($_GET["pregunta6"]!="null")
							$suma = $suma + $pregunta6[$_GET["pregunta6"]];
					if ($_GET["pregunta7"]!="null"){
							$r_p7 = 2;
							if ($_GET["pregunta7"] > 4){
								$r_p7 = 1;
							}
							$suma = $suma + $pregunta7[$r_p7];
					}
					if ($_GET["pregunta8"]!="null"){
							$r_p8 = 2;
							if ($_GET["pregunta8"] > 6){
								$r_p8 = 1;
							}
							$suma = $suma + $pregunta8[$r_p8];
					}
					if ($_GET["pregunta9"]!="null")
							$suma = $suma + $pregunta9[$_GET["pregunta9"]];
					if (($_GET["pregunta10a"]!="null") && ($_GET["pregunta10a"]!="") && ($_GET["pregunta10b"]!="null") && ($_GET["pregunta10b"]!="")){
							/*Obtener IMC*/							
							$estatura = $_GET["pregunta10a"];
							$peso = $_GET["pregunta10b"];
							if (($_GET["altura"]=='metros') && ($_GET["peso"]=="kilo")){
								$bmi = round(($peso/($estatura*$estatura)),1);							
							}else{
								$entero = floor($estatura)*12;
								$decimales = explode(".",$estatura);
								$estatura = $entero + $decimales[1];						
								$bmi = round((($peso/($estatura*$estatura))*703),1);
							}						
							$r_p10 = 1;
							if (($bmi>=18.5) && ($bmi<25)){
								$r_p10 = 2;
							}else if (($bmi>=25) && ($bmi<30)){
								$r_p10 = 3;
							}else if ($bmi>=30){
								$r_p10 = 3;
							}
							$suma = $suma + $pregunta10[$r_p10];
					}
					if ($_GET["pregunta11"]!="null")
							$suma = $suma + $pregunta11[$_GET["pregunta11"]];
					if ($_GET["pregunta12"]!="null")
							$suma = $suma + $pregunta12[$_GET["pregunta12"]];
					if ($_GET["pregunta13"]!="null")
							$suma = $suma + $pregunta13[$_GET["pregunta13"]];
					if ($_GET["pregunta14"]!="null")
							$suma = $suma + $pregunta14[$_GET["pregunta14"]];
					if ($_GET["pregunta15"]!="null")
							$suma = $suma + $pregunta15[$_GET["pregunta15"]];
					if ($_GET["pregunta16"]!="null"){
							$r_p16 = 1;
							if (($_GET["pregunta16"]>5) && ($_GET["pregunta16"]<8)){
								$r_p16 = 2;
							}else if (($_GET["pregunta16"]>=8) && ($_GET["pregunta16"]<14)){
								$r_p16 = 3;
							}else if ($_GET["pregunta16"]>=14){
								$r_p16 = 4;
							}
							$suma = $suma + $pregunta16[$r_p16];
					}
					if ($_GET["pregunta17"]!="null"){
							$r_p17 = 2;
							if ($_GET["pregunta17"]>=7){
								$r_p17 = 1;
							}
							$suma = $suma + $pregunta17[$r_p17];
					}
					if ($_GET["pregunta18"]!="null"){
							$r_p18 = 1;
							if ($_GET["pregunta18"]>4){
								$r_p18 = 2;
							}
							$suma = $suma + $pregunta18[$r_p18];
					}

					if ($_GET["pregunta19"]!="null")
							$suma = $suma + $pregunta19[$_GET["pregunta19"]];
					if ($_GET["pregunta20"]!="null"){
							$r_p20 = 1;
							if ($_GET["pregunta20"]<7){
								$r_p20 = 2;
							}
							$suma = $suma + $pregunta20[$r_p20];
					}
					if ($_GET["pregunta21"]!="null")
							$suma = $suma + $pregunta21[$_GET["pregunta21"]];
					if (($_GET["pregunta22"]!="") && ($_GET["pregunta22"]!="null")){
							$r_p22 = 4;
							if (($_GET["pregunta22"] >= 160) && ($_GET["pregunta22"] < 200)){
								$r_p22 = 3;
							}
							if (($_GET["pregunta22"] >= 200) && ($_GET["pregunta22"] < 240)){
								$r_p22 = 2;
							}
							if ($_GET["pregunta22"] >= 240){
								$r_p22 = 1;
							}
							$suma = $suma + $pregunta22[$r_p22];
					}
					if ($_GET["pregunta23"]!="null"){
							$r_p23 = 4;
							if (($_GET["pregunta23"] >= 76) && ($_GET["pregunta23"] < 80)){
								$r_p23 = 3;
							}
							if (($_GET["pregunta23"] >= 80) && ($_GET["pregunta23"] < 90)){
								$r_p23 = 2;
							}
							if ($_GET["pregunta23"] >= 90){
								$r_p23 = 1;
							}							
							$suma = $suma + $pregunta23[$r_p23];
					}
					if ($_GET["pregunta24"]!="null"){
							$r_p24 = 4;
							if (($_GET["pregunta24"] >= 115) && ($_GET["pregunta24"] < 120)){
								$r_p24 = 3;
							}
							if (($_GET["pregunta24"] >= 120) && ($_GET["pregunta24"] < 140)){
								$r_p24 = 2;
							}
							if ($_GET["pregunta24"] >= 140){
								$r_p24 = 1;
							}							
							$suma = $suma + $pregunta24[$r_p24];
					}



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
					/*echo $r_p2.", ".$r_p3.", ".$r_p7.", ".$r_p8.", ".$r_p10.", ".$r_p16.", ".$r_p17.", ".$r_p18.", ".$r_p20; 
					echo "SUMA->".$suma;
					echo "BMI->".$bmi;*/
				?>
				<div class="valores">
					<div id="tittle">Health and wellness: what’s your number?</div>
					<ul id="menu_resultados">
							<li class="opt_activa" data-show="r_calificacion">WELLNESS SCORE</li>
							<li data-show="r_mejora">TIPS</li>
							<li data-show="r_compara">COMPARE YOUR RESULTS</li>
							<li data-show="r_imc">MY BMI</li>
					</ul>
					<div id="r_calificacion" class="resp">						
						<div class="calificacion" id="calificacion">						
							<div id="resultado"><?php echo $resultado; if ($resultado=="4"){ echo"<br/><span>O MENOS</span>";} ?></div>
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
						<div class="contenedor_btn_fb"></div>
					</div>
					<div id="r_mejora" class="resp" style="display:none">	                    
	                    <?php 
	                        $href = "http://univision.data4.mx/ws/comparte.php?pts=".$suma;							                                        
	                    ?>
	                    <script>
	    						var href = 'https://www.facebook.com/dialog/feed?app_id=1466045853659439&name=Este%20es%20el%20resultado%20de%20mi%20quiz%20de%20salud.%20Toma%20el%20tuyo%20aquí%20y%20entérate%20qué%20tan%20saludable%20eres.&picture=http://univision.data4.mx/ws/images/salud.png&display=popup&caption=¿Cuál%20es%20tu%20número%3f&&link='+escape('<?php echo $href; ?>')+'&redirect_uri='+escape('<?php echo $href; ?>');						
	    						//var html = '<a href="'+href+'" target="_blank"><div class="share-on-facebook">Compartir mi calificación <span>Facebook</span></div></a>';
	    						var html = '<a href="'+href+'" target="_blank"><div class="share_facebook"><img src="images/facebook_share_en.png"></a>';
	    						$(".contenedor_btn_fb").html(html);
	    			    </script>							                    
						<div class="tips">
							<div id="tip_pregunta3" class="tip <?php if (in_array($r_p3, array(1,2))) {echo 'sprite-ejercicio_active tip_activo'; }else{ echo 'sprite-ejercicio_inactive';} ?>"></div>
							<div id="tip_pregunta4" class="tip <?php if ($_GET["pregunta4"]==1) {echo 'sprite-chatarra_active tip_activo'; }else{ echo 'sprite-chatarra_inactive';} ?>"></div>
							<div id="tip_pregunta5" class="tip <?php if ($_GET["pregunta5"]==2) {echo 'sprite-grasas_active tip_activo'; }else{ echo 'sprite-grasas_inactive';} ?>"></div>
							<div id="tip_pregunta6" class="tip <?php if ($_GET["pregunta6"]==2) {echo 'sprite-fibra_active tip_activo'; }else{ echo 'sprite-fibra_inactive';} ?>"></div>
							<div id="tip_pregunta7" class="tip <?php if ($r_p7==2) {echo 'sprite-frutas-verduras_active tip_activo'; }else{ echo 'sprite-frutas-verduras_inactive';}?>"></div>
							<div id="tip_pregunta8" class="tip <?php if ($r_p8==2) {echo 'sprite-agua_active tip_activo'; }else{ echo 'sprite-agua_inactive';}?>"></div>
							<div id="tip_pregunta9" class="tip <?php if ($_GET["pregunta9"]==2) {echo 'sprite-sal_active tip_activo'; }else{ echo 'sprite-sal_inactive';}?>"></div>
							<div id="tip_pregunta22" class="tip <?php if (in_array($_GET["pregunta22"], array(1,2))) {echo 'sprite-colesterol_active tip_activo'; }else{ echo 'sprite-colesterol_inactive';} ?>"></div>						
							<div id="tip_pregunta23_24" class="tip <?php if (in_array(1, array($_GET["pregunta23"],$_GET["pregunta34"])) || in_array(2, array($_GET["pregunta23"],$_GET["pregunta34"]))) {echo 'sprite-presion-sanguinea_active tip_activo';}else{ echo 'sprite-presion-sanguinea_inactive';} ?>"></div>						
							<div id="tip_pregunta10" class="tip <?php if (in_array($r_p10, array(1,3,4))) {echo 'sprite-imc_active tip_activo'; }else{ echo 'sprite-imc_inactive';} ?>" ></div>
							<div id="tip_pregunta11" class="tip <?php if ($_GET["pregunta11"]==1) {echo 'sprite-diabetes_active tip_activo'; }else{ echo 'sprite-diabetes_inactive';}?>"></div>
							<div id="tip_estres" class="tip <?php if (in_array(1, array($_GET["pregunta12"],$_GET["pregunta13"],$_GET["pregunta14"],$_GET["pregunta15"]))) {echo 'sprite-estres_active tip_activo'; }else{ echo 'sprite-estres_inactive';}?>"></div>
							<div id="tip_pregunta16" class="tip <?php if (in_array($r_p16, array(3,4))) {echo 'sprite-alcohol_active tip_activo'; }else{ echo 'sprite-alcohol_inactive';} ?>"></div>
							<div id="tip_pregunta17" class="tip <?php if ($r_p17==2) {echo 'sprite-dormir_active tip_activo'; }else{ echo 'sprite-dormir_inactive';}?>"></div>
							<div id="tip_pregunta18" class="tip <?php if ($r_p18==2) {echo 'sprite-enfermo_active tip_activo'; }else{ echo 'sprite-enfermo_inactive';}?>"></div>
							<div id="tip_pregunta19" class="tip <?php if (in_array($_GET["pregunta19"], array(3,4))) {echo 'sprite-tabaco_active tip_activo'; }else{ echo 'sprite-tabaco_inactive';} ?>"></div>
							<div id="tip_pregunta20" class="tip <?php if ($r_p20==2) {echo 'sprite-desayuno_active tip_activo'; }else{ echo 'sprite-desayuno_inactive';} ?>"></div>
							<div id="tip_pregunta21" class="tip <?php if ($_GET["pregunta21"]==2) {echo 'sprite-proteccion-solar_active tip_activo'; }else{ echo 'sprite-proteccion-solar_inactive';} ?>"></div>
						</div>						
						<div id="instruccion_tip" style="clear:both"></div>
						<div class="titulo web" style="clear:both"> 
							<p>
								Click the buttons for tips on how to improve your number. To close de window click on it again.
							</p>
						</div>
						<div class="titulo_movil" style="clear:both"> 
							Haz clic sobre los botones para sugerencias sobre cómo mejorar tus números
						</div>					
	                    <div id="ver_todos" class="boton2">Show all tips</div>
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
				                        $("#mensaje_tip").html("<div class='contenido_mensaje'>"+$(this).find(".tooltip").html()+"<a id='cerrar'>CERRAR</a></div>");
				                        scrollToAnchor('#mensaje_tip');
				                        $("#cerrar").on("click", function(){
					                        $("#mensaje_tip").html("");
					                        scrollToAnchor('.mejora');
				                        });			
			                        })	
		                        }
	                            $("#instruccion_tip").html("Las que corresponden a tus áreas de mejora están remarcadas en azul.");
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




						$query = "insert into muestra values (id,'".$_GET["facebook_id"]."','".$_GET["location"]."',null,".$_GET["pregunta1"].",".$_GET["pregunta2"]."
							,".$_GET["pregunta3"].",".$_GET["pregunta4"].",".$_GET["pregunta5"].",".$_GET["pregunta6"].",".$_GET["pregunta7"].",".$_GET["pregunta8"]."
							,".$_GET["pregunta9"].",'".$bmi."',".$_GET["pregunta11"].",".$_GET["pregunta12"].",".$_GET["pregunta13"].",".$_GET["pregunta14"]."
							,".$_GET["pregunta15"].",".$_GET["pregunta16"].",".$_GET["pregunta17"].",".$_GET["pregunta18"].",".$_GET["pregunta19"].",".$_GET["pregunta20"]."
							,".$_GET["pregunta21"].",'".$_GET["pregunta22"]."','".$_GET["pregunta23"]."','".$_GET["pregunta24"]."','".$resultado."','".$_GET["google_id"]."','".$_GET["google_name"]."', '".get_client_ip()."','".$fecha."','".$hora."','".$_GET["codigo_postal"]."','".$_GET["pais"]."')";						
						if (!mysql_query($query)){
								die('Error: ' . mysql_error($conexion));
							}
						$id_usuario = mysql_insert_id();

						$query2 = "SELECT id,resultado,rank, round(100*(cnt-rank+1)/cnt/2,0) as monito, round(100*(cnt-rank+1)/cnt,0) as percentile FROM ( SELECT  id, resultado,@curRank := @curRank + 1 AS rank FROM   `muestra` as p,  (SELECT @curRank := 0) as r ORDER BY  resultado desc ) as dt , (select count(distinct id) as cnt from `muestra`) as ct where id = ".$id_usuario;

						$percentil_ = mysql_query($query2);

					?>						
				
					
			
					<div id="r_compara" class="resp" style="display:none">
						<div id="barras">	
							<div class="monitos">						
							<?php 								
								$registro = mysql_fetch_array($percentil_, MYSQL_NUM);
								$monito = $registro[3];
								$percentil = $registro[4];																
								if ($monito == 0)
									$monito = 1;
															
								for ($i=1; $i<$monito;$i++){
									echo "<div class='rojo'></div>";
								}
								if ($monito<25){
									echo "<div class='monito'><div class='cuadrito'>".$percentil."%</div></div>";
								}else{
									echo "<div class='monito'><div class='cuadrito2'>".$percentil."%</div></div>";
								}
								for ($i=$monito; $i<50;$i++){
									echo "<div class='verde'></div>";
								}
							?>
							</div>							
						</div>
						<div id="cintillo_en">
							<img class="cintillo cont_web" src="images/en_cintillo.png">
							<img class="cintillo cont_movil" src="images/en_cintillo_movil.png">
						</div>
						<!--h1 class="tit">Compara tus resultados</h1>					
						<div id="resultados">					
							
						</div>
						<div class="calificaciones">
							<div class="rango_calificacion primero"><span>10-9</span> = Excelente</div>
							<div class="rango_calificacion"><span>8.5-7.5</span> = Vas Bien</div>
							<div class="rango_calificacion"><span>7-6</span> = Necesitas Mejorar</div>
							<div class="rango_calificacion"><span>5.5-4.5</span> = En Riesgo </div>
							<div class="rango_calificacion"><span>4 o menos</span> = Alto Riesgo</div>
						</div-->
					</div>			
					<div id="r_imc" class="resp" style="display:none">
						<?php
							echo $bmi;						
						?>
						<div class="banda_resultados">
							<div id="banda_peso_bajo" class="<?php if ($bmi<=18.5){ $resultado = "PESO BAJO"; echo 'banda_activa'; }?>">Less than 18.5<span>UNDERWEIGHT</span></div>
							<div id="banda_peso_normal" class="<?php if (($bmi>=18.6) && ($bmi<=24.9)){ $resultado = "NORMAL"; echo 'banda_activa'; }?>">18.6-24.9<span>NORMAL</span></div>
							<div id="banda_sobrepeso" class="<?php if (($bmi>=25) && ($bmi<=29.9)){ $resultado = "SOBREPESO"; echo 'banda_activa'; }?>">25-29.9<span>OVERWEIGHT</span></div>
							<div id="banda_obesidad"class="<?php if ($bmi>=30){ $resultado = "OBESIDAD"; echo 'banda_activa'; }?>">30 o over<span>OBESE</span></div>
						</div>
					</div>
					<?php if ($_GET["facebook_id"]!="null"){?>
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
										$f_Amas[$f_Amas.length]=<?php echo "'".$registro[1]."'";?>;
								<?php
									}
								}
								if ($registro[28]=="A"){ 
									if ($registro[1]!="null"){
								?> 								
										$f_A[$f_A.length]=<?php echo "'".$registro[1]."'";?>;								
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
					
					
					/*function crearSimpletip(id){
						$i = 0;
						$amigos = new Array();
						console.log(window.friends);
						switch (id){
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
							$content ="<p><span>Calificación de tus amigos de <img src='images/facebook.png'></span>";
							for ($i=0; $i<$amigos.length; $i++){
								$content = $content + "<img src='https://graph.facebook.com/"+$amigos[$i]+"/picture'>";
							}
							$content = $content + "</p>";
							$("#"+id).simpletip({content: $content, fixed: true, position:["-145px","-100px"]});
						}else{						
							$("#"+id).simpletip({content: "<p>Ninguno de tus amigos de <img src='images/facebook.png'> ha obtenido esta calificación</p>", fixed: true, position:["-145px","-100px"]});
						}
						
					}
					crearSimpletip("Amas");
					crearSimpletip("A");
					crearSimpletip("Amenos");
					crearSimpletip("Bmas");
					crearSimpletip("B");
					crearSimpletip("Bmenos");
					crearSimpletip("Cmas");
					crearSimpletip("C");
					crearSimpletip("Cmenos");
					crearSimpletip("Dmas");
					crearSimpletip("D");
					crearSimpletip("Dmenos");
					crearSimpletip("F");				
					*/
					
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
							$content ="<p><span>Calificación de tus amigos de <img src='images/facebook.png'></span>";
							for ($i=0; $i<$amigos.length; $i++){
								$content = $content + "<img src='https://graph.facebook.com/"+$amigos[$i]+"/picture'>";
							}
							$content = $content + "</p>";
							$(this).simpletip({content: $content, fixed: true, position:["-145px","-100px"]});
						}else{						
							$(this).simpletip({content: "<p>Ninguno de tus amigos de <img src='images/facebook.png'> ha obtenido esta calificación</p>", fixed: true, position:["-145px","-100px"]});
						}					
					});
					
					
					</script>
				<?php }
					mysql_close($conexion);			
					
				} 			
				?>
				<div id="logos" class="logos" style="display:none">
		            <img src="images/logos.png">
		        </div>
			</div>					
			<!--div class="footer">
				El quiz es sólo para mayores de 18 años y su función es informativa. <br/>
				No se debe usar como una herramienta de diagnóstico ni ser sustituto de una consulta médica.
			</div-->
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
	              } else {
	                //console.log('No results found');
	              }
	            } else {
	              //console.log('Geocoder failed due to: ' + status);
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
	        //console.log('Error: The Geolocation service failed.');
	      } else {
	        //console.log('Error: Your browser doesn\'t support geolocation.');
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
