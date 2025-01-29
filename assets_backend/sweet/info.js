const flashData = $(".flash-data").data('flashdata');

if (flashData) {
    Swal.fire(
    	'Info ',
        flashData,
        'info'
    );

}