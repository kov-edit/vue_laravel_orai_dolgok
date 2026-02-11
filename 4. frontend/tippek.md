api.exe futtatása

feladatban benne van hogy milyen címen van az url elérése

feladatban a metódusok is (post, get, stb) szóval ha előre meg van csinálva akkor csak ki kell választani



sima vue setup, projektnévnek az amit a feladat megad, nem külön mappa létrehozás és utána vue



**npm install --save bootstrap**



src/**main.js**-hez:

import 'bootstrap/dist/css/bootstrap.min.css'

import 'bootstrap'



**npm install vue-router@latest (vagy @4)**



src/new file - **router.js**:

import { createRouter, createWebHistory } from 'vue-router'

import Home from './pages/Home.vue'

const routes = \[

    {

        path: '/',

        name: 'Home',

        component: Home

    },

]



const router = createRouter({

    history: createWebHistory(),

    routes

})

export default router



src/új mappa - pages -> Home.vue



**main.js:**

import router from './router'

createApp(App)

    .use(router)



import './assets/main.css' helyett import './assets/openpage.css'



**Home.vue**-ba a megadott oldal kinézet

<a> helyett router-link, href helyett to



**npm install axios**



**main.js:**

import axios from 'axios'

.use(axios)



**router.js:**

import Offers from './pages/Offers.vue'

{

   path: '/offers',

   name: 'Offers',

   component: Offers

},



**Offers.vue** a pages-be:

<script>

import axios from 'axios';



axios.defaults.baseURL = 'http://localhost:5000/api';



export default {

   name: "Offers",

   data() {

       return {

           ingatlanok: \\\[]

       }

   },

   mounted() {

       axios.get('/ingatlan')

           .then(res => {

               this.ingatlanok = res.data;

           })

           .catch(err => {

               console.log(err);

       });

   }

}



**Newad.vue** létrheozás, routeba felvétel, bootstrap mappából template másolása:

import Newad from './pages/Newad.vue'

&nbsp;   {

&nbsp;       path: '/newad',

&nbsp;       name: 'Newad',

&nbsp;       component: Newad

&nbsp;   }



Home.vue-ba hozzáadni a newad-ot a routerlinkbe

A Newad.vue-ban select átírása erre:
<select class="form-select" v-model="ujIngatlanUrlap.kategoriaId">



**script:**

import axios from 'axios';

export default {

&nbsp;   name: "Newad",

&nbsp;   data() {

&nbsp;       return {

&nbsp;           kategoriak: \[],

&nbsp;           ujIngatlanUrlap: {

&nbsp;               kategoriaId: 0,

&nbsp;               hirdetesDatuma: new Date().toISOString().substring(0, 10), //aktuális dátum és idő, substring = első 10 karakter: év, elválasztó, hónap, elválasztó, nap

&nbsp;               leiras: '',

&nbsp;               tehermentes: false,

&nbsp;               kepUrl: ''

&nbsp;           },

&nbsp;           hibaUzenet: ""

&nbsp;       }

&nbsp;   },

&nbsp;   mounted() {

&nbsp;       axios.get('/kategoria')

&nbsp;           .then(res => {

&nbsp;               this.kategoriak = res.data;

&nbsp;           })

&nbsp;           .catch(err => {

&nbsp;               console.log(err);

&nbsp;           });

&nbsp;   },

&nbsp;   methods: {

&nbsp;       mentes() {

&nbsp;           axios.post('/ujingatlan', this.ujIngatlanUrlap) //fenti objektumot postoljuk

&nbsp;               .then(() => {

&nbsp;                   this.$router.push('/offers');

&nbsp;               })

&nbsp;               .catch(err => {

&nbsp;                   this.hibaUzenet = err + " ";

&nbsp;               });

&nbsp;       }

&nbsp;   }

}



**option**okben törlés, helyette:

&nbsp;                       <option value="0">Kérem válasszon</option>

&nbsp;                       <option 

&nbsp;                       v-for="kategoria in kategoriak"

&nbsp;                       :key="kategoria.id"

&nbsp;                       :value="kategoria.id">{{ kategoria.megnevezes }}</option>



Minden inputba name helyett v-model

Küldés gombhoz: @click="mentes"

ALerthez: v-if="hibaUzenet.length > 0" és <strong>{{ hibaUzenet}}</strong>




