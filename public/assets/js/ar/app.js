$(document).ready(function() {

    $('#datatable').DataTable({
        "paging": false,
        "scrollX": true,
        "fixedHeader": true,
        "responsive": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        //        "order": [[0, "desc"]],
        "order": [],
        //"dom": 'Blfrtip',
        buttons: [
            // {
            //     className: 'btn-success',
            //     text: '<i class="fa fa-floppy-o"></i>',
            //     titleAttr: 'Json',
            //     exportOptions: {
            //         columns: ':visible'
            //     },
            //     action: function (e, dt, button, config) {
            //         var data = dt.buttons.exportData();
            //         $.fn.dataTable.fileSave(
            //             new Blob([JSON.stringify(data)])
            //             // 'Export.json'
            //         );
            //     }
            // },
            {
                className: 'btn-info',
                extend: 'copy',
                text: '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            // {
            //     className: 'btn-primary',
            //     extend: 'csv',
            //     text: '<i class="fa fa-file-text-o"></i>',
            //     titleAttr: 'CSV',
            //     exportOptions: {
            //         columns: ':visible'
            //     }
            // },
            {
                className: 'btn-danger',
                extend: 'excel',
                text: '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            // {
            //     className: 'btn-warning',
            //     extend: 'pdf',
            //     text: '<i class="fa fa-file-pdf-o"></i>',
            //     titleAttr: 'PDF',

            //     exportOptions: {
            //         columns: ':visible'
            //     }
            // },
            {
                className: 'btn-success',
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                className: 'btn-primary',
                extend: 'colvis',
                collectionLayout: 'fixed two-column',
                //            postfixButtons: [ 'colvisRestore' ],
                postfixButtons: [{
                    extend: 'colvisRestore',
                    text: 'إعادة ضبط'
                }],
                text: '<i class="fa fa-eye-slash"></i>',
                titleAttr: 'Show/hide'
            },
            // {
            //     className: 'btn-primary',
            //     extend: 'colvisRestore',
            //     text: '<i class="fa fa-repeat"></i>',
            //     titleAttr: 'Reset'
            // }
        ],
        columnDefs: [{
            visible: false
        }],
        "language": {
            //            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
            "url": "/js/admin/ar/ar.json"
        }
    });

    $('#datatable_export').DataTable({
        "paging": false,
        "scrollX": true,
        "fixedHeader": true,
        "responsive": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        //        "order": [[0, "desc"]],
        "order": [],
        "dom": 'Blfrtip',
        buttons: [
            // {
            //     className: 'btn-success',
            //     text: '<i class="fa fa-floppy-o"></i>',
            //     titleAttr: 'Json',
            //     exportOptions: {
            //         columns: ':visible'
            //     },
            //     action: function (e, dt, button, config) {
            //         var data = dt.buttons.exportData();
            //         $.fn.dataTable.fileSave(
            //             new Blob([JSON.stringify(data)])
            //             // 'Export.json'
            //         );
            //     }
            // },
            {
                className: 'btn-info',
                extend: 'copy',
                text: '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            // {
            //     className: 'btn-primary',
            //     extend: 'csv',
            //     text: '<i class="fa fa-file-text-o"></i>',
            //     titleAttr: 'CSV',
            //     exportOptions: {
            //         columns: ':visible'
            //     }
            // },
            {
                className: 'btn-danger',
                extend: 'excel',
                text: '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            // {
            //     className: 'btn-warning',
            //     extend: 'pdf',
            //     text: '<i class="fa fa-file-pdf-o"></i>',
            //     titleAttr: 'PDF',

            //     exportOptions: {
            //         columns: ':visible'
            //     }
            // },
            {
                className: 'btn-success',
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                className: 'btn-primary',
                extend: 'colvis',
                collectionLayout: 'fixed two-column',
                //            postfixButtons: [ 'colvisRestore' ],
                postfixButtons: [{
                    extend: 'colvisRestore',
                    text: 'إعادة ضبط'
                }],
                text: '<i class="fa fa-eye-slash"></i>',
                titleAttr: 'Show/hide'
            },
            // {
            //     className: 'btn-primary',
            //     extend: 'colvisRestore',
            //     text: '<i class="fa fa-repeat"></i>',
            //     titleAttr: 'Reset'
            // }
        ],
        columnDefs: [{
            visible: false
        }],
        "footerCallback": function(row, data, start, end, display) {
            var api = this.api(),
                data;

            // converting to interger to find total
            var intVal = function(i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                    i : 0;
            };

            // computing column Total of the complete result
            var amount = api
                .column(8, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var paid = api
                .column(9, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var under_collection = api
                .column(10, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var remaining = api
                .column(11, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var discount = api
                .column(12, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            var total = api
                .column(13, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            var contract_paid = api
                .column(14, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var contract_remaining = api
                .column(15, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            var contract_total = api
                .column(16, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);
            // Update footer by showing the total with the reference of the column index
            $(api.column(0).footer()).html('Total');
            $(api.column(8).footer()).html(amount);
            $(api.column(9).footer()).html(paid);
            $(api.column(10).footer()).html(under_collection);
            $(api.column(11).footer()).html(remaining);
            $(api.column(12).footer()).html(discount);
            $(api.column(13).footer()).html(total);
            $(api.column(14).footer()).html(contract_paid);
            $(api.column(15).footer()).html(contract_remaining);
            $(api.column(16).footer()).html(contract_total);
        },
        "language": {
            //            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
            "url": "/js/admin/ar/ar.json"
        }
    });

    $('#datatable_log').DataTable({
        "paging": false,
        "scrollX": true,
        "fixedHeader": true,
        "responsive": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        //        "order": [[0, "desc"]],
        "order": [],
        "dom": 'Blfrtip',
        buttons: [
            // {
            //     className: 'btn-success',
            //     text: '<i class="fa fa-floppy-o"></i>',
            //     titleAttr: 'Json',
            //     exportOptions: {
            //         columns: ':visible'
            //     },
            //     action: function (e, dt, button, config) {
            //         var data = dt.buttons.exportData();
            //         $.fn.dataTable.fileSave(
            //             new Blob([JSON.stringify(data)])
            //             // 'Export.json'
            //         );
            //     }
            // },
            {
                className: 'btn-info',
                extend: 'copy',
                text: '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            // {
            //     className: 'btn-primary',
            //     extend: 'csv',
            //     text: '<i class="fa fa-file-text-o"></i>',
            //     titleAttr: 'CSV',
            //     exportOptions: {
            //         columns: ':visible'
            //     }
            // },
            {
                className: 'btn-danger',
                extend: 'excel',
                text: '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            // {
            //     className: 'btn-warning',
            //     extend: 'pdf',
            //     text: '<i class="fa fa-file-pdf-o"></i>',
            //     titleAttr: 'PDF',

            //     exportOptions: {
            //         columns: ':visible'
            //     }
            // },
            {
                className: 'btn-success',
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                className: 'btn-primary',
                extend: 'colvis',
                collectionLayout: 'fixed two-column',
                //            postfixButtons: [ 'colvisRestore' ],
                postfixButtons: [{
                    extend: 'colvisRestore',
                    text: 'إعادة ضبط'
                }],
                text: '<i class="fa fa-eye-slash"></i>',
                titleAttr: 'Show/hide'
            },
            // {
            //     className: 'btn-primary',
            //     extend: 'colvisRestore',
            //     text: '<i class="fa fa-repeat"></i>',
            //     titleAttr: 'Reset'
            // }
        ],
        columnDefs: [{
            visible: false
        }],
        "language": {
            //            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
            "url": "/js/admin/ar/ar.json"
        }
    });

    $('#datatable_search').DataTable({
        "paging": true,
        "scrollX": true,
        "fixedHeader": true,
        "responsive": true,
        "lengthChange": true,
        "lengthMenu": [
            [10, 25, 50, 100, 250, -1],
            [10, 25, 50, 100, 250, "الكل"]
        ],
        "searching": true,
        "ordering": true,
        "info": true,
        "order": [],
        "autoWidth": false,
        "language": {
            //            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
            "url": "/js/admin/ar/ar.json"
        },
        "fnInitComplete": function() {
            $(".dataTables_length .select").select2({
                dir: 'rtl'
            });
        },
        //"dom": 'Blfrtip',

        buttons: [
            // {
            //     className: 'btn-success',
            //     text: '<i class="fa fa-floppy-o"></i>',
            //     titleAttr: 'Json',
            //     exportOptions: {
            //         columns: ':visible'
            //     },
            //     action: function (e, dt, button, config) {
            //         var data = dt.buttons.exportData();
            //         $.fn.dataTable.fileSave(
            //             new Blob([JSON.stringify(data)]),
            //             'Export.json'
            //         );
            //     }
            // },
            {
                className: 'btn-info',
                extend: 'copy',
                text: '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            // {
            //     className: 'btn-primary',
            //     extend: 'csv',
            //     text: '<i class="fa fa-file-text-o"></i>',
            //     titleAttr: 'CSV',
            //     exportOptions: {
            //         columns: ':visible'
            //     }
            // },
            {
                className: 'btn-danger',
                extend: 'excel',
                text: '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            // {
            //     className: 'btn-warning',
            //     extend: 'pdf',
            //     text: '<i class="fa fa-file-pdf-o"></i>',
            //     titleAttr: 'PDF',

            //     exportOptions: {
            //         columns: ':visible'
            //     }
            // },
            {
                className: 'btn-success',
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                className: 'btn-primary',
                extend: 'colvis',
                collectionLayout: 'fixed two-column',
                //            postfixButtons: [ 'colvisRestore' ],
                postfixButtons: [{
                    extend: 'colvisRestore',
                    text: 'إعادة ضبط'
                }],
                text: '<i class="fa fa-eye-slash"></i>',
                titleAttr: 'Show/hide'
            },
            // {
            //     className: 'btn-primary',
            //     extend: 'colvisRestore',
            //     text: '<i class="fa fa-repeat"></i>',
            //     titleAttr: 'Reset'
            // }
        ],
        columnDefs: [{
            visible: false
        }],

    });

    //Initialize Select2 Elements
    $(".select2").select2({
        dir: 'rtl'
    });

    $(".select2-tags").select2({
        dir: 'rtl',
        tags: true
    });

});