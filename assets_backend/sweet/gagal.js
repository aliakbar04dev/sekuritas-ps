const flashData = $(".flash-data").data('flashdata');

if (flashData) {
    Swal.fire(
    	'Gagal ',
        flashData,
        'error'
    );

}