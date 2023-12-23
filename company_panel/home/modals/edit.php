<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="modal fade"  id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../actions/edit.php" method="post">
                        <input type="hidden" id="update_id" name="update_id">
                        <p class="lead text-center text-black display-6">Edit Details</p>
                        <div class="input_cont d-flex justify-content-space-between gap-3 w-100">                            
                            <div class="form-floating mb-3 w-50">
                                <input type="text" class="form-control" id="fname" name="name" placeholder="name@example.com"/>
                                <label for="fname">First name</label>
                            </div>
                            <div class="form-floating mb-3 w-50">
                                <input type="text" class="form-control" id="lname" name="last_name" placeholder="name@example.com"/>
                                <label for="lname">Last name</label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"/>
                            <label for="email">Email address</label>
                        </div>
                        <div class="input_cont d-flex justify-content-space-between gap-3 w-100">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="dob" name="dob" placeholder="name@example.com"/>
                                <label for="dob">Date of birth</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="name@example.com"/>
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
                                    <option id="country" value="">Armenia</option>
                                    <option value="">USA</option>
                                    <option value="">France</option>
                                    <option value="">Russia</option>
                                </select>
                                <label for="country">Country</label>
                            </div>
                            <div class="form-floating mb-3 w-50">
                                <select class="form-select" id="position" name="position">
                                    <option value=""></option>
                                </select>
                                <label for="position">Position</label>
                            </div>
                            <div class="form-floating mb-3 w-50">
                                <input type="number" class="form-control" id="salary" name="salary" placeholder="name@example.com">
                                <label for="salary">Salary</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Chanel</button>
                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>