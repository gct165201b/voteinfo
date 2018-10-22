

	var output = document.querySelectorAll('.output');
	var tf = document.querySelectorAll('.test');


	// console.log(tf);
// console.log(tf.length, output.length);

	tf.forEach( function(input, index) {
		// statements
		input.addEventListener('keyup', function() {
			output[index].innerHTML = "<h4>" + input.placeholder + "</h4>" + input.value ;
		});
	});