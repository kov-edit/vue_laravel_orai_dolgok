<script>
    export default {
        data() {
            return {
                counter: 0
            }
        }
    }
</script>

<template lang="pug">
    div
        button(@click="counter+=5") Hozzáad 5
        p Mennyi: {{ counter }}
</template>

<style lang="less" scoped>
    @color: maroon;
    p {
        color: @color;
    }
</style>