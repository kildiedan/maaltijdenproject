<template>
  <div>
    Add Hello World
    <p>a place to add ingredients</p>

    <p>
      ingredient name:
      <input type="text" id="name_ingredient" v-model="name_ingredient" />
    </p>

    <p>
      category:
      <select name="category" id="category">
        <option value="volvo">Volvo</option>
      </select>
    </p>

    <button>submit</button>

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
      category: "",
      storage: 0,
      recipe: "",
    };
  },
  computed: {
    ...mapState(["groups"]),
  },
};
</script>
