
<template>
    <div>
        <h1>Usuários</h1>

        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <router-link :to="{ name: 'UserCreate' }" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Novo Usuário</router-link>
            </div>
        </div><br />

        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users">
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        <router-link :to="{name: 'UserEdit', params: { id: user.id }}" class="btn btn-primary"> <i class="glyphicon glyphicon-pencil"></i> Editar</router-link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    export default {
        data() {
            return{
                users: []
            }
        },

        created: function()
        {
            this.fetch();
        },

        methods: {
            fetch()
            {
                const uri = 'http://localhost:8000/api/users/list';
                this.axios.get(uri).then((response) => {
                    this.users = response.data;
                });
            }
        }
    }
</script>
