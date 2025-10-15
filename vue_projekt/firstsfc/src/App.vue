<script>
export default {
  data() {
    return {
      message: 'Köszönet az oldalon'
    }
  }
}
</script>

<template>
  <h1>{{ message}}</h1>

  <h1>Gyümölcsök</h1>
  <div id="wrapper">
    <food-item 
      food-name="Barack"
      :is-favorite="true"/>
    <food-item 
      food-name="Körte"
      food-desc="Ez egy citrom, de hosszabb a szöveg"/>
    <food-item 
      food-name="Narancs"
      food-desc="Ez egy citrom és lorem ipsum dolor sit amet consectetur adipisicing elit."
      :is-favorite="false"/>
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
}

#wrapper > div:hover{
  cursor: pointer;
  background-color: rgb(250, 193, 160);
  border-color: rgb(73, 1, 1);
}
</style>
