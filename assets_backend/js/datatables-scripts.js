$(document).ready(function(){
  $('form .selectize').selectize({create: false});
})
let table = $('.ajaxTable').each(function(){
  let dataUrl = $(this).attr('data-url');
  let filter = $(this).attr('data-filter');
  let filterData = '';
  let searching = true;
  if(filter != undefined && filter != ''){
    searching = false
  }
  // console.log(filterData);
  $(this).dataTable({
    responsive: true,
    serverSide: false,
    processing: true,
    searching: searching,
    ajax: {
      url: dataUrl,
      data: function(data){
        if(filter != undefined){
          filterData = $(filter).serialize();
        }
        return data = filterData;
      }
    },
    initComplete:function(settings, json){
      $('[data-toggle="tooltip"]').tooltip();   

      // $('.select-dropdown').remove();
      // $('.caret').remove();
      // $('select[name="DataTables_Table_0_length"]').addClass('browser-default');
    }
  })
})


const ajaxLoader = {
show: function(){
  Swal.fire({
    type: 'info',
    title: "Tunggu Sebentar Ya",
    text: "Sedang Di Proses",
    // imageUrl: base_url+"/assets_backend/media/ajax-loader.gif",
    showConfirmButton: false,
    allowOutsideClick: false
  });
},
hide: function(){
    Swal.close();
},
showLoading: function(){
  Swal.fire({
    type: 'info',
    title: "Loading...",
    text: "Please wait",
    // imageUrl: base_url+"/assets_backend/media/ajax-loader.gif",
    showConfirmButton: false,
    allowOutsideClick: false
    });
}
}
