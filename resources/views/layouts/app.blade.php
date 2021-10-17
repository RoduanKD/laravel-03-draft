<!DOCTYPE html>

<html lang="{{ App::currentLocale() }}" dir="{{ App::isLocale('ar') ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Website Name - @yield('title', '')</title>
    @if (App::isLocale('ar'))
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma-rtl.min.css">
    @else
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

    @stack('styles')
</head>

<body>
    @include('partials.navbar')

    <section class="hero @yield('hero-classes', 'is-large is-info')">
        <div class="hero-body">
            <p class="title">
                @yield('title')
            </p>
            <p class="subtitle">
                @yield('subtitle')
            </p>
        </div>
    </section>

    @yield('content')

    @include('partials.footer')
    <script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
    <script>
        const beamsClient = new PusherPushNotifications.Client({
          instanceId: 'db2594f5-1269-4d02-956d-45142cf7d33d',
        });

        beamsClient.start()
          .then(() => beamsClient.addDeviceInterest('hello'))
          .then(() => console.log('Successfully registered and subscribed!'))
          .catch(console.error);
      </script>
    @stack('scripts')
</body>

</html>
