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

      },
      setFiles: function(state, files){
          state.files = files;
      }
  },
  actions: {
      loadUser: function(state){
          axios.get('/user_info')
            .then(function(res){
                console.log("got user:" + JSON.stringify(res.data));
                state.commit("setUser", res.data);
            })
            .catch(function(error){
                console.error(error);
                state.commit("setUser", null)
            });
      },
      logout: function(state){
          axios.post("/logout")
            .then(function(res){
                state.commit("setUser", null);
                state.commit("setFiles", []);

                this.$router.Push("login");
            }).catch(function(error){

            });
      },
      loadFiles: function(state){
          axios.get("/files")
            .then(function(res){
                state.commit("setFiles", res.data);
            }).catch(function(error){
                console.error(error);
            })

      },
      
      deleteFile: function(state, file){
          axios.delete("files/" + file.id)
            .then((res)=>{
                state.dispatch("loadFiles");
            }).catch((e)=>{

            })
      }


  },
  getters: {
      getUser(state){
          return state.user;
      },
      getFiles(state){
          return state.files;
      }
  },

  modules: {
  }
})