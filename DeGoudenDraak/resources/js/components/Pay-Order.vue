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
                userId: String,
                ishome: Boolean,
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
                if(this.ishome){
                    this.CustomerHomeOrder();
                }
                else if(this.iscustomer){
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
                    document.getElementById("totalprice").innerText = "0.00";
                }
            },
            CustomerOrder() {
                let order = localStorage.getItem('Order');
                axios.post('/customer-order/order/' + this.customerId, {order1: order})
                    .then(function (response) {
                        window.location.reload();
                    });
                localStorage.clear();
            },
            UserOrder() {
                let order = localStorage.getItem('Order');
                axios.post('/cashregister/index', {order1: order})
                    .then(function (response) {
                        window.location.reload();
                    });
                localStorage.clear();
            },
            CustomerHomeOrder() {
                let order = localStorage.getItem('Order');
                localStorage.setItem("Customer", JSON.stringify(this.customerId));
                axios.post('/home-order/order/' + this.customerId, {order1: order})
                    .then(function (response) {
                        window.location = "/home-order/" + JSON.parse(localStorage.getItem('Customer')) + "/confirmation";
                        localStorage.clear();
                    });
            }
        }
    }
</script>
