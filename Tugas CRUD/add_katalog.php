<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "perpus");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch katalog data for editing
$id_katalog = isset($_GET['id_katalog']) ? $_GET['id_katalog'] : '';
$nama_katalog = '';
$buku_data = [];

if ($id_katalog) {
    $katalog_query = mysqli_query($conn, "SELECT * FROM katalog WHERE id_katalog='$id_katalog'");
    $katalog_data = mysqli_fetch_array($katalog_query);

    if ($katalog_data) {
        $nama_katalog = $katalog_data['nama'];
    }

    // Fetch related buku data
    $buku_query = mysqli_query($conn, "SELECT * FROM buku WHERE id_katalog='$id_katalog'");
    $buku_data = mysqli_fetch_all($buku_query, MYSQLI_ASSOC);
}

// Fetch all buku for dropdown
$all_buku_query = mysqli_query($conn, "SELECT isbn, judul FROM buku");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $id_katalog ? 'Edit Katalog' : 'Add Katalog'; ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <a href="katalog.php" class="btn btn-primary mb-4">Go to Katalog</a>

        <div class="card">
            <div class="card-header">
                <h3><?php echo $id_katalog ? 'Edit Katalog' : 'Add Katalog'; ?></h3>
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="id_katalog" class="form-label">ID Katalog</label>
                        <input type="text" class="form-control" id="id_katalog" name="id_katalog" value="<?php echo htmlspecialchars($id_katalog); ?>" <?php echo $id_katalog ? 'readonly' : 'required'; ?>>
                    </div>
                    <div class="mb-3">
                        <label for="nama_katalog" class="form-label">Nama Katalog</label>
                        <input type="text" class="form-control" id="nama_katalog" name="nama_katalog" value="<?php echo htmlspecialchars($nama_katalog); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="isbn" class="form-label">Buku</label>
                        <select class="form-select" id="isbn" name="isbn" required>
                            <option value="">Pilih Buku</option>
                            <?php
                            while ($buku = mysqli_fetch_array($all_buku_query)) {
                                $selected = '';
                                if ($id_katalog) {
                                    foreach ($buku_data as $buku_item) {
                                        if ($buku_item['isbn'] == $buku['isbn']) {
                                            $selected = "selected";
                                            break;
                                        }
                                    }
                                }
                                echo "<option value='" . htmlspecialchars($buku['isbn']) . "' $selected>" . htmlspecialchars($buku['judul']) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="qty_stok" class="form-label">Qty Stok</label>
                        <input type="number" class="form-control" id="qty_stok" name="qty_stok" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_pinjam" class="form-label">Harga Pinjam</label>
                        <input type="number" step="0.01" class="form-control" id="harga_pinjam" name="harga_pinjam" required>
                    </div>
                    <button type="submit" class="btn btn-success"><?php echo $id_katalog ? 'Update' : 'Add'; ?></button>
                </form>

                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id_katalog = mysqli_real_escape_string($conn, $_POST['id_katalog']);
                    $nama_katalog = mysqli_real_escape_string($conn, $_POST['nama_katalog']);
                    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
                    $qty_stok = mysqli_real_escape_string($conn, $_POST['qty_stok']);
                    $harga_pinjam = mysqli_real_escape_string($conn, $_POST['harga_pinjam']);

                    if ($id_katalog) {
                        // Update katalog and buku
                        $update_katalog = mysqli_query($conn, "UPDATE katalog SET nama='$nama_katalog' WHERE id_katalog='$id_katalog'");

                        if ($update_katalog) {
                            $update_buku = mysqli_query($conn, "UPDATE buku SET id_katalog='$id_katalog', qty_stok='$qty_stok', harga_pinjam='$harga_pinjam' WHERE isbn='$isbn'");
                            if ($update_buku) {
                                echo "<div class='alert alert-success mt-3'>Katalog successfully updated.</div>";
                            } else {
                                echo "<div class='alert alert-danger mt-3'>Error updating buku: " . mysqli_error($conn) . "</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger mt-3'>Error updating katalog: " . mysqli_error($conn) . "</div>";
                        }
                    } else {
                        // Insert new katalog and update buku
                        $result = mysqli_query($conn, "INSERT INTO katalog (id_katalog, nama) VALUES ('$id_katalog', '$nama_katalog')");

                        if ($result) {
                            $update_buku = mysqli_query($conn, "UPDATE buku SET id_katalog='$id_katalog', qty_stok='$qty_stok', harga_pinjam='$harga_pinjam' WHERE isbn='$isbn'");

                            if ($update_buku) {
                                echo "<div class='alert alert-success mt-3'>Katalog successfully added.</div>";
                            } else {
                                echo "<div class='alert alert-danger mt-3'>Error updating buku: " . mysqli_error($conn) . "</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger mt-3'>Error inserting katalog: " . mysqli_error($conn) . "</div>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
