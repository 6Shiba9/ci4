<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.css" rel="stylesheet">
</head>
<style>
    .error{
        display: block;
        padding-top: 5px ;
        font-size: 14px;
        color: red;
    }
</style>
<body>
    <div class="container mt-4">
        <h1>Update Data Users</h1>
        <hr>

        <div class="mt-3">
            <form id="update-form" action="<?= base_url('Manage/update-form'); ?>" method="post" name="updatename">
                <input type="hidden" name="id" id='id' value="<?= $user_obj['id'] ?>">
                <div class="form-group mt-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $user_obj['name'] ?>">
                </div>
                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value="<?= $user_obj['email'] ?>">
                </div>
                <div class="input-group mt-4">
                    <span class="input-group-text">Address</span>
                    <input type="text" class="form-control" name="address" aria-label="With textarea" value="<?= $user_obj['address'] ?>"></input>
                </div>
                <div class="form-group mt-3"></div>
                <label for="phone">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?= $user_obj['phone'] ?>">
        </div>
        <button type="submit" class=" mt-3 btn btn-primary">Submit</button>
        <a href="<?= base_url('Manage/namelist'); ?>" class="btn pull-right mt-3 btn-danger">Back</a>
        </form>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <sแcript src="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>


    <script>
        $(document).ready(function() {

           if ($("#update-form").length > 0) {
               $("#update-form").validate({
                   rules: {
                       name: {
                           required: true
                       },
                       email: {
                           required: true,
                            maxlength: 60,
                            email: true
                       },
                       address: {
                           required: true
                       },
                       phone: {
                           required: true,
                           number: true,
                           maxlength: 10
                       }
                   },
                   messages: {
                       name: {
                           required: "Please Enter Name"
                       },
                       email: {
                           required: "Please Enter Email",
                           email: "Please Enter Valid Email",
                           maxlength: "The Email should be less than 60 characters"
                       },
                       address: {
                           required: "Please Enter Address"
                       },
                       phone: {
                           required: "Please Enter Phone Number",
                           number: "Please Enter Valid Phone Number",
                           maxlength: "Please Enter Valid Phone Number"
                       }
                   }
               });
           }
        })
    </script>


</body>

</html>