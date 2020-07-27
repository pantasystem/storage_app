import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
      user: null,
      files: []

  },
  mutations: {
      setUser: function(state, user){
          state.user = user;

      }
  },
  actions: {
      loadUser: function(state){
          axios.get('/user')
            .then(function(res){
                state.commit("setUser", res.body);
            })
            .catch(function(error){
                console.error(error);
                state.commit("setUser", null)
            });
      },
      logout: function(){
          axios.get("/logout")
            .then(function(res){

            }).catch(function(error){

            });
      },


  },

  modules: {
  }
})