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
                            <p class="form-control" id="fname" name="name" placeholder="name@example.com"></p>
                            <label for="fname">First name</label>
                        </div>
                        <div class="form-floating mb-3 w-50">
                            <p class="form-control" id="lname" name="last_name" placeholder="name@example.com"></p>
                            <label for="lname">Last name</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <p class="form-control" id="email" name="email" placeholder="name@example.com"></p>
                        <label for="email">Email address</label>
                    </div>
                    <div class="input_cont d-flex justify-content-space-between gap-3 w-100">
                        <div class="form-floating mb-3">
                            <p class="form-control" id="dob" name="dob" placeholder="name@example.com"></p>
                            <label for="dob">Date of birth</label>
                        </div>
                        <div class="form-floating mb-3">
                            <pclass="form-control" id="phone" name="phone" placeholder="name@example.com"></p>
                            <label for="phone">Phone</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="gender" name="gender">
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                            </select>
                            <label for="gender">Gender</label>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="company" name="company">

                        </select>
                        <label for="company">Company</label>
                    </div>
                    <div class="input_cont d-flex justify-content-space-between gap-3 w-100">
                        <div class="form-floating mb-3 w-50">
                            <select class="form-select" id="country" name="country">
                                <option value="armenia" selected>Armenia</option>
                                <option value="usa">USA</option>
                                <option value="france">France</option>
                                <option value="russia">Russia</option>
                            </select>
                            <label for="country">Country</label>
                        </div>
                        <div class="form-floating mb-3 w-50">
                            <select class="form-select" id="position" name="position">

                            </select>
                            <label for="position">Position</label>
                        </div>
                        <div class="form-floating mb-3 w-50">
                            <p class="form-control" id="salary" name="salary" placeholder="name@example.com"></p>
                            <label for="salary">Salary</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Back</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>