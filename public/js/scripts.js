var dataTable;

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": true,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': "application/json",
        'Content-Type': "application/json",
    }
});

function blockPage(){
    KTApp.blockPage({
        overlayColor: '#000000',
        state: 'primary',
        message: 'Garaşyň...'
    });
}

function unblockPage(){
    KTApp.unblockPage();
}

function sendPostMethodRequest(url, data, successCallback){
    $.ajax({
        type: 'POST',
        url: url,
    data: data,
    beforeSend: function() {
        blockPage();
    },
    success: successCallback(response),
    error: function(error) {
        toastr.error("Bagyşlaň, näsazlyk ýüze çykdy");
        console.log(error);
    },
    complete: function() {
        unblockPage();
    }
});
}
