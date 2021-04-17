$.extend( true, $.fn.dataTable.defaults, {
    responsive: true,
    lengthMenu: [50, 75, 100, 150],
    pageLength: 50,
    buttons: [
        {
            'extend' : 'print',
            customize: function(win)
            {
                let css = '@page { size: landscape; }',
                    head = win.document.head || win.document.getElementsByTagName('head')[0],
                    style = win.document.createElement('style');

                style.type = 'text/css';
                style.media = 'print';

                if (style.styleSheet)
                {
                    style.styleSheet.cssText = css;
                }
                else
                {
                    style.appendChild(win.document.createTextNode(css));
                }

                head.appendChild(style);
            },
            exportOptions: {
                columns: 'th:not(:last-child)'
            },
        },
        {
            'extend' : 'excelHtml5',
            exportOptions: {
                columns: 'th:not(:last-child)'
            }
        },
        {
            'extend' : 'pdfHtml5',
            exportOptions: {
                columns: 'th:not(:last-child)'
            },
            orientation: 'landscape'
        }
    ],
    "language": {
        "processing": "Garaşyň, ýüklenýär...",
        "loadingRecords": "Garaşyň, ýüklenýär...",
        "lengthMenu": "Her sahypada: _MENU_ ",
        "search": "Gözle ",
        "zeroRecords": "Hiç hili magalumat ýok ",
        "emptyTable": "Hiç hili magalumat goşulmandyr ",
        "info": "Sahypa: _PAGE_. Jemi sahypa sany: _PAGES_ ",
        "infoEmpty": "Hiç hili maglumat tapylmady ",
        "infoFiltered": "(_MAX_ maglumatdan filtirlendi) ",
        "paginate": {
            "first":    "Ilkinji",
            "last":    "Soňky",
            "next":    "Indiki",
            "previous": "Yzky"
        },
        "select": {
            "rows": "%d sany seçildi."
        }
    }
});
