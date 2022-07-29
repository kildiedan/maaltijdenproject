<template>
  <div id="app">
    <h3>meal select</h3>

    <table>
      <tr>
        <th>meal</th>
        <th>times chosen</th>
        <th>select meal</th>
      </tr>
      <tr v-for="meal in meals" :key="meal.id">
        <td>
          {{ meal.name }}
        </td>
        <td>{{ meal.chosen }}</td>
        <td>
          <router-link :to="{ name: 'meal', params: { id: meal.id } }">
            select
          </router-link>
        </td>
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
    storage() {
      return this.$store.getters["storage/getAll"];
    },
    user() {
      return this.$store.getters["account/getUser"];
    },
    meals() {
      return this.$store.getters["meals/getAll"];
    },
  },
  mounted() {
    this.$store.dispatch("ingredients/setAll");
    this.$store.dispatch("storage/setAll");
    this.$store.dispatch("meals/setAll");
  },
  methods: {
    meal_ingredient_check() {},
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
