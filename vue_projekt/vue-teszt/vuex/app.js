const store = new Vuex.Store({
    state: {
        counter: 0
    },
    mutations: {
        increment(state) {
            state.counter += 25
        }
    }
})

new Vue({
    el: '#app',
    methods: {
        addOne() {
            store.commit('increment')
        }
    },
    computed: {
        counter() {
            return store.state.counter
        }
    }
})