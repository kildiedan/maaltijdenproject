<template>
  <div>
    Add Hello World
    <form enctype="multipart/form-data" @submit.prevent="submitIngredient">
      <p>a place to add ingredients</p>

      <p>
        ingredient name:
        <input type="text" id="name_ingredient" v-model="name_ingredient" />
      </p>

      <p>
        category:
        <select v-model="selected" name="category" id="category">
          <option
            v-for="category in categories"
            :key="category.id"
            :value="category.id"
            >{{ category.name }}</option
          >
        </select>
      </p>

      <button>submit</button>
    </form>

    <form enctype="multipart/form-data" @submit.prevent="submitMeal">
      <p>a place to add meals</p>

      <p>
        meal name:
        <input type="text" id="name_meal" v-model="name_meal" />
      </p>

      <p>
        recipe:
        <input type="text" id="recipe" v-model="recipe" />
      </p>
      <button>submit</button>
    </form>
  </div>
</template>

<script>
import { mapState } from "vuex";

export default {
  name: "HelloWorld",
  data() {
    return {
      name_ingredient: "",
      name_meal: "",
      recipe: "",
      ingredients_used: [],
      selected: 1,
    };
  },
  computed: {
    categories() {
      return this.$store.getters["categories/getAll"];
    },
  },
  mounted() {
    this.$store.dispatch("categories/setAll");
  },
  methods: {
    submitIngredient() {
      const formData = new FormData();
      formData.append("name", this.name_ingredient);
      formData.append("category", this.selected);
      this.$store.dispatch("ingredients/create", formData);
      this.name_ingredient = "";
      this.selected = 1;
    },
    submitMeal() {
      const formData = new FormData();
      formData.append("name", this.name_meal);
      formData.append("recipe", this.recipe);
      formData.append("chosen", 0);
      // formData.append("ingredients", this.ingredients_used);
      this.$store.dispatch("meals/create", formData);
      this.name_meal = "";
      this.recipe = "";
    },
  },
};
</script>
