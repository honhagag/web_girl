<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include'header.php';

if (isset($_POST['submit'])) {
    // Lấy thông tin về file ảnh
    $file = $_FILES['image'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    // Đọc nội dung file ảnh thành dạng base64
    $imageData = base64_encode(file_get_contents($fileTmpName));

    // Kiểm tra và thực hiện lưu trữ dữ liệu vào cơ sở dữ liệu
    if ($fileError === 0) {
        // Tạo truy vấn SQL để lưu trữ dữ liệu
        $txt = _insert('image',"post_title,path_img","'$fileName','$imageData'");
        $kiemtra = _query($txt);
        if ($kiemtra) {
            // Mã JavaScript của SweetAlert
            echo "
            <script>
                swal({
                    title: 'Good job!',
                    text: 'You clicked the button!',
                    icon: 'error'
                });
            </script>";
        } else {
            echo "
            <script>
                swal({
                    title: 'Good job!',
                    text: 'You clicked the button!',
                    icon: 'error'
                });
            </script>";
        }
    }else 
    {
        header('location:index.php');
    }
}   


?>

<!DOCTYPE html>
<html>


<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <button type="submit" name="submit">Upload</button>
    </form>
</body>

</html>




<?php
include'end.php'
?>