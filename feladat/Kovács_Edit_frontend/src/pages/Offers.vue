<script>
import axios from 'axios';

axios.defaults.baseURL = 'http://localhost:5000/api';

export default {
    name: "Offers",
    data() {
        return {
            ingatlanok: []
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
</script>

<template>
    <h1 class="mb-4 text-center">Ajánlataink</h1>
    <table>
    <thead>
        <tr>
        <th>Kategória</th>
        <th>Leírás</th>
        <th>Hirdetés dátuma</th>
        <th>Tehermentes</th>
        <th>Fénykép</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="ingatlan in ingatlanok">
        <td class="text-center">{{ ingatlan.kategoriaNev }}</td>
        <td class="text-left">{{ ingatlan.leiras }}</td>
        <td class="text-center">{{ ingatlan.hirdetesDatuma }}</td>
        <td class="text-center" :class="ingatlan.tehermentes ? 'zold' : 'piros'">{{ ingatlan.tehermentes ? 'Igen' : 'Nem' }}</td>
        <td class="text-center"><img :src="ingatlan.kepUrl" alt="Fotó" class="kep"></td>
        </tr>
    </tbody>
    </table>
</template>

<style>
table {
    margin: 0 auto;
    width: 80%;
    border-collapse: collapse;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
}

th, td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

th {
    text-align: center;
}

.kep {
    height: 100px;
    margin: 0 auto;
    display: block;
}

.zold {
    color: green;
}

.piros {
    color: red;
}
</style>