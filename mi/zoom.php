<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../public/css/style.css" />
</head>

<body class="antialiased bg-white text-slate-500 dark:text-slate-400 dark:bg-slate-900">
  <!-- navbar -->
  <div class="sticky top-0 z-40 w-full backdrop-blur transition-colors duration-500 items-center justify-between px-12 lg:z-50 lg:border-b lg:border-slate-900/10 dark:border-slate-50/[0.06] supports-backdrop-blur:bg-white/95 dark:bg-slate-900/75">
    <div class="mx-auto max-w-8xl">
      <div class="py-4 mx-4 border-b border-slate-900/10 lg:px-8 lg:border-0 dark:border-slate-300/10 lg:mx-0">
        <div class="relative flex items-center">
          <a class="mr-3 flex-none w-[2.0625rem] overflow-hidden md:w-auto" href="/"><img class="w-[2.0625rem] rounded-full" src="../public/img/akbar.jpg" alt="muhakbarcom logo" />
          </a>

          <div class="relative right-0 items-center hidden ml-auto lg:flex">
            <nav class="text-sm font-semibold leading-6 text-slate-700 dark:text-slate-200">
              <ul class="flex space-x-8">
                <li>
                  <a class="hover:text-sky-500 dark:hover:text-sky-400" href="http://blog.muhakbar.com">Blog Saya</a>
                </li>
                <li>
                  <a href="https://muhakbar.com/mi" class="hover:text-sky-500 dark:hover:text-sky-400">Web Kelas</a>
                </li>
                <li>
                  <a class="hover:text-sky-500 dark:hover:text-sky-400" href="https://muhakbar.com/portofolio">Portofolio</a>
                </li>
                <li>
                  <a class="hover:text-sky-500 dark:hover:text-sky-400" href="https://muhakbar.com/contact">Contact Me</a>
                </li>
                <li>
                  <a class="hover:text-sky-500 dark:hover:text-sky-400" href="https://muhakbar.com/about">About</a>
                </li>
                <li class="px-3 py-1 ml-5 font-semibold text-gray-800 bg-gray-100 rounded">
                  <a href="">Subscribe</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="flex items-center justify-center min-h-screen font-sans antialiased tracking-tighter">
    <div class="max-w-lg">
      <div class="border shadow-sm backdrop-blur-sm bg-white/30 rounded-xl">
        <header class="border-b px-4 py-2.5">Join Zoom Meeting</header>
        <section class="px-4 py-2.5">
          <input type="text" name="idzoom" id="idzoom" class="px-3 py-2 rounded-xl" placeholder="masukan meeting id..">
        </section>
        <footer class="border-t px-4 py-2.5">
          <button class="w-full px-4 py-1 transition duration-300 bg-white border rounded-lg hover:bg-slate-300 hover:text-zinc-600" id="tombolsubmit">Submit</button>
        </footer>
      </div>
    </div>
  </div>
  <!-- jika tombolsubmit di klik maka alihkan ke https://zoom.us/wc/join/92185327938 -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#tombolsubmit').click(function() {
        var idzoom = $('#idzoom').val();
        window.location.href = "https://zoom.us/wc/join/" + idzoom;
      });
    });
  </script>

</body>

</html>