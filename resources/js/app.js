import './bootstrap';

import 'flowbite';
import Datepicker from 'flowbite-datepicker/Datepicker';

import 'animate.css';

import Alpine from 'alpinejs';

/**
 * Alpine
 */
window.Alpine = Alpine;

Alpine.start();

// import { Tabs } from 'flowbite';
/*
* tabElements: array of tab objects
* options: optional
*/
// const tabs = new Tabs(tabElements);

/**
 * References to project.blade.php -> modal
 */
const datepickerEl = document.querySelector('#due-date');
const todayDate = new Date();
const datepicker = new Datepicker(datepickerEl, {
    // options
    minDate: todayDate
});

datepickerEl.addEventListener('change', (event) => {
    const selectedDate = new Date(event.target.value)

    if(selectedDate < todayDate)
    {
        alert('Please select a date on or after tomorrow.');
        // set data to today
        datepicker.setDate(todayDate)
    }
});