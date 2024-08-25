<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Penerbit</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <a href="penerbit.php" class="btn btn-primary mb-4">Go to Home</a>

        <div class="card">
            <div class="card-header">
                <h3>Add Penerbit</h3>
            </div>
            <div class="card-body">
                <form action="add_penerbit.php" method="post" name="form1">
                    <div class="mb-3">
                        <label for="id_penerbit" class="form-label">ID Penerbit</label>
                        <input type="text" class="form-control" id="id_penerbit" name="id_penerbit" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_penerbit" class="form-label">Nama Penerbit</label>
                        <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" required>
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
        // Check if form submitted, insert form data into penerbit table.
        if(isset($_POST['Submit'])) {
            $id_penerbit = $_POST['id_penerbit'];
            $nama_penerbit = $_POST['nama_penerbit'];
            $email = $_POST['email'];
            $telp = $_POST['telp'];
            $alamat = $_POST['alamat'];
            
            include_once("connect.php");

            // Insert data into penerbit table
            $result = mysqli_query($conn, "INSERT INTO penerbit (id_penerbit, nama_penerbit, email, telp, alamat) VALUES ('$id_penerbit', '$nama_penerbit', '$email', '$telp', '$alamat')");
            
            // Redirect to penerbit page after insertion
            header("Location: penerbit.php");
        }
    ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
