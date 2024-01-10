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
      //       {
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
    //   {
    //       className: 'btn-warning',
    //       extend: 'pdf',
    //       text: '<i class="fa fa-file-pdf-o"></i>',
    //       titleAttr: 'PDF',

    //       exportOptions: {
    //           columns: ':visible'
    //       }
    //   },
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
              text: 'Restore'
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

    $('#datatable_search').DataTable({
      "paging": true,
      "scrollX": true,
      "fixedHeader": true,
      "responsive": true,
      "lengthChange": true,
      "lengthMenu": [[10, 25, 50, 100 , 250 , -1], [10, 25, 50, 100 , 250 , "All"]],
      "searching": true,
      "ordering": true,
      "info": true,
      "order": [],
      "autoWidth": false,
      "language": {
//            "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json"
            "url": "/js/admin/en/en.json"
        },
      "fnInitComplete": function () {
            $(".dataTables_length .select").select2();
        },
      //"dom": 'Blfrtip',
      buttons: [
    //       {
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
            text: 'Restore'
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
    $(".select2").select2();

    $(".select2-tags").select2({
        tags:true,
//        maximumSelectionLength: 3
    });

});
