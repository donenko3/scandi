import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import mainCss from './assets/css/main.css'
// import axios from 'axios'

const app = createApp(App)
app.use(router)
app.use(mainCss)
// app.use(axios)
app.mount('#app')
