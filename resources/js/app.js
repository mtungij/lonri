import './bootstrap';
import 'flowbite';
import 'select2';
import 'select2/dist/css/select2.min.css';
import '../../vendor/masmerise/livewire-toaster/resources/js';
import { registerSW } from 'virtual:pwa-register';

import mask from "@alpinejs/mask";

registerSW({ immediate: true });

Alpine.plugin(mask);

document.addEventListener("livewire:navigating", () => {
    // Mutate the HTML before the page is navigated away...
    initFlowbite();
});

document.addEventListener("livewire:navigated", () => {
    // Reinitialize Flowbite components
    initFlowbite();
});


