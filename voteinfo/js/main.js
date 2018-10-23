

	var output = document.querySelectorAll('.output');
	var tf = document.querySelectorAll('.test');





	// console.log(tf);
// console.log(tf.length, output.length);

	tf.forEach( function(input, index) {
		// statements
		
			input.addEventListener('keyup', function() {
				output[index].innerHTML = "<h5>" + input.placeholder + "</h5>" + input.value ;
			});
		
	});





// Select and display symbole image.

var symboleImg = document.querySelectorAll('#symbole-img');
var targets = document.querySelectorAll('.card-img-top');




// symboleImg.forEach( function(input, index) {
// 		// statements
		
// 			input.addEventListener('change', function() {
// 				var path = input.value.split('\\')[2];
// 				targets[index].src = 'img/' + path;
// 				targets[index].style.display = 'block';
// 			});
		
// 	});




symboleImg.forEach(function(imgInput, ind) {
	imgInput.onchange = function() {
		var file = imgInput.files[0];
		var reader = new FileReader();

		// console.log(file);
		reader.addEventListener('load', function() {
			// console.log(reader.result);
			targets[ind].src = reader.result;
			targets[ind].style.display = 'block';
		}, false);



		if(file) {
			reader.readAsDataURL(file);
		}
	};
});

