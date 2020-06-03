<template>
    <div>
        <span>
            <button class="btn btn-danger" style="max-height: 35px; min-height: 35px"  @click="RemoveOrder"> Verwijderen</button>
            <button class="btn btn-success" style="max-height: 35px; min-height: 35px"  @click="PayOrder"> Afrekenen</button>
        </span>
    </div>
</template>

<script>
    export default {
        props: {
                iscustomer: Boolean,
                customerId: String,
                },

        mounted() {

        },

        data: function() {
            return{
                totalorder: '',
            };
        },

        methods: {
            PayOrder() {
                if(this.iscustomer){
                    this.CustomerOrder();
                }
                else{
                    this.UserOrder();
                }
            },
            RemoveOrder() {
                this.totalorder = JSON.parse(localStorage.getItem('Order'));

                if(this.totalorder != null){
                    this.totalorder = [];
                    localStorage.clear();
                    let body = document.getElementById("body");
                    while(body.hasChildNodes()){
                        body.removeChild(body.firstChild);
                    }
                }
            },
            CustomerOrder() {
                let order = localStorage.getItem('Order');
                alert(order)
                axios.post('/customer-order/order/' + this.customerId, {order1: order})
                    .then(function (response) {
                        //window.location = response.data.redirect;
                        window.location.reload();
                    });
                localStorage.clear();
            },
            UserOrder() {

            }
        }
    }
</script>
