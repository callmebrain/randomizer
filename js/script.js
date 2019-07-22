$( document ).ready(function() {
	console.log( "ready!" );

	var btnSubmit = $('#btnRandom');
	var items = [];

	btnSubmit.on('click', function(e) {
		e.preventDefault();

		var rand = randomize(0, items.length);	// get random number
		rand = 7;
		var txt = "And the Winner is " + items[rand]; // output text
		console.log('winner ' + items[rand])

		var spin = items.length * 3;
		var winner = spin + rand;

		function rotator(arr) {
			console.log(arr.length + rand)
			var total = arr.length * 80 + rand;
			var counter = 0;
			var iterator = function (index) {
				if (index >= total) {
					$('.winner').text(arr[index]);
					return;
				} 
				counter++;
				if(counter >= arr.length) {
					counter = 0;
				}
				$('.winner').text(arr[counter]);
				// console.log(arr[index]);
				
				setTimeout(function () {
					iterator(++index);

				}, 1);
			};

			iterator(0);
		};

		rotator(items)
	})

	function randomize(min, max) {
		var num = Math.floor(Math.random() * max) + min;
		return num;
	}

	$.getJSON( "list.json", function( data ) {
		
		$.each( data, function( key, val ) {
			items.push( val.name );
		});
	});




});