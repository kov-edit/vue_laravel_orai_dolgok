<script>
export default {
    props: ['itemName']
}
</script>

<template>
    <div class="pinkBall"></div>
    <li v-bind="$attrs">{{ itemName }}</li>
    <p>piros</p>
    <div class="pinkBall"></div>
</template>

<style scoped>
 p {
    color: red;
 }
</style>