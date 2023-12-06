<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include 'header.php';

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
    $tacgia = $_POST['nationality'];
    $tieude = $_POST['contact_address'];
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];
    if ($error === 0) {
        if ($img_size > 1250000) {
            echo "
            <script>
                swal({
                    title: 'Lỗi!',
                    text: 'File quá lớn',        
                    icon: 'error'
                }); 
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 3000);
            </script>";
        } else { 
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");
            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'upload-img/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
                $txt = _insert('image', "post_title,path_img,author_img,content_img", "'$fileName','$new_img_name','$tacgia','$tieude'");
                $kiemtra = _query($txt);
                if ($kiemtra) {

                    echo "
            <script>
                swal({
                    title: 'Thành công!',         
                    icon: 'success'
                }); 
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 3000);
            </script>";
                } else {
                    echo "
            <script>
                swal({
                    title: 'Lỗi rồi !',
                    icon: 'error'
                });
            </script>";
                }
            }
        }
    }else{

    }
}


?>


<!DOCTYPE html>
<html>

<body>
    <form method="POST" enctype="multipart/form-data">
        <div class="modal">
            <div class="modal-header">
                <div class="modal-logo">
                    <span class="logo-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="419.116" viewBox="0 0 512 419.116">
                            <defs>
                                <clipPath id="clip-folder-new">
                                    <rect width="512" height="419.116" />
                                </clipPath>
                            </defs>
                            <g id="folder-new" clip-path="url(#clip-folder-new)">
                                <path id="Union_1" data-name="Union 1" d="M16.991,419.116A16.989,16.989,0,0,1,0,402.125V16.991A16.989,16.989,0,0,1,16.991,0H146.124a17,17,0,0,1,10.342,3.513L227.217,57.77H437.805A16.989,16.989,0,0,1,454.8,74.761v53.244h40.213A16.992,16.992,0,0,1,511.6,148.657L454.966,405.222a17,17,0,0,1-16.6,13.332H410.053v.562ZM63.06,384.573H424.722L473.86,161.988H112.2Z" fill="var(--c-action-primary)" stroke="" stroke-width="1" />
                            </g>
                        </svg>
                    </span>
                </div>
                <button class="btn-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" d="M0 0h24v24H0V0z" />
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" fill="var(--c-text-secondary)" />
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-title">
                    <label for="nationality">Tên diễn viên: </label>
                    <input type="text" id="nationality" name="nationality" required>
                </div>
            </div>

            <div class="modal-body">
                <div class="modal-title">
                    <label for="contact_address">Mô tả: </label>
                    <input type="text" id="contact_address" name="contact_address" required>
                </div>
            </div>

            <div class="modal-body">
                <h2 class="modal-title">Upload a file</h2>
                <p class="modal-description">Attach the file below</p>
                <button class="upload-area">
                    <span class="upload-area-icon">

                        <g id="files-new" clip-path="url(#clip-files-new)">
                            <path id="Union_2" data-name="Union 2" d="M-2904.708-8.885A39.292,39.292,0,0,1-2944-48.177V-388.708A39.292,39.292,0,0,1-2904.708-428h209.558a13.1,13.1,0,0,1,9.3,3.8l78.584,78.584a13.1,13.1,0,0,1,3.8,9.3V-48.177a39.292,39.292,0,0,1-39.292,39.292Zm-13.1-379.823V-48.177a13.1,13.1,0,0,0,13.1,13.1h261.947a13.1,13.1,0,0,0,13.1-13.1V-323.221h-52.39a26.2,26.2,0,0,1-26.194-26.195v-52.39h-196.46A13.1,13.1,0,0,0-2917.805-388.708Zm146.5,241.621a14.269,14.269,0,0,1-7.883-12.758v-19.113h-68.841c-7.869,0-7.87-47.619,0-47.619h68.842v-18.8a14.271,14.271,0,0,1,7.882-12.758,14.239,14.239,0,0,1,14.925,1.354l57.019,42.764c.242.185.328.485.555.671a13.9,13.9,0,0,1,2.751,3.292,14.57,14.57,0,0,1,.984,1.454,14.114,14.114,0,0,1,1.411,5.987,14.006,14.006,0,0,1-1.411,5.973,14.653,14.653,0,0,1-.984,1.468,13.9,13.9,0,0,1-2.751,3.293c-.228.2-.313.485-.555.671l-57.019,42.764a14.26,14.26,0,0,1-8.558,2.847A14.326,14.326,0,0,1-2771.3-147.087Z" transform="translate(2944 428)" fill="var(--c-action-primary)" />
                        </g>
                        </svg>
                    </span>
                    <span class="upload-area-title">Drag file(s) here to upload.</span>
                    <span class="upload-area-description">
                        Alternatively, you can select a file by <br /><strong><input type="file" name="my_image" required></strong>
                    </span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn-primary">Upload File</button>
            </div>
        </div>

    </form>
</body>

</html>


<!DOCTYPE html>
<html>


</html>

<?php
include 'end.php'
?>