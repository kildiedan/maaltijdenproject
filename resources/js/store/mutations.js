export default {
    updateAllIngredients(state, ingredients) {
        state.ingredients = ingredients;
        console.log('updateAllIngredients from mutations');
    },
}