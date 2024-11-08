<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .error {
        display: block;
        padding-top: 5px;
        font-size: 14px;
        color: red;
    }
</style>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center-md-center">
            <div class="col-md-6">
                <h1>Sign up</h1>
                <hr>
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger"><?= $validation->listErrors(); ?></div>
                <?php endif; ?>
                <form action="<?= base_url('page/save_data');?>" method="post">
                    <div class="md-3">
                        <label for="inputname" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputname" name="name" value="<?= set_value('name'); ?>">
                    </div>
                    <div class="md-3">
                        <label for="inputemail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputemail" name="email" value="<?= set_value('email'); ?>">
                    </div>
                    <div class="md-3">
                        <label for="inputpassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="inputpassword" name="password" >
                    </div>                    
                    <div class="md-3">
                        <label for="inputconfpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="inputconfpassword" name="conf_password" >
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>