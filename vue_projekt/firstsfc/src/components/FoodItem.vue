<script>
export default {
    /*data() {
        return {
            name: 'Barack',
            message: 'Ez egy citrom',
            counter: 0
        }
    },
    methods: {
        adjHozza() {
            this.counter+=15
        }
    }*/
    /*props: [
        'foodName',
        'foodDesc',
        'isFavorite'
    ]*/
    props: {
        foodName: {
            type: String,
            required: true
        },
        foodDesc: {
            type: String,
            required: true,
            default: 'Minden egy citrom',
            validator: function(value) {
                if (value.length > 20 && value.length < 50) {
                    return true
                } else {
                    return false
                }
            }
        },
        isFavorite: {
            type: Boolean,
            required: false,
            default: false
        }
    },
    data() {
        return {
            foodIsFavorite: this.isFavorite
        }
    },
    methods: {
        toggleFavorite() {
            this.foodIsFavorite = !this.foodIsFavorite
        }
   }
}
</script>

<template>
    <div @click="adjHozza()">
        <h2>
            {{ foodName }}
            <img src="../img_quality.svg" v-show="foodIsFavorite">
        </h2>
        <p>{{ foodDesc }}</p>
        <button @click="toggleFavorite">Magic gomb</button>
        <!--<p>{{ message }}</p>
        <p id="szamolo">Kattintások: {{ counter }}</p>-->
    </div>
</template>

<style>
img {
    height: 1.5em;
    float: right;
}
button {
    background-color: darkorchid;
    color: azure;
    border: solid 2px rgb(61, 45, 45);
    padding: 5px 10px;
}
button:hover {
    cursor: pointer;
    background-color: azure;
    color: darkorchid;
}
/*#szamolo {
    font-weight: bold;
    color: saddlebrown;
}*/
</style>