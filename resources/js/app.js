import './bootstrap'
import { createApp } from 'vue'
import App from './App.vue'

const appElement = document.getElementById('app')

createApp(App, {
    initialLocale: appElement?.dataset?.locale || 'ro',
}).mount(appElement)
