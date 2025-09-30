import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import HelloUser from './components/HelloUser.vue'
import ButtonCounter from './components/ButtonCounter.vue';

const app = createApp(App);
app.component('hello-user', HelloUser);
app.component('button-counter', ButtonCounter);
app.mount('#app')