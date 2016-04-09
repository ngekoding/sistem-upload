$(document).ready(function(){
	$("#nim").change(function(){
		$("#nothing").html("");
		var nim = $(this).val();
		if (nim.length == 8) {
			$.ajax({
				url: "pages/check-student-name.php",
				type: "post",
				data: "nim="+nim,
				success: function(name) {
					$("#nama").val(name);
					if (name.length == 0) {
						$("#nothing").html("NIM Berlum Terdaftar!");
					}
				},
				error: function(error) {
					alert("Something went wrong!");
				}
			});
		}
	});


    $('#filter').keyup(function () {

        var rex = new RegExp($(this).val(), 'i');
        $('.searchable tr').hide();
        $('.searchable tr').filter(function () {
            return rex.test($(this).text());
        }).show();

    });

    $("#file").change(function() {
    	$("#filename").html($(this).val());
    });
});