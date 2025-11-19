<script>

</script>

<template>
    <div>
        <h2>Comp Three</h2>
        <p>Lorem ipsum szöveg TELEPORTÁL</p>
        <teleport to="body">
            <div id="redDiv">Térugró szöveg</div>
        </teleport>
    </div>
</template>

<style scoped>
div {
    background-color: rgb(102, 11, 11);
    color: rgb(228, 222, 222);
    width: 300px;
    padding: 20px;
    margin: 10px;
    font-size: 18px;
}

</style>