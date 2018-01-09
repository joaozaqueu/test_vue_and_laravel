<template>
    <div>
        <h1>Criar Usuário</h1>
        <form v-on:submit.prevent="createUser">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nome do Usuário:</label>
                        <input type="text" class="form-control" v-model="user.name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>email:</label>
                        <input type="text" class="form-control col-md-6" v-model="user.email" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Senha:</label>
                        <input type="text" class="form-control col-md-6" v-model="user.password" />
                    </div>
                </div>
            </div>
            <br />
            <div class="form-group">
                <button class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Salvar</button>
            </div>
        </form>
    </div>
</template>
<script>
    export default {

        data(){
            return{
                user:{}
            }
        },
        methods: {
            createUser(){
                console.log(this.user);
                const uri = 'http://localhost:8000/api/users/create';
                this.axios.post(uri, this.user).then((response) => {
                    console.log(response);
                    this.$router.push({name: 'UsersList'})
                })
            }
        }
    }
</script>
