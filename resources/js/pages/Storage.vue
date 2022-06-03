<template>
  <div id="app">
    <h3>storage</h3>

    <table>
      <tr>
        <th>ingredient name</th>
        <th>portions</th>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  name: "HelloWorld",
  data() {
    return {
      name: "",
      price: "",
      amount: "",
    };
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
