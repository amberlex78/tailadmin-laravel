import { createPopper } from '@popperjs/core';
import './bootstrap';
import Alpine from 'alpinejs';

// flatpickr
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';
window.Alpine = Alpine;
window.createPopper = createPopper;
window.flatpickr = flatpickr;

Alpine.start();

// Initialize components on DOM ready
document.addEventListener('DOMContentLoaded', () => {
    // Chart imports
    if (document.querySelector('#chartOne')) {
        import('./components/chart/chart-1').then(module => module.initChartOne());
    }
});
