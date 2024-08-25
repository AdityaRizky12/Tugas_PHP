<!DOCTYPE html>
<html>
<head>
    <title>Edit Penerbit</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Penerbit</h2>
        <a href="penerbit.php" class="btn btn-primary mb-3">Go to Home</a>

        <?php
        include_once("connect.php");
        $id_penerbit = $_GET['id_penerbit'];

        $penerbit = mysqli_query($conn, "SELECT * FROM penerbit WHERE id_penerbit='$id_penerbit'");

        while($penerbit_data = mysqli_fetch_array($penerbit)) {
            $nama_penerbit = $penerbit_data['nama_penerbit'];
            $email = $penerbit_data['email'];
            $telp = $penerbit_data['telp'];
            $alamat = $penerbit_data['alamat'];
        }
        ?>

        <form action="edit_penerbit.php?id_penerbit=<?php echo $id_penerbit; ?>" method="post">
            <div class="form-group">
                <label for="nama_penerbit">Nama Penerbit</label>
                <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="telp">No Telepon</label>
                <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $telp; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-success">Update</button>
        </form>

        <?php
        if(isset($_POST['update'])) {
            $nama_penerbit = $_POST['nama_penerbit'];
            $email = $_POST['email'];
            $telp = $_POST['telp'];
            $alamat = $_POST['alamat'];

            include_once("connect.php");

            $result = mysqli_query($conn, "UPDATE penerbit SET nama_penerbit = '$nama_penerbit', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id_penerbit = '$id_penerbit'");

            if ($result) {
                echo '<div class="alert alert-success mt-3">Update successful!</div>';
                header("refresh:2;url=penerbit.php");
            } else {
                echo '<div class="alert alert-danger mt-3">Update failed!</div>';
            }
        }
        ?>
    </div>

    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
