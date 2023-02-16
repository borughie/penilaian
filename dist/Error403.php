<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./res/header.php"; ?>
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="font-Poppins select-none bg-gradient-to-bl from-[#BDEBFE] to-[#E0EAFC] dark:from-blue-700 dark:via-blue-800 dark:to-gray-900">
    <section class="flex items-center h-screen p-16 backdrop-blur-sm">
        <div class="container flex flex-col items-center justify-center px-5 mx-auto my-8 bg-white/90 dark:bg-slate-900/70 w-fit p-7 rounded-md shadow">
            <div class="max-w-md text-center">
                <h2 class="mb-8 font-extrabold text-9xl text-transparent bg-clip-text bg-gradient-to-br from-blue-700 via-blue-800 to-gray-900 dark:from-gray-100 dark:via-gray-300 dark:to-gray-700">
                    <span class="sr-only">Error</span>403
                </h2>
                <p class=" font-semibold text-2xl md:text-3xl text-slate-900 dark:text-slate-100">Maaf, Halaman yang anda tuju tidak dapat diakses.</p>
                <p class="mt-4 mb-8 text-gray-400 dark:text-slate-200">Silahkan menekan tombol dibawah <br> untuk kembali ke Halaman Utama.</p>
                <a rel="noopener noreferrer" href="http://tespmb.rf.gd/" class="px-8 py-3 font-semibold rounded-md text-white dark:text-slate-100 shadow-sm bg-blue-600 dark:bg-blue-700/70 hover:bg-blue-700 dark:hover:bg-blue-700 active:bg-blue-800 dark:active:bg-blue-700/70 transition-all">Halaman Utama</a>
            </div>
        </div>
    </section>
    <script>
        document.querySelector('#dark-toggle').addEventListener('click', function() {
            if (document.querySelector('#dark-toggle').checked) {
                document.querySelector('html').classList.add('dark');
                var theme = 'dark';
                localStorage.setItem('theme', theme)
            } else {
                document.querySelector('html').classList.remove('dark');
                var theme = 'light';
                localStorage.setItem('theme', theme)
            }
        });
    </script>
</body>

</html>