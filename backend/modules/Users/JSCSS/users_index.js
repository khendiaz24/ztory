var UserLists;
$(document).ready(function() {
	UserLists = $("#UserLists").DataTable({
		"bLengthChange": false,
		"pageLength": 20,
		"ajax": BASE_URL + "/admin/users/getallusers",
		"order": [[ 4, "asc" ]],
		"columns": [
			{ "data": "id", "orderable": false, "width": "1%" },
			{ "data": "name", "orderable": true, "width": "20%" },
			{ "data": "email", "orderable": true, "width": "20%" },
			{ "data": "contactno", "orderable": false, "width": "10%" },
			{ "data": "position", "orderable": true, "width": "20%" },
			{ "data": "role", "orderable": true, "width": "20%" },
			{ "data": "actions", "orderable": false, "width": "9%" }
		]
	});
});

function reset_account(id) {
	alert("NICE");

	var c = confirm("Are you sure you want to reset this account?");

	if (c) {
		$.ajax({
			type: "POST",
			async: false,
			url: BASE_URL + "/admin/users/resetaccountbyid",
			data: {
			    "id": id,
			},
			error: function(req, error) {
		    	console.log(req.statusText);
			},
			success: function(msg) {
				var xMsg = msg.split("|");

				if (xMsg[0] == "ok") {
					alert(xMsg[1]);
				}
			}
		});
	}
}
