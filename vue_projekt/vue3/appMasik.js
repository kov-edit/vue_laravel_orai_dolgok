Vue.component('custom-row', {
    data: function () {
        return {
            counter: 0,
            counterMasik: 0
        }
    },
    template: `
        <tr>
            <td>
                <button @click="counter+=5">Hozzáad 5</button>
            </td>
            <td>
                {{ counter }}
            </td>
            
            <td>
                <button @click="counterMasik+=20">Hozzáad 20</button>
            </td>
            <td>
                {{ counterMasik }}
            </td>
        </tr>
    `
})

//let app = new Vue - ha nem működne vagy valami
new Vue({
    el: "#app"
})