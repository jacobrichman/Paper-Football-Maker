<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0021)http://gifcreator.me/ -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Paper Football Maker</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div id="topbar0"></div>
	<div id="topbar">
		<div id="topbar2">
			<center>
				<h1>
				Custom Paper Football Maker
				</h1></center>
			<div id="LogoTxt">
				<a></a>
			</div>
		</div>
	</div>
	<div id="Intro">
		<div id="IntroTXT">

		</div>
	</div>

		<div id="btm_text">
			<div id="btm_child">

				<p>
					Easily create custom paper footballs at the click of a button to provide loads of entertainment. Upload any image and this software will make a template for your paper football which can easily be cut out and folded. No need to waste time folding your
					homework from the day before which never actually comes out right.
				</p>

			</div>
		</div>



		<form action="print.php" method="post" onsubmit="return validateForm();" enctype="multipart/form-data">
			<div id="root_parent">
				<div id="root">

					<div class="LineTitle">
						1. Upload an image from your computer
					</div>

					<div class="Settings">

						<div class="LeftPanel">
							<div class="LeftPanelText">
								Select an images in JPG or PNG format:
							</div>
							<input accept="image/*" type="file" name="fileImage" onchange="fileSelected(event)" id="fileImage" style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; position: absolute; z-index: -1;" />
							<label class="button big" for="fileImage">Choose a file</label>

							<div class="LeftPanelText">
								<div id="fileName">No file selected</div>
							</div>

						</div>

						<div class="RightPanel">

							<div class="RightPanelText">
								Image Preview:
							</div>
							<div id="preview_parent" style="background-repeat: no-repeat; background-position: center; background-size: 100%;">
							</div>

						</div>
					</div>
					
					
					<div class="LineTitle">
						2. Settings
					</div>
					
					<div class="PicContainer" id="PicContainer">
						<label class="button big" onclick="preset('[10, 150, 5, 5]');">Preset Option 1</label>
						<label class="button big" onclick="preset('[10, 200, 4, 4]');">Preset Option 2</label>
						<label class="button big" onclick="preset('[10, 100, 5, 8]');">Preset Option 3</label>
					</div>

					<div class="Settings">

						<div class="LeftPanel">

							<div class="LeftPanelText">
								Indent:
							</div>
							<div class="LeftPanelText">
								<div class="LabelsW450PX">
									<input name="indent" id="indent" onchange="loadPreview()" class="coord" type="Text" size="2"> px
								</div>
							</div>

							<div class="LeftPanelBorder"></div>

							<div class="LeftPanelText">
								Width:
							</div>
							<div class="LeftPanelText">
								<div class="LabelsW450PX">
									<input name="width" id="width" onchange="loadPreview()" class="coord" type="Text" size="2"> px
								</div>
							</div>

							<div class="LeftPanelBorder"></div>

							<div class="LeftPanelText">
								Number of boxes:
							</div>
							<div class="LeftPanelText">
								<div class="LabelsW450PX">
									<input name="boxes" id="boxes" onchange="loadPreview()" class="coord" type="Text" size="2">
								</div>
							</div>

							<div class="LeftPanelBorder"></div>

							<div class="LeftPanelText">
								Index of height change:
							</div>
							<div class="LeftPanelText">
								<div class="LabelsW450PX">
									<input name="indexOfHeightChange" id="indexOfHeightChange" onchange="loadPreview()" class="coord" type="Text" size="2"> px
								</div>
							</div>

							<div class="LeftPanelBorder"></div>

							<div class="LeftPanelText">
								Copies:
							</div>
							<div class="LeftPanelText">
								<div class="LabelsW450PX">
									<input name="copies" id="copies" class="coord" type="Text" size="2">
								</div>
							</div>

						</div>

						<div class="RightPanel">

							<div class="RightPanelText">
								Template Preview:
							</div>
							<div id="preview_parent" style="height: 450px; background-repeat: no-repeat; background-position: center; background-size: 100%;">
								<iframe style="width: 500px; height: 900px; -ms-transform: scale(0.5); -moz-transform: scale(0.5); -o-transform: scale(0.5); -webkit-transform: scale(0.5); transform: scale(0.5); -ms-transform-origin: 0 0; -moz-transform-origin: 0 0; -o-transform-origin: 0 0; -webkit-transform-origin: 0 0; transform-origin: 0 0;" id="preview" frameborder="0">
								
							</iframe>
							</div>

						</div>
					</div>

					<div id="output_file_info" style="display: none">
						Some fields are missing.
					</div>


					<div class="LineTitle">
						3. Print
					</div>

					<div class="LineBigBtn" id="ConvertDIV">
						<input type="submit" name="submitButton" id="submitButton" style="width: 0.1px; height: 0.1px; opacity: 0; overflow: hidden; position: absolute; z-index: -1;" />
						<label class="button big" for="submitButton">Print</label>
					</div>

				</div>
			</div>
		</form>

		<div id="foot">

			<div id="foot_text">

				<div class="foot_line">
					<a>Made by Jacob Richman 2016</a>
				</div>
			</div>

		</div>
		<script>
			function fileSelected(event) {
				var input = document.getElementById('fileImage');
				if (input.files[0].size < 500000){
					document.getElementById('fileName').innerHTML = input.value.split(/(\\|\/)/g).pop();
					document.getElementById('preview_parent').style.backgroundImage = "url('" + URL.createObjectURL(event.target.files[0]) + "')";
        }
				else{
					alert("File too big.");
					input.value = "";
				}
			}

			function loadPreview() {
				var indent = document.getElementById('indent').value;
				var width = document.getElementById('width').value;
				var boxes = document.getElementById('boxes').value;
				var indexOfHeightChange = document.getElementById('indexOfHeightChange').value;
				if (indent && width && boxes && indexOfHeightChange) {
					var url = "preview.php?indent=" + indent + "&width=" + width + "&boxes=" + boxes + "&indexOfHeightChange=" + indexOfHeightChange;
					document.getElementById('preview').src = url;
				}
			}

			function validateForm() {
				var indent = document.getElementById('indent').value;
				var width = document.getElementById('width').value;
				var boxes = document.getElementById('boxes').value;
				var indexOfHeightChange = document.getElementById('indexOfHeightChange').value;
				var copies = document.getElementById('copies').value;
				var file = document.getElementById('fileImage').value;
				if (!(indent && width && boxes && indexOfHeightChange && copies && file)) {
					document.getElementById('output_file_info').style.display = "block";
					return false;
				}
			}
			
			function preset(val){
				var arr = JSON.parse(val);
				document.getElementById('indent').value = arr[0];
				document.getElementById('width').value = arr[1];
				document.getElementById('boxes').value = arr[2];
				document.getElementById('indexOfHeightChange').value = arr[3];
				loadPreview();
			}
		</script>
</body>

</html>