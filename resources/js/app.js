import './bootstrap';

import Alpine from 'alpinejs';
import { theme } from './theme';

window.Alpine = Alpine;

Alpine.data('theme', theme);
Alpine.start();
