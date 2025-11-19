<script>
export default {
    name: 'CompOne',
    data() {
        return {
            imgSrc: 'img/img_question.svg'
        }
    }
}
</script>

<template>
    <div>
        <img :src="imgSrc">
        <h2>Comp One</h2>
        <p>Válassz ételt:</p>
        <label>
            <input type="radio" name="rbgFood" v-model="imgSrc" :value="'img/img_apple.svg'">
            Barack
        </label>
        <label>
            <input type="radio" name="rbgFood" v-model="imgSrc" :value="'img/img_cake.svg'">
            Süti
        </label>
    </div>
</template>

<style scoped>
div {
    background-color: rgb(101, 165, 129);
    color: rgb(58, 35, 5);
    width: 300px;
    padding: 20px;
    margin: 10px;
    font-size: 18px;
}

img {
    float: right;
    height: 100px;
    margin-top: 20px;
}

label:hover {
    cursor: pointer;
}
</style>