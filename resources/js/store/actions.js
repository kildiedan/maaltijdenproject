import axios from "axios"

export default{
    loadAllIngredients ({
        commit
    }) {
        return axios.get('api/ingredients').then(response =>{
            commit('updateAllIngredients', response.data)
            console.log(response);
            console.log('loadAllIngredients from actions')
        })
    }
}