<template>
  <div id="app">
    Home Hello World

    <table>
      <tr>
        <th>number</th>
        <th>ingredient name</th>
        <th>times chosen</th>
      </tr>
      <tr v-for="(meal, index) in meals" :key="meal.id">
        <td>{{ index + 1 }}</td>
        <td>{{ meal.name }}</td>
        <td>{{ meal.chosen }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  name: "HelloWorld",
  computed: {
    meals() {
      return this.$store.getters["meals/getTop"];
    },
  },
  mounted() {
    this.$store.dispatch("meals/setTop");
  },
};
</script>
