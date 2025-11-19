<script>
export default {
    name: 'CompTwo',
    data() {
        return {
            msg: ''
        }
    }
}
</script>

<template>
    <div>
        <h2>Comp Two</h2>
        <input type="text" v-model="msg" placeholder="Valami szöveg">
        <p>Az üzeneted: </p>
        <p><strong>{{ this.msg }}</strong></p>
    </div>
</template>

<style scoped>
div {
    background-color: rgb(129, 170, 204);
    color: rgb(53, 27, 4);
    width: 300px;
    padding: 20px;
    margin: 10px;
    font-size: 18px;
}
strong {
    background-color: darkcyan;
    padding: 5px;
}
</style>