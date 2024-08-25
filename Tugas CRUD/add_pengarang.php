<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Pengarang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <a href="pengarang.php" class="btn btn-primary mb-4">Go to Home</a>

        <div class="card">
            <div class="card-header">
                <h3>Add Pengarang</h3>
            </div>
            <div class="card-body">
                <form action="add_pengarang.php" method="post" name="form1">
                    <div class="mb-3">
                        <label for="id_pengarang" class="form-label">ID Pengarang</label>
                        <input type="text" class="form-control" id="id_pengarang" name="id_pengarang" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_pengarang" class="form-label">Nama Pengarang</label>
                        <input type="text" class="form-control" id="nama_pengarang" name="nama_pengarang" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="telp" name="telp" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <button type="submit" class="btn btn-success" name="Submit">Add</button>
                </form>
            </div>
        </div>
    </div>

    <?php
        // Check if form submitted, insert form data into pengarang table.
        if(isset($_POST['Submit'])) {
            $id_pengarang = $_POST['id_pengarang'];
            $nama_pengarang = $_POST['nama_pengarang'];
            $email = $_POST['email'];
            $telp = $_POST['telp'];
            $alamat = $_POST['alamat'];
            
            include_once("connect.php");

            // Insert data into pengarang table
            $result = mysqli_query($conn, "INSERT INTO pengarang (id_pengarang, nama_pengarang, email, telp, alamat) VALUES ('$id_pengarang', '$nama_pengarang', '$email', '$telp', '$alamat')");
            
            // Redirect to pengarang page after insertion
            header("Location: pengarang.php");
        }
    ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
