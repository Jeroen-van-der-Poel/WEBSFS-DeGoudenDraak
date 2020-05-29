<template>
    <div>
        <div class="modal-body">
            <div class="d-flex justify-content-between">
            <h4>Aantal</h4>
            <input type="number" id="points" name="points" min="1" max="100" value="1" v-model="amount">
            </div>
        </div>
        <div class="modal-footer">
            <input class="btn btn-sm btn-success" value="Toevoegen" data-dismiss="modal" type="submit" v-on:click="addOrder">
        </div>
    </div>
</template>

<script>
    export default {
        props: ['dish', 'customerId'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function() {
            return{
                amount: '1',
                order: [],
                totalorder: [],
            };
        },

        methods: {
            addOrder: function(){
                //console.log(this.amount);
                //console.log(this.dish);
                //console.log(this.customerId);
                this.order.push(this.dish, this.amount);
                this.totalorder.push(this.order);
                this.order = [];

                this.AddLocalStorage();
            },

            AddLocalStorage: function () {
                let string = JSON.stringify(this.totalorder);
                localStorage.setItem('Order', string);
            }
        },

    }


</script>
