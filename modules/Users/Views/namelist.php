<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1>Data Users</h1>
        <hr>
        <div class="d-flex justify-content-end">
        <a href="<?= base_url('Manage/generate') ?>" class="btn btn-danger me-3">Download PDF</a>
        <a href="<?= base_url('Manage/addname'); ?>" class="btn btn-primary">Add Data</a>
        </div>
        <div class="mt-3">
            <table class="table table-bordered" id="users-list">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data_users)): ?>
                        <?php foreach ($data_users as $user): ?>
                            <tr>
                                <td><?= $user['id']; ?></td>
                                <td><?= $user['name']; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td><?= $user['address']; ?></td>
                                <td><?= $user['phone']; ?></td>
                                <td>
                                    <a href="<?= base_url('Manage/editdata/' . $user['id']); ?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url('Manage/deletdata/' . $user['id']); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-danger">Data not found</div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('success')): ?>
                        <div id="success-message" class="alert alert-success">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>

                </tbody>
            </table>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-2.1.8/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#users-list').DataTable();
        })

        function confirmDelete() {
            return confirm('Are you sure you want to delete this data?');
        }
                setTimeout(function() {
            var message = document.getElementById('success-message');
            if (message) {
                message.style.display = 'none';
            }
        }, 5000);
    </script>


</body>

</html>