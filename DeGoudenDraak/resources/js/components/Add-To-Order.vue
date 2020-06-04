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
        props: ['dish'],

        mounted() {

        },

        data: function() {
            return{
                amount: '1',
                totalorder: [],
            };
        },

        created() {
            localStorage.clear();
        },

        methods: {
            addOrder(){
                if(localStorage.getItem('Order') != null){
                    this.totalorder = JSON.parse(localStorage.getItem('Order'));
                }

                let dishes = JSON.parse(this.dish);
                this.totalorder.push({"id":dishes.id, "name":dishes.name, "amount":this.amount, "price":(dishes.price * this.amount)});

                let table = document.getElementById("dishesTable");
                let body = document.getElementById("body");
                    let row = body.insertRow();
                    let cell = row.insertCell(0);
                    let name2 = dishes.name;
                    cell.innerText = name2;
                    let cell2 = row.insertCell(1);
                    let amount2 = this.amount;
                    cell2.innerText = amount2;
                    let cell3 = row.insertCell(2);
                    let price2 = (dishes.price * this.amount);
                    price2 = price2.toFixed(2);
                    cell3.innerText = "€" + price2;
                    let cell4 = row.insertCell(3);
                        let btn = document.createElement('input');
                        btn.type = "button";
                        btn.className = "btn btn-danger";
                        btn.id = dishes.id;
                        btn.value = "-";
                        btn.onclick = function(){
                            let orders = JSON.parse(localStorage.getItem('Order'));
                            orders.forEach(function (item, index) {
                                if(item.id == btn.id){
                                    orders.splice(index, 1);
                                    row.parentNode.removeChild(row);

                                    let total = parseFloat(document.getElementById("totalprice").innerText);
                                    document.getElementById("totalprice").innerText = "";
                                    total -= parseFloat(item.price);
                                    total = total.toFixed(2);
                                    document.getElementById("totalprice").innerText = total;
                                }
                            });
                            localStorage.clear();
                            localStorage.setItem("Order", JSON.stringify(orders));
                        }
                    cell4.appendChild(btn);
                table.appendChild(body);

                this.AddLocalStorage();
                this.amount = '1';

                let total = parseFloat(document.getElementById("totalprice").innerText);
                    document.getElementById("totalprice").innerText = "";

                total += parseFloat(price2);
                total = total.toFixed(2);
                document.getElementById("totalprice").innerText = total;
            },
            AddLocalStorage() {
                let string = JSON.stringify(this.totalorder);
                localStorage.setItem('Order', string);
            },
        }

    }

</script>
