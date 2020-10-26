<template>
    <div class="container">
        <div class="row justify-content-center">
            <table id="firstTable">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="row in rows">
                    <td>{{row.name}}</td>
                    <td>{{row.description}}</td>
                    <td>{{row.price}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>

    const axios = require("axios");

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                columns: [
                    {label: 'Name', field: 'name'},
                    {label: 'Description', field: 'description'},
                    {label: 'Price', field: 'price'}
                ],
                rows: [],
            }
        },
        methods:{
            getProducts: function() {
                axios.get('/api/products').then(function(response){
                    console.log(response.data);
                    this.rows = response.data;

                }.bind(this));
            }
        },
        created: function(){
            this.getProducts()
        }
    }
</script>