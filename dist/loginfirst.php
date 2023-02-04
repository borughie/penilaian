<!DOCTYPE html>
<html lang="en">

<head>
    <title>Menu Login</title>
    <?php include "./res/header.php"; ?>
</head>

<body>
    <script>
        let timerInterval
        Swal.fire({
            icon: 'warning',
            html: '<div class="drop-shadow-md text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 font-bold text-3xl">Anda Belum Login</div> <div class="text-gray-700 font-semibold">Silahkan Login Terlebih Dahulu.</div>',
            timer: 2000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                document.location = './login.php';
            }
        })
    </script>
</body>

</html>