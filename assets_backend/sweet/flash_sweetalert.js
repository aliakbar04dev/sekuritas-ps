const flashData = $(".flash-data").data('flashdata');

if (flashData) {
    Swal.fire(
    	'Berhasil ' + flashData,
        'Umpan Balik & Pengembangan',
        'success'
    );

}