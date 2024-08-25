<?php
include_once("connect.php");
$id_pengarang = $_GET['id_pengarang'];

// Mengambil data pengarang berdasarkan ID
$pengarang = mysqli_query($conn, "SELECT * FROM pengarang WHERE id_pengarang='$id_pengarang'");

while ($pengarang_data = mysqli_fetch_array($pengarang)) {
    $nama_pengarang = $pengarang_data['nama_pengarang'];
    $email = $pengarang_data['email'];
    $telp = $pengarang_data['telp'];
    $alamat = $pengarang_data['alamat'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengarang</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Edit Pengarang</h2>

    <form action="edit_pengarang.php?id_pengarang=<?php echo $id_pengarang; ?>" method="post">
        <div class="form-group row">
            <label for="nama_pengarang" class="col-sm-2 col-form-label">Nama Pengarang</label>
            <div class="col-sm-10">
                <input type="text" name="nama_pengarang" class="form-control" id="nama_pengarang" value="<?php echo $nama_pengarang; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="email" value="<?php echo $email; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="telp" class="col-sm-2 col-form-label">No Telepon</label>
            <div class="col-sm-10">
                <input type="text" name="telp" class="form-control" id="telp" value="<?php echo $telp; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $alamat; ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <a href="pengarang.php" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>

    <?php
        if (isset($_POST['update'])) {
            $nama_pengarang = $_POST['nama_pengarang'];
            $email = $_POST['email'];
            $telp = $_POST['telp'];
            $alamat = $_POST['alamat'];

            $result = mysqli_query($conn, "UPDATE pengarang SET nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_pengarang = '$id_pengarang'");

            header("Location: pengarang.php");
        }
    ?>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
