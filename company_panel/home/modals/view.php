<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="modal fade"  id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">View</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="lead text-center text-black display-6">View Details</p>
                    <div class="input_cont d-flex justify-content-space-between gap-3 w-100">                            
                        <div class="form-floating mb-3 w-50">
                            <p class="form-control" id="view_fname" name="name" placeholder="name@example.com"></p>
                            <label for="view_fname">First name</label>
                        </div>
                        <div class="form-floating mb-3 w-50">
                            <p class="form-control" id="view_lname" name="last_name" placeholder="name@example.com"></p>
                            <label for="view_lname">Last name</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <p class="form-control" id="view_email" name="email" placeholder="name@example.com"></p>
                        <label for="view_email">Email address</label>
                    </div>
                    <div class="input_cont d-flex justify-content-space-between gap-3 w-100">
                        <div class="form-floating mb-3 w-50">
                            <p class="form-control" id="view_dob" name="dob" placeholder="name@example.com"></p>
                            <label for="view_dob">Date of</label>
                        </div>
                        <div class="form-floating mb-3 w-50">
                            <p class="form-control" id="view_phone" name="phone" placeholder="name@example.com"></p>
                            <label for="view_phone">Phone</label>
                        </div>
                        <div class="form-floating mb-3 w-50">
                            <p class="form-control" id="view_gender" name="gender"></p>
                            <label for="view_gender">Gender</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <p class="form-control" id="view_company" name="company"></p>
                        <label for="view_company">Company</label>
                    </div>
                    <div class="form-floating mb-3">
                        <p class="form-control" id="view_registered" name="registered"></p>
                        <label for="view_registered">Registered Time</label>
                    </div>
                    <div class="input_cont d-flex justify-content-space-between gap-3 w-100">
                        <div class="form-floating mb-3 w-50">
                            <p class="form-control" id="view_country" name="country"></p>
                            <label for="view_country">Country</label>
                        </div>
                        <div class="form-floating mb-3 w-50">
                            <p class="form-control" id="view_position" name="position"></p>
                            <label for="view_position">Position</label>
                        </div>
                        <div class="form-floating mb-3 w-50">
                            <p class="form-control" id="view_salary" name="salary" placeholder="name@example.com"></p>
                            <label for="view_salary">Salary</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>