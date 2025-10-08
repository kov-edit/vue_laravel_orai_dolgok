<template lang="pug">
    div
        p Hello {{ name }}
        h1 This is a greeting from pug itself 😎🎉
        p This is a bekezdés
</template>

<script>
    export default {  //visszaadja a 'name'-t stringként
        props: {
            name: String
        }
    }
</script>

<style lang="less" scoped>
    @color: darkorchid;
    p {
        color: @color;
    }
</style>