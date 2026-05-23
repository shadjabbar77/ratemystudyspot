import './bootstrap';

import { createApp } from 'vue';
import StudySpotIndex from './pages/StudySpotIndex.vue';

createApp(StudySpotIndex).mount('#app');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
