<template>
    <div>
        <div class="col-sm-3 justify-content-center align-self-end">
            <h4 class="d-flex">Totaal: <p class="pl-2">$0,00</p></h4>
        </div>
        <span>
            <button class="btn btn-danger" style="max-height: 35px; min-height: 35px"  @click="RemoveOrder"> Verwijderen</button>
            <button class="btn btn-success" style="max-height: 35px; min-height: 35px"  @click="RemoveOrder"> Afrekenen</button>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['customerId'],

        mounted() {

        },

        data: function() {
            return{
                totalorder: '',
            };
        },

        methods: {
            PayOrder: function () {

            },
            RemoveOrder: function () {
                this.totalorder = JSON.parse(localStorage.getItem('Order'));
                console.log(this.totalorder)
                if(this.totalorder != null){
                    this.totalorder = [];
                    localStorage.clear();
                    let body = document.getElementById("body");
                    while(body.hasChildNodes()){
                        body.removeChild(body.firstChild);
                    }
                }
            }
        }
    }
</script>

<
