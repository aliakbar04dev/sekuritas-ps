const flashData = $(".flash-data").data('flashdata');

if (flashData) {
    Swal.fire(
    	'Berhasil Masuk ',
        flashData,
        'success'
    );

}