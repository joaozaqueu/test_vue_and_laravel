 <template>
    <div>
        <h1>Items</h1>

        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'CreateItem' }" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Create Item</router-link>
          </div>
        </div><br />

        <table class="table table-hover">
            <thead>
            <tr>
                <td>ID</td>
                <td>Item Name</td>
                <td>Item Price</td>
                <td>Actions</td>
            </tr>
            </thead>

            <tbody>
                <tr v-for="item in items">
                    <td>{{ item.id }}</td>
                    <td>{{ item.name }}</td>
                    <td><vue-numeric currency="R$" v-bind:precision="2" :read-only="true" separator="," v-model="item.price" ></vue-numeric></td>
                    <td><router-link :to="{name: 'EditItem', params: { id: item.id }}" class="btn btn-primary"> <i class="glyphicon glyphicon-pencil"></i> Edit</router-link></td>
                    <td><button class="btn btn-danger" v-on:click="deleteItem(item.id)"><i class="glyphicon glyphicon-trash"></i> Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import VueNumeric from 'vue-numeric';
    export default {
        data(){
            return{
                items: []
            }
        },

        created: function()
        {
            this.fetchItems();
        },

        components: {
            VueNumeric
        },

        methods: {
            fetchItems()
            {
              let uri = 'http://localhost:8000/items';
              this.axios.get(uri).then((response) => {
                  this.items = response.data;
              });
            },
            deleteItem(id)
            {
              let uri = `http://localhost:8000/items/${id}`;
              this.items.splice(id, 1);
              this.axios.delete(uri);
            }
        }
    }
</script>
