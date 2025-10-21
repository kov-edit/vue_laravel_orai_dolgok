<script>
export default {
  data() {
    return {
      message: 'Köszönet az oldalon',
      foods: [
        {
          name: 'Barack',
          desc: 'Ez egy citrom',
          favorite: true
        },
        {
          name: 'Körte',
          desc: 'Ez egy citrom, de hosszabb a szöveg',
          favorite: false
        },
        {
          name: 'Narancs',
          desc: 'Ez egy citrom és lorem ipsum dolor sit amet consectetur adipisicing elit.',
          favorite: true
        },
        {
          name: 'Mandarin',
          desc: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe voluptates ex voluptatibus modi laborum deserunt quis incidunt eum harum?',
          favorite: false
        },
        {
          name: 'Citrom',
          desc: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi modi totam quo unde id aut! Voluptate, tempore quidem cum, porro, voluptatem excepturi.',
          favorite: false
        }
      ]
    }
  },
  methods: {
    removeItem() {
      this.foods.splice(0, 1);
    },
    receiveEmit(foodId) {
      const foundFood = this.foods.find(food => food.name === foodId);
      foundFood.favorite = !foundFood.favorite
    }
  }
}
</script>

<template>
  <h1>{{ message}}</h1>

  <h1>Gyümölcsök</h1>
  <button @click="removeItem">Törlés</button>
  <div id="wrapper">
    <!--<food-item 
      food-name="Barack"
      :is-favorite="true"/>
    <food-item 
      food-name="Körte"
      food-desc="Ez egy citrom, de hosszabb a szöveg"/>
    <food-item 
      food-name="Narancs"
      food-desc="Ez egy citrom és lorem ipsum dolor sit amet consectetur adipisicing elit."
      :is-favorite="false"/>>-->
      <food-item 
      v-for="x in foods"
      :key="x"
      :food-name="x.name"
      :food-desc="x.desc"
      :is-favorite="x.favorite"
      @toggle-favorite="receiveEmit"
      />
  </div>
</template>

<style>
#wrapper {
  display: flex;
  flex-wrap: wrap;
}

#wrapper > div{
  border: dashed 3px purple;
  flex-basis: 140px;
  margin: 10px;
  padding: 10px;
  background-color: lightgray;
  text-align: center;
}

#wrapper > div:hover{
  cursor: pointer;
  background-color: rgb(250, 193, 160);
  border-color: rgb(73, 1, 1);
}
</style>
