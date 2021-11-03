$(document).ready(function () {
    $("#add-name").focus();

    var table = $('#myTable').DataTable({

        "ajax": "/getData",
        responsive: true,
        "columns": [{
            "data": "id"
        },
        {
            "data": "name"
        },
        {
            "data": "email"
        },
        {
            "data": "designation"
        },
        {
            "data": "salary"
        },
        {
            "data": "date"
        },
        

        {
            "data": null,
            "defaultContent": "<button type='button' class='btn btn-primary' id='btnEdit' action='btnEdit'> <i class='fa fa-pencil-square-o' aria-hidden='true'></i> Edit</button><button style='margin-left:1rem;'; type='button' class='btn btn-danger ml-1' id='btnDelete' action='btnDelete'><i class='fa fa-trash' aria-hidden='true'></i> Delete</button>"
        },
        ]
    });

    $("#myTable tbody").on("click", "button[action=btnEdit]", function (event) {
        var data = table.row($(this).parents('tr')).data();
        var oTable = $("#myTable").dataTable();
        $(oTable.fnSettings().aoData).each(function () {
            $(this.nTr).removeClass('success');
        });

        $(event.target.parentNode.parentNode).addClass('success');
        console.log(data);
          
        $('#hiddenID').val(data.id);
        $('#add-name').val(data.name);
        $('#add-age').val(data.salary);
        $('#add-street').val(data.designation);
        $('#add-email').val(data.email);
        $('#add-date').val(data.date);

        $('#addStudent').modal('show');
     
    });


    //Insertion part start here
    $('#addStudentData').on('submit', function (e) {
        e.preventDefault();

        var hid_code = $('#hiddenID').val();
        if (hid_code == '') {
            alert("add");
            oper = 'studentadd';
        }
        else {
            alert("update");
            oper = 'studentUpdate';
        }
        $.ajax({
            type: "POST",
            url: oper,
            data: $('#addStudentData').serialize(),

            success: function (response) {
                // console.log(response);

                $('#myTable').DataTable().ajax.reload();
                $('#addStudent').modal('hide');
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr["success"]("Record Added Successfully")
                $('#addStudentData').each(function () {
                    this.reset();
                });
            },
            error: function (error) {
                alert(error);

                console.log(error);
                // console.log(error.responseText);
                // var res = jQuery.parseJSON(error.responseText);
                // console.log(res);
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr["error"]("Unsuccess")
                $('#addStudentData').each(function () {
                    this.reset();
                });

                console.log("res"+res);
                console.log(res.errors.name);
                console.log(res.errors.age);
                console.log(res.errors.street);
                console.log(res.errors.email);

                $('#name_error').html(res.errors.name);
                $('#age_error').html(res.errors.age);
                $('#street_error').html(res.errors.street);
                $('#email_error').html(res.errors.email);
                // alert("data not saved");

            }
        });
    });

    // $('#addModalBtn').on('click', function () {
    //     // $('#addStudent').modal('show');
    //     $("#addStudent").on('show.bs.modal', function () {
    //         alert('The modal will be displayed now!');
    //     });
    // })
    //Insertion part End here



    //Delection Part Start Here
    $("#myTable tbody").on("click", "button[action=btnDelete]", function (event) {
        var data = table.row($(this).parents('tr')).data();
        var oTable = $("#myTable").dataTable();
        $(oTable.fnSettings().aoData).each(function () {
            $(this.nTr).removeClass('danger');
        });
        $(event.target.parentNode.parentNode).addClass('danger');
        $('#deleteModal').modal('show');
        $('#formtextID').val(data.id);
        $('#studentData').html(data.name);
        $('#deleteFormID').on('submit', function (e) {
            e.preventDefault();
            console.log('submit delete');
            var id = $('#formtextID').val();
            // console.log(id);

            $.ajax({
                type: "delete",
                url: "/studentdelete/" + id,
                data: $('#deleteFormID').serialize(),
                success: function (response) {
                    console.log(response);
                    $('#myTable').DataTable().ajax.reload();
                    $('#deleteModal').modal('hide');
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    toastr["error"]("Record Deleted Successfully")
                    //location.reload();
                },
                error: function (error) {
                    console.log(error);

                }
            })
        })
    });
    //Delection Part End Here




  



    
});













