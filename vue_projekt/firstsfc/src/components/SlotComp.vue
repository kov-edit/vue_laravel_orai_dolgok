<template>
    <div>
        <slot>
            <p>Default szöveg</p>
        </slot>
    </div>
</template>

<style scoped>
    div {
        border: 2px solid rgb(82, 0, 61);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        margin: 10px;
        padding: 10px;
    }
</style>