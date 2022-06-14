<template>
  <div id="app">
    <h3>storage</h3>

    <table>
      <tr>
        <th>ingredient name</th>
        <th>delete</th>
      </tr>
      <tr v-for="ingredient in ingredients" :key="ingredient.id">
        <td>{{ ingredient.name }}</td>
        <td><button @click="deleteIngerdient(ingredient.id)">x</button></td>
      </tr>
    </table>

    <table>
      <tr>
        <th>meal name</th>
        <th>delete</th>
      </tr>
      <tr v-for="meal in meals" :key="meal.id">
        <td>{{ meal.name }}</td>
        <td><button @click="deleteMeal(meal.id)">x</button></td>
      </tr>
    </table>
  </div>
</template>

<script>
import { mapState } from "vuex";

export default {
  name: "HelloWorld",
  computed: {
    ingredients() {
      return this.$store.getters["ingredients/getAll"];
    },
    meals() {
      return this.$store.getters["meals/getAll"];
    },
  },
  mounted() {
    this.$store.dispatch("ingredients/setAll");
    this.$store.dispatch("meals/setAll");
  },
  methods: {
    deleteIngerdient(id) {
      this.$store.dispatch("ingredients/remove", id);
    },
    deleteMeal(id) {
      this.$store.dispatch("meals/remove", id);
    },
  },
};
</script>

<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
th {
  padding: 10px;
}
</style>
