
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/scss/modal.scss', 'resources/js/app.js'])

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        <div id="app">
          <button @click="isShow = !isShow">画像を見る</button>
          <transition name="fade">
            <div v-show="isShow">
              <div class="modal__inner">
                <div class="modal__close" @click="isShow = !isShow"><i class="fa-solid fa-x"></i></div>
                <img src="image001.jpg" alt="">
              </div>
              <div class="modal__background" @click="isShow = !isShow"></div>
            </div>
          </transition>
        </div>

  <script>
    let app = new Vue({
      el: '#app',
      data() {
        return {
          isShow: false,
        }
      }
    })
  </script>
    </body>
</html>
