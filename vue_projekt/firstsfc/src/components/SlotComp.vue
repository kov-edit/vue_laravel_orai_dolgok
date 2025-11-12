<script>
    export default {
        data() {
            return {
                //adat: 'Ez az adat'
                foods: [
                    {
                    name: 'Barack',
                    desc: 'Ez egy citrom',
                    url: "img/img_apple.svg"
                    },  
                    {
                    name: 'Körte',
                    desc: 'Ez egy citrom, de hosszabb a szöveg',
                    url: "img/img_rice.svg"
                    },
                    {
                    name: 'Narancs',
                    desc: 'Ez egy citrom és lorem ipsum dolor sit amet consectetur adipisicing elit.',
                    url: "img/img_cake.svg"
                    },
                    {
                    name: 'Mandarin',
                    desc: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe voluptates ex voluptatibus modi laborum deserunt quis incidunt eum harum?',
                    url: "img/img_fish.svg"
                    },
                    {
                    name: 'Citrom',
                    desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi modi totam quo unde id aut! Voluptate, tempore quidem cum, porro, voluptatem excepturi.',
                    url: "img/img_pizza.svg"
                    }
                ]
            }
        }
    }
</script>

<template>
    <!--<div>
        <slot></slot>
    </div>
    <div>
        <slot name="bottomSlot"></slot>
    </div>

    <slot v-bind:lclData="adat"></slot>-->

    <slot
    staticText="Ez egy statikus szöveg"
    v-for="x in foods"
    :key="x.name"
    :foodName="x.name"
    :foodDesc="x.desc"
    :foodUrl="x.url"
    ></slot>

</template>

<style scoped>
    /*div {
        border: 2px solid rgb(82, 0, 61);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        margin: 10px;
        padding: 10px;
    }*/

</style>