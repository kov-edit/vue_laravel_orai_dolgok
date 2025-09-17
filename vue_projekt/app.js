/*Vue.component('button-counter', {
    data: function () {
        return {
            counter: 0
        }
    },
    template: `
    <div>
        <button @click="counter++">Hozzáad 1</button>
        <p>Counter: {{ counter }}</p>
    </div>
    `
})*/


/*Vue.component('component-a', {
    template: `<div>Component A</div>`
})

Vue.component('component-b', {
    template: `<div><component-a></component-a>Component B</div>`
})

Vue.component('component-c', {
    template: `<div>Component C</div>`
})*/

let ComponentA = {
    template: `<div>Component A</div>`
}

let ComponentB = {
    template: `<div>Component B</div>`
}

let ComponentC = {
    template: `<div>Component C</div>`
}


/*Vue.component('hello-user', {
    props: ['name', 'city'],
    template: `<div>Hello, {{ name }}, {{ city }}-ből jössz!</div>`
})*/

Vue.component('hello-user', {
    props: {
        name: {
            type: String,
            required: false,
            default: 'Premium User :) '
        },
        city: {
            type: String,
            required: false,
            default: 'PremiumCity'
        }
        
    },
    template: `<div>Hello, {{ name }} {{ city }}-ból!</div>`
})


/*Vue.component('button-counter', {
    props: ['counter'],
    template: `
    <div>
        <button @click="$emit('add-some', 5)">Hozzáad 5</button>
        <button @click="$emit('add-some', 20)">Hozzáad 20</button>
        <p>Counter: {{ counter }}</p>
    </div>
    `
})*/


let myMixin = {
    created() {
        this.hello()
    },
    methods: {
        hello() {
            console.log('Hello from mixin')
        }
    }
}

Vue.component('button-counter', {
    mixins: [myMixin],
    data() {
        return {
            counter: 0
        }
    },
    template: `
    <div>
        <button @click="counter+=20">Hozzáad 20</button>
        <p>Counter: {{ counter }}</p>
    </div>
    `
})


Vue.component('custom-input', {
    props: ['value'],
    template: `
    <input :value="value" @input="$emit('input', $event.target.value)">
    `
})


Vue.component('hello-user', {
    props: ['name'],
    template: `<div>Sziaaaa <slot></slot></div>`
})


let app = new Vue({
    el: '#app',
    components: {
        'component-a': ComponentA,
        'component-b': ComponentB,
    },
    data: {
        defaultName: "Default User :(",
        szamlal: 0,
        inputText: 'Szia',
        slotName: "Lajhár"
    },
    methods: {
        addSome(valueToAdd) {
            this.szamlal += valueToAdd
        }
    }
})