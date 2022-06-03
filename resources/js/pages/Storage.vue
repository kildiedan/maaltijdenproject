<template>
  <div id="app">
    <h3>storage</h3>

    <table>
      <tr>
        <th>ingredient name</th>
        <th>portions</th>
      </tr>
      <tr v-for="ingredient in ingredients" :key="ingredient.id">
        <td>{{ ingredient.name }}</td>
        <td>{{ ingredient.storage }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
import { mapState } from "vuex";

export default {
  name: "HelloWorld",
  computed: {
    ...mapState(["ingredients"]),
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
