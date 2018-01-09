<template>
    <div>
        <h1>Update Item</h1>
        <div class="row">
          <div class="col-md-10"></div>
          <div class="col-md-2"><router-link :to="{ name: 'DisplayItem' }" class="btn btn-success"><i class="glyphicon glyphicon-fast-backward"></i> Return to Items</router-link></div>
        </div>

        <form v-on:submit.prevent="updateItem">
            <div class="form-group">
                <label>Item Name</label>
                <input type="text" class="form-control" v-model="item.name">
            </div>

            <div class="form-group">
                <label name="product_price">Item Price</label>
                <input type="text" class="form-control" v-model="item.price">
            </div>

            <div class="form-group">
                <button class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> Update</button>
            </div>
        </form>
    </div>
</template>

<script>

    export default{
        data(){
            return{
                item:{}
            }
        },

        created: function(){
            this.getItem();
        },

        methods: {
            getItem()
            {
              const uri = `http://localhost:8000/items/${this.$route.params.id}/edit`;
                this.axios.get(uri).then((response) => {
                    this.item = response.data;
                });
            },

            updateItem()
            {
              const uri = 'http://localhost:8000/items/'+this.$route.params.id;
                this.axios.patch(uri, this.item).then((response) => {
                  this.$router.push({name: 'DisplayItem'});
                });
            }
        }
    }
</script>