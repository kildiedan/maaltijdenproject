<template>
  <div id="app">
    <h1>{{ message }}</h1>
    <h2>Navigatie menu</h2>
    <ul id="navMenu">
      <li>
        <router-link to="/">Home</router-link>
      </li>
      <li>
        <router-link to="/add">Add meal and ingredients</router-link>
      </li>
      <li>
        <router-link to="/ingredients">Storage</router-link>
      </li>
      <li>
        <router-link to="/all">All meal and ingredients</router-link>
      </li>
    </ul>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      message: "App Hello World",
    };
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

#navMenu {
  list-style: none;
}

#navMenu li {
  display: inline-block;
  margin: 10px;
}
</style>
