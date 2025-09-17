Vue.component('button-counter', {
    data: function () {
        return {
            counter: 0
        }
    },
    template: '<div><button @click="counter++">Hozzáad 1</button>Counter: {{ counter }}</div>'
})

let app = new Vue({
    el: '#app'
})