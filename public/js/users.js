Vue.component('users',{

    template: '#users-template',

    data: function(){

        return {
            list: ['']
        };

    },

    created: function(){

    this.fetchUsers();

    },

    methods: {
        deleteUser: function(user){
            var index = this.list.indexOf(user);
            this.list.splice(index, 1);
        },
        fetchUsers: function(){
            this.$http.get('/api/users').then((response) => {
            this.list = response.data;
         });

        } 
    }  

});

new Vue({

    el: '#app-users'

});