<template>
  <div>
    Add Hello World
    <form enctype="multipart/form-data" @submit.prevent="submitIngredient">
      <p>a place to add ingredients</p>

      <p>
        ingredient name:
        <input type="text" id="name" v-model="name" />
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
  </div>
</template>

<script>
import { mapState } from "vuex";

export default {
  name: "HelloWorld",
  data() {
    return {
      name: "",
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
      formData.append("name", this.name);
      formData.append("category", this.selected);
      this.$store.dispatch("ingredients/create", formData);
      this.name = "";
      this.selected = 1;
    },
  },
};
</script>
