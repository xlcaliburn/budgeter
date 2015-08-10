var date,description, debit, credit;
var file,fileContents;
window.onload = function() {

	var fileInput = document.getElementById('fileInput');
	var fileDisplayArea = document.getElementById('fileDisplayArea');

	fileInput.addEventListener('change', function(e) {
		file = fileInput.files[0];
		var reader = new FileReader();

		reader.onload = function(e) {
			fileContents = reader.result;
			var lines = fileContents.split('\n');
			
			var table = '<table border="1" cellspacing="1" cellpadding="5"><tr>\
							<td>Date</td>\
							<td>Description</td>\
							<td>Debit</td>\
							<td>Credit</td>\
						</tr>';

			for(var i = 0;i < lines.length;i++) {
				if (!!lines[i] && lines[i].indexOf("PAYMENT")== -1 ) {
					var col = lines[i].split(',');

					date = new Date(Date.parse(col[0]));
					date = (date.getMonth()+1) +"/"+ date.getDate() +"/"+ date.getFullYear();
					
					description = col[1];
					debit = col[2] ? parseFloat(col[2]).toFixed(2) : 0; 
					credit = col[3] ? parseFloat(col[3]).toFixed(2) : 0;
										
					table += '<tr id=\"displayRow'+i+'\"+>\
								<td>'+date+'</td>\
								<td>'+description+'</td>\
								<td>'+debit+'</td>\
								<td>'+credit+'</td>\
							</tr>';
				}
			}
			table += '</table>';
			fileDisplayArea.innerHTML = table;
		}	

		reader.readAsText(file);	

	});
}