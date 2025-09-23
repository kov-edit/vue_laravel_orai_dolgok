<template>
    <div>
        <p>Hello {{ name }}</p>
    </div>
</template>

<script>
    export default {  //visszaadja a 'name'-t stringként
        props: {
            name: String
        }
    }
</script>

<style scoped>
    p {
        color: darkorchid;
    }
</style>