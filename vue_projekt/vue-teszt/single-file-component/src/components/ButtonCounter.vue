<script>
    export default {
        data() {
            return {
                counter: 0
            }
        }
    }
</script>

<template>
    <div>
        <button @click="counter+=5">Hozzáad 5</button>
        <p>Mennyi: {{ counter }}</p>
    </div>
</template>

<style scoped>
    p {
        color: maroon;
    }
</style>