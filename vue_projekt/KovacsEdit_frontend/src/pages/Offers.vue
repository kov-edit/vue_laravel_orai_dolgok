<script>
    import axios from "axios";

    axios.defaults.baseURL = "http://localhost:5000";

    export default {
    name: "Offers",
        data() {
            return {
                ingatlanok: []
            }
        },
        mounted() {
            axios.get("/api/ingatlan").then(response => {
                this.ingatlanok = response.data;
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
</script>

<template>
    <h1 class="mb-4 text-center">Ajánlataink</h1>
    <table>
        <tr>
            <th>Kategória</th>
            <th>Leírás</th>
            <th>Hirdetés dátuma</th>
            <th>Tehermentes</th>
            <th>Fénykép</th>
        </tr>
        <tr v-for="ingatlan in ingatlanok" :key="ingatlan.id">
            <td class="text-center">{{ ingatlan.kategoriaNev }}</td>
            <td class="text-center">{{ ingatlan.leiras }}</td>
            <td class="text-center">{{ ingatlan.hirdetesDatuma }}</td>
            <td class="text-center" :class="ingatlan.tehermentes ? 'zold' : 'piros'">{{ ingatlan.tehermentes ? 'Igen' : 'Nem' }}</td>
            <td><img :src="ingatlan.kepUrl" class="kep" alt="kepHelye"></td>
        </tr>
    </table>
</template>

<style>
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto;
        box-shadow: 5px 5px 15px 5px lightgray;
    }

    table th, table td {
        border-bottom: 1px solid lightgray;
        padding: 8px;
    }

    th {
        text-align: center;
    }

    .kep {
        height: 110px;
        margin: 0 auto;
        display: block;
    }

    .zold {
        color: rgb(4, 156, 4)
    }

    .piros {
        color: rgb(148, 3, 3)
    }   
</style>