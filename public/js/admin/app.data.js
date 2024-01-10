$(document).ready(function() {
    //Date range picker
    $("#reservation").daterangepicker();
    //Date range picker with time picker
    $("#reservationtime").daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        format: "MM/DD/YYYY h:mm A"
    });
    //Date range as a button
    $("#daterange-btn").daterangepicker({
            ranges: {
                Today: [moment(), moment()],
                Yesterday: [
                    moment().subtract(1, "days"),
                    moment().subtract(1, "days")
                ],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [
                    moment().startOf("month"),
                    moment().endOf("month")
                ],
                "Last Month": [
                    moment()
                    .subtract(1, "month")
                    .startOf("month"),
                    moment()
                    .subtract(1, "month")
                    .endOf("month")
                ]
            },
            startDate: moment().subtract(29, "days"),
            endDate: moment()
        },
        function(start, end) {
            $("#daterange-btn span").html(
                start.format("MMMM D, YYYY") +
                " - " +
                end.format("MMMM D, YYYY")
            );
        }
    );

    //Date picker
    // $(".datepicker").datepicker({
    //     format: "yyyy-mm-dd",
    //     autoclose: true
    // });

    //Date picker
    $(".datetimepicker").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
        autoclose: true,
        weekStart: 6,
        clearBtn: true,
        autoclose: true
    });

    $(".datepicker").datepicker({
        format: "yyyy-mm-dd",
        weekStart: 6,
        startView: 0,
        clearBtn: true,
        autoclose: true
    });

    $('.datepicker-month').datepicker({
        minViewMode: 1,
        format: "yyyy-mm",
        autoclose: true
    });

    $('.datepicker-year').datepicker({
        minViewMode: 2,
        format: "yyyy",
        autoclose: true
    });

    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-green, input[type="radio"].flat-green').iCheck({
        checkboxClass: "icheckbox_flat-green",
        radioClass: "iradio_flat-green"
    });

    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: "icheckbox_flat-red",
        radioClass: "iradio_flat-red"
    });

    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });
    //Colorpicker
    $(".colorpicker-select").colorpicker();
    $(".colorpicker-select-second").colorpicker();
    //color picker with addon
    //    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
        showInputs: false
    });

    setTimeout(function() {
        $(".alert-disable").remove();
    }, 2500);

    // $(".corptia-form").on('submit', function(e){
    //     e.preventDefault();
    //     var form = $(this);

    //     form.parsley().validate();

    //     if (form.parsley().isValid()){
    //     }
    // });
});

function toggleV2(source, name, target) {
    if(target == "all") {
        checkboxes = document.getElementsByName(name + '[]');
    }else {
        checkboxes = document.getElementsByClassName(name);
    }
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
    }
}
