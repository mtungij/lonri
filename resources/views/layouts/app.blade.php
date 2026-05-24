<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="theme-color" content="#0284c7">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Lonri">
    <link rel="manifest" href="{{ asset('build/manifest.webmanifest') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/lonri.png') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

          <link rel="preconnect" href="https://fonts.googleapis.com">
         <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
         <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

    <!-- jQuery (required for Select2) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap JS (optional, but included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Handle Dark Mode -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <!-- Additional Styles -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
  @notifyCss
    <!-- Vite Resources -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased dark:bg-gray-900">

    <div class="bg-gray-100 dark:bg-gray-900">
        <livewire:layout.navigation />
        <livewire:layout.sidebar/>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Main Content -->
        <div class="overflow-y-auto mt-10 bg-gray-50 lg:ml-64 pt-8 dark:bg-gray-900">
            <main class="p-4">
                {{ $slot }}
            </main>
        </div>
    </div>

    <x-toaster-hub />

    <!-- Initialize Select2 and handle Livewire updates -->
    <script>
        document.addEventListener('livewire:load', function () {
            // Initialize Select2
            $('.select2').select2();

            // Reinitialize Select2 after Livewire updates
            Livewire.hook('message.processed', (message, component) => {
                $('.select2').select2();
            });
        });
    </script>

    <script>
        let deferredPrompt = null;
        const installButton = document.getElementById('installAppButton');
        const isIos = /iphone|ipad|ipod/i.test(window.navigator.userAgent);
        const isStandalone = window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone;

        window.addEventListener('beforeinstallprompt', (event) => {
            event.preventDefault();
            deferredPrompt = event;
        });

        if (installButton) {
            installButton.addEventListener('click', async () => {
                if (!deferredPrompt) {
                    if (isStandalone) {
                        alert('App is already installed.');
                        return;
                    }

                    if (isIos) {
                        alert('To install on iPhone: tap Share, then choose Add to Home Screen.');
                        return;
                    }

                    alert('Install prompt is not available yet. Use HTTPS and open this app in Chrome/Edge, then try again.');
                    return;
                }

                deferredPrompt.prompt();
                await deferredPrompt.userChoice;
                deferredPrompt = null;
            });
        }

        window.addEventListener('appinstalled', () => {
            deferredPrompt = null;
            if (installButton) {
                installButton.textContent = 'Installed';
                installButton.disabled = true;
                installButton.classList.add('opacity-70', 'cursor-not-allowed');
            }
        });

        if (installButton && isStandalone) {
            installButton.textContent = 'Installed';
            installButton.disabled = true;
            installButton.classList.add('opacity-70', 'cursor-not-allowed');
        }
    </script>
</body>

</html>
