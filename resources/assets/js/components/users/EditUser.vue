<template>
    <div>
        <h1>Atualizar dados do Usuário</h1>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2"><router-link :to="{ name: 'VzUsers' }" class="btn btn-success"><i class="glyphicon glyphicon-fast-backward"></i> Retornar a lista de usuários</router-link></div>
        </div>

        <form v-on:submit.prevent="updateUser">
            <div class="form-group">
                <label>Nome do Usuário</label>
                <input type="text" class="form-control" v-model="user.name">
            </div>

            <div class="form-group">
                <label name="product_price">E-mail</label>
                <input type="text" class="form-control" v-model="user.email">
            </div>

            <div class="form-group">
                <button class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Atualizar</button>
            </div>
        </form>
    </div>
</template>

<script>

    export default{
        data(){
            return{
                user:{}
            }
        },

        created: function(){
            this.getUser();
        },

        methods: {
            getUser()
            {
                const uri = `http://localhost:8000/api/users/${this.$route.params.id}/edit`;
                this.axios.get(uri).then((response) => {
                    this.user = response.data;
                });
            },

            updateUser()
            {
                const uri = 'http://localhost:8000/api/users/'+this.$route.params.id+'/edit';
                this.axios.put(uri, this.user).then((response) => {
                    this.$router.push({name: 'UsersList'});
                });
            }
        }
    }
</script>
