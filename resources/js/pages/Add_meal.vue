<template>
  <div>
    Add Hello World
    <form enctype="multipart/form-data" @submit.prevent="submitMeal">
      <p>a place to add meals</p>

      <p>
        meal name:
        <input type="text" id="name_meal" v-model="name" />
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
      name: "",
      recipe: "",
    };
  },
  computed: {
    ingredients() {
      return this.$store.getters["ingredients/getAll"];
    },
  },
  mounted() {
    this.$store.dispatch("ingredients/setAll");
  },
  methods: {
    submitMeal() {
      const formData = new FormData();
      formData.append("name", this.name);
      formData.append("recipe", this.recipe);
      formData.append("chosen", 0);
      this.$store.dispatch("meals/create", formData);
      this.name_meal = "";
      this.recipe = "";
    },
  },
};
</script>
