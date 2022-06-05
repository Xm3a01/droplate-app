<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>Price</th>
                                    <th>Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(d , index) in ds" :key="index">
                                    <td>{{d.price}}</td>
                                    <td>{{d.code}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                ds: []
            }
        },
    //     mounted() {
    //         console.log('Component mounted.')
    //         window.setInterval(() => {
    //              this.getDate();
    //         }, 2000)
           
    //     },
    //     methods: {
    //         async getDate() {
    //             const {data} = await axios.get('api/test');
    //             this.ds = data
    //         }
    //     }
    }
</script>
