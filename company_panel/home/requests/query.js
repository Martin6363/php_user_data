// Edit data.
$(document).ready(function () {
    $('.editBtn').on('click', function () {
        let employeeId = $(this).closest('tr').find('[name="action_id"]').val();

        $.ajax({
            type: 'POST',
            url: '../actions/edit.php',
            data: { id: employeeId },
            dataType: 'json',
            success: function (response) {
                $('#update_id').val(response.id);
                $('#fname').val(response.first_name);
                $('#lname').val(response.last_name);
                $('#email').val(response.email);
                $('#dob').val(response.dob);
                $('#phone').val(response.phone_number);
                $('#gender').val(response.gender);
                $('#country').val(response.country);
                $('#position').val(response.position_id);
                $('#salary').val(response.salary_amount);
            },
            error: function () {
                console.log('Error fetching employee data.');
            }
        });
    });


    // Delete data.
    $('.deleteBtn').on('click', function () {
        let idToDelete = $(this).closest('tr').find('[name="action_id"]').val();
        $('#exampleModal3').modal('show');
        $.ajax({
            type: 'POST',
            url: '../actions/delete.php',
            data: { id: idToDelete },
            dataType: 'json',
            success: function (response) {
                $('#delete_id').val(response.id);
                $('#deleted_name').html(response.first_name+ ' ' + response.last_name);
            },
            error: function () {
                console.log('Error fetching delete id.');
            }
        })
    });


    // View data.
    $('.viewBtn').on('click', function () {
        let idToView = $(this).closest('tr').find('[name="action_id"]').val();
        $.ajax({
            type: 'GET',
            url: '../actions/view.php',
            data: { id: idToView },
            dataType: 'json',
            success: function (response) {
                $('#view_fname').html(response.first_name);
                $('#view_lname').html(response.last_name);
                $('#view_email').html(response.email);
                $('#view_dob').html(response.dob);
                $('#view_phone').html(response.phone_number);
                $('#view_gender').html(response.gender);
                $('#view_registered').html(response.create_at);
                $('#view_fname').html(response.first_name);
                $('#view_country').html(response.country);
                $('#view_company').html(response.company_name);
                $('#view_position').html(response.position_name);
                $('#view_salary').html(response.salary_amount);
                $('#exampleModal4').modal('show');
            },
            error: function () {
                console.log('Error fetching employee data for view.');
            }
        })
    })


    // Search data.
    let searchTimeout;
    $('#search').on("keyup", function () {
        let searchValue = $(this).val();
        clearTimeout(searchTimeout);

        searchTimeout = setTimeout(function() {
            $.ajax({
                method: 'GET',
                url: '../actions/search.php',
                data: {search: searchValue},
                beforeSend:function() {
                    $("#showData").html("<span>Searching...</span>");
                },
                success: function(response) {
                    $("#showData").html(response);
                }
            });
    }, 1000);
    });

    
    // Filter data.
    $('#filter_btn').on('click', function () {
        let positionValue = $('#filter_position').val();
        let genderValue = $('#filter_gender').val();
        $.ajax({
            url: "../actions/filter.php",
            type: 'GET',
            data: { filter_position: positionValue, filter_gender: genderValue },
            beforeSend: function () {
                $("#showData").html("<span>Loading...</span>");
            },
            success: function (data) {
                $("#showData").html(data);
            }
        });
    });


    // Sort data.
    $('#sort_id').on('change', function () {
        let value = $('#sort_id').val();

        $.ajax({
            url: '../actions/sort_by_id.php',
            type: 'GET',
            data: { sort: value },
            beforeSend:function() {
                    $("#showData").html("<span>Sorting...</span>");
                },
            success:function(data) {
                $("#showData").html(data);
                console.log(data);
            }
        });
    })


    // Refresh Page.
    $("#refreshBtn").on("click",function(){
        window.location.reload();
    });

});