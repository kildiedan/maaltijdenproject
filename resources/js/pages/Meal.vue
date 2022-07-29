<template>
  <div id="app">
    <h3>{{ meals.name }}</h3>
    <p></p>
    <h4>recipe</h4>
    <p>{{ meals.recipe }}</p>

    <p>ingredient list</p>
    <table>
      <tr>
        <th>ingredient</th>
        <th>amount</th>
      </tr>
      <tr
        v-for="recipe in recipes"
        :key="recipe.id"
        v-if="meals.id == recipe.meal_id"
      >
        <td
          v-for="ingredient in ingredients"
          :key="ingredient.id"
          v-if="recipe.ingredient_id == ingredient.id"
        >
          {{ ingredient.name }}
        </td>
        <td>{{ recipe.amount }}</td>
      </tr>
    </table>

    <button @click="made_meal(meals.id)">made the meal</button>
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
    recipes() {
      return this.$store.getters["meals/getRecipe"];
    },
    meals() {
      return this.$store.getters["meals/getById"](
        parseInt(this.$route.params.id)
      );
    },
  },
  mounted() {
    this.$store.dispatch("ingredients/setAll");
    this.$store.dispatch("meals/setAll");
    this.$store.dispatch("meals/setRecipe");
  },
  methods: {
    made_meal(id) {
      this.$store.dispatch("meals/madeMeal", id);
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
