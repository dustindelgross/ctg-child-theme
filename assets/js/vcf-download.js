jQuery(document).ready(function($){

function downloadIt() {
	
	var el = document.querySelector('.ctgTap');
	var filePath = el.dataset.downloadUrl;
	var fileName = el.dataset.fileName;
	var fileURL = 'https://celebrationtitlegroup.com' + filePath;

	window.open(fileURL,"_self");

   }

	$('.ctgTap').on('click', function(){
		downloadIt();
	});
	
	

/*
function downloadItTest(data, fileName, type="text/plain") {
	
	var el = document.querySelector('.ctgTapTest');
	var filePath = el.dataset.downloadUrl;
	var fileName = el.dataset.fileName;
	var fileURL = 'https://celebrationtitlegroup.com' + filePath;

	const a = document.createElement('a');

	a.style.display = "none";
	document.body.appendChild(a);
	

	a.href = fileURL;
	
 
		
	URL.createObjectURL(
		new Blob( [data], {type} )
	);


	a.setAttribute("download", fileName);
	a.setAttribute("target", "_blank");


	a.click();


	window.URL.revokeObjectURL(a.href);
	document.body.removeChild(a);
	console.log('ran it');
   }
		
	function checkDownloadSupport() {
		var b = document.querySelector('.ctgTap');
		if ( typeof b.download !== "undefined") {
			console.log("we can download");
		} else {
			window.alert('downloads aren\'t allowed here');	
			$('.ctgTap').hide();
		}
	}

	window.onload = checkDownloadSupport ;
	
	
	var ua = navigator.userAgent || navigator.vendor || window.opera;
	var isInstagram = (ua.indexOf('Instagram') > -1) ? true : false;
	
	
	document.querySelector('.userAgentContainer').innerText = ua;
	var instaLink = document.querySelector('.ctgTap');
	var instaBrowser = document.querySelector('.instagram-browser');
	instaLink.style.backgroundColor = 'yellow';
	
if (document.documentElement.classList ){
	if (isInstagram) {
		window.document.body.classList.add('instagram-browser');
    	alert("debugging within the Instagram in-app browser");
	}
}

	$('.ctgTapTest').on('click', function(){
		downloadItTest();
	});
	*/
});