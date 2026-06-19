import './bootstrap'
import { createApp } from 'vue'
import App from './App.vue'

const appElement = document.getElementById('app')
const dataElement = document.getElementById('sitego-app-data')

function readAppData() {
    if (!dataElement?.textContent) {
        return {}
    }

    try {
        return JSON.parse(dataElement.textContent)
    } catch (error) {
        console.error('SiteGo config could not be parsed.', error)
        return {}
    }
}

if (appElement) {
    const appData = readAppData()

    createApp(App, {
        initialLocale: appData.locale || 'ro',
        initialContent: appData.content || {},
        initialBuilder: appData.builder || {},
        siteConfig: appData.config || {},
    }).mount(appElement)
}
