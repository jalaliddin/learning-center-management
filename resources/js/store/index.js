// import dependency to handle HTTP request to our back end
import axios from 'axios'
import Vuex from 'vuex'
import Vue from 'vue'
Vue.use(Vuex);

//to handle state
const state = {
    students: []
}

//to handle state
const getters = {}

//to handle actions
const actions = {
    getStudents({ commit }, id) {
        axios.get('/student/'+ id +'')
            .then(response => {
                commit('SET_STUDENT', response.data)
            })
    }
}

//to handle mutations
const mutations = {
    SET_STUDENT(state, students) {
        state.students = students
    }
}

//export store module
export default new Vuex.Store({
    state,
    getters,
    actions,
    mutations
})
/** we have just created a boiler plate for our vuex store module**/
