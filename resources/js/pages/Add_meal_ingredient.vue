<template>
  <div>
    Add Hello World
    <form enctype="multipart/form-data" @submit.prevent="MealIngredient">
      <p>a place to add meals</p>

      <p>
        meal:
        <select v-model="meal" name="meal" id="meal">
          <option value="0">select meal</option>
          <option v-for="meal in meals" :key="meal.id" :value="meal.id">
            {{ meal.name }}</option
          >
        </select>
      </p>
      <p>
        ingredient:
        <select v-model="ingredient" name="ingredient" id="ingredient">
          <option value="0">select ingredient</option>
          <option
            v-for="ingredient in ingredients"
            :key="ingredient.id"
            :value="ingredient.id"
            >{{ ingredient.name }}</option
          >
        </select>
      </p>
      <p>
        ingredient amount in meal:
        <input v-model="amount" type="number" id="amount" />
      </p>
      <button>submit</button>
    </form>
    <table>
      <tr>
        <th>ingredient name</th>
        <th>amount</th>
      </tr>
      <tr
        v-for="recipe in recipe"
        :key="recipe.id"
        v-if="meal == recipe.meal_id"
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
  </div>
</template>

<script>
import { mapState } from "vuex";

export default {
  name: "HelloWorld",
  data() {
    return {
      meal: 0,
      ingredient: 0,
      amount: "",
    };
  },
  computed: {
    ingredients() {
      return this.$store.getters["ingredients/getAll"];
    },
    meals() {
      return this.$store.getters["meals/getAll"];
    },
    recipe() {
      return this.$store.getters["meals/getRecipe"];
    },
  },
  mounted() {
    this.$store.dispatch("ingredients/setAll");
    this.$store.dispatch("meals/setAll");
    this.$store.dispatch("meals/setRecipe");
  },
  methods: {
    MealIngredient() {
      const formData = new FormData();
      formData.append("meal_id", this.meal);
      formData.append("amount", this.amount);
      formData.append("ingredient_id", this.ingredient);
      this.$store.dispatch("meals/ingredient_add", formData);
      this.ingredient = 0;
      this.amount = "";
    },
  },
};
</script>
