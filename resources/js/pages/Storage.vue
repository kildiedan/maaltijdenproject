<template>
  <div id="app">
    <h3>storage</h3>

    <table>
      <tr>
        <th>ingredient name</th>
      </tr>
      <tr v-for="ingredient in ingredients" :key="ingredient.id">
        <td>{{ ingredient.name }}</td>
      </tr>
    </table>

    <form enctype="multipart/form-data" @submit.prevent="storage_add">
      <p>
        ingredients:
        <select v-model="selected" name="ingredients" id="ingredients">
          <option value="0" hidden>select ingredient</option>
          <option
            v-for="ingredient in ingredients"
            :key="ingredient.id"
            :value="ingredient.id"
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
      selected: 0,
      amount: 0,
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
    storage_add() {
      const formData = new FormData();
      formData.append("ingredient_id", this.selected);
      formData.append("amount", this.amount);
      this.$store.dispatch("storage/create", formData);
      this.selected = 0;
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
