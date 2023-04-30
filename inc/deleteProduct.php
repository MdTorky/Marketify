<?php
include "./db_conn.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM products WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function() {
            Swal.fire(
                'Success!',
                'Product Deleted Successfully',
                'success',
            )

        });
        window.location.href = "../myProducts.php?m=1"
    </script>
<?php
}
