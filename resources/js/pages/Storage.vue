<template>
  <div id="app">
    <h3>storage</h3>

    <table>
      <tr>
        <th>ingredient name</th>
        <th>amount</th>
        <th>delete</th>
      </tr>
      <tr
        v-for="storage in storage"
        :key="storage.id"
        v-if="user.id == storage.user_id"
      >
        <td
          v-for="ingredient in ingredients"
          :key="ingredient.id"
          v-if="storage.ingredient_id == ingredient.id"
        >
          {{ ingredient.name }}
        </td>
        <td>{{ storage.amount }}</td>
        <td><button>delete</button></td>
      </tr>
    </table>

    <p>
      categories:
      <select v-model="category" name="categories" id="categories">
        <option value="0">all categories</option>
        <option
          v-for="category in categories"
          :key="category.id"
          :value="category.id"
          >{{ category.name }}</option
        >
      </select>
    </p>

    <form enctype="multipart/form-data" @submit.prevent="storage_add">
      <p>
        ingredients:
        <select v-model="ingredient" name="ingredients" id="ingredients">
          <option value="0" hidden>select ingredient</option>
          <option
            v-for="ingredient in ingredients"
            :key="ingredient.id"
            :value="ingredient.id"
            v-if="category == 0 || category == ingredient.category_id"
            >{{ ingredient.name }}</option
          >
        </select>
      </p>
      <p>
        ingredient amount:
        <input type="number" id="amount" v-model="amount" />
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
      ingredient: 0,
      amount: 0,
      category: 0,
    };
  },

  computed: {
    ingredients() {
      return this.$store.getters["ingredients/getAll"];
    },
    categories() {
      return this.$store.getters["categories/getAll"];
    },
    storage() {
      return this.$store.getters["storage/getAll"];
    },
    user() {
      return this.$store.getters["account/getUser"];
    },
  },
  mounted() {
    this.$store.dispatch("ingredients/setAll");
    this.$store.dispatch("categories/setAll");
    this.$store.dispatch("storage/setAll");
  },
  methods: {
    storage_add() {
      const formData = new FormData();
      formData.append("ingredient_id", this.ingredient);
      formData.append("amount", this.amount);
      formData.append("user_id", this.user.id);
      this.$store.dispatch("storage/create", formData);
      this.ingredient = 0;
      this.amount = 0;
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
