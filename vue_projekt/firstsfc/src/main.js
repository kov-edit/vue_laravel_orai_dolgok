import { createApp } from 'vue'
import App from './App.vue'
import FoodItem from './components/FoodItem.vue'
import TodoItem from './components/TodoItem.vue'
import SlotComp from './components/SlotComp.vue'
import CompOne from './components/CompOne.vue'
import CompTwo from './components/CompTwo.vue'
import CompThree from './components/CompThree.vue'

const app = createApp(App)
app.component('food-item', FoodItem)
app.component('todo-item', TodoItem)
app.component('slot-comp', SlotComp)
app.component('comp-one', CompOne)
app.component('comp-two', CompTwo)
app.component('comp-three', CompThree)
app.mount('#app')