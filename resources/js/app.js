import './bootstrap';

import 'flowbite';

import { Tabs } from 'flowbite';

import Alpine from 'alpinejs';

/**
 * Alpine
 */
window.Alpine = Alpine;

Alpine.start();

/*
* tabElements: array of tab objects
* options: optional
*/
const tabs = new Tabs(tabElements);

