<script type="text/x-template" id="crud-template">
    <div class="container">
        <h1 class="text-capitalize">{{modelname}}</h1>
        <!-- Button trigger modal -->
        
        <p>
        <button v-on:click="NewModel()" type="button" class="btn btn-outline-warning">Nuevo</button>
         </p>


        <b-pagination
            v-model="currentPage"
            :total-rows="pagination.total"
            :per-page="pagination.perPage"
            aria-controls="my-table"
        ></b-pagination>


        <table class="table" id="my-table">
            <thead>
            <tr>
                <th>#</th>
                <th v-for="field in modelfields">{{field}}</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td></td>
                <td v-for="field in modelfields">
                    <input v-on:change="getModels()" class="form-control" v-model="filter[field]">
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(model,key) in models" v-bind:key="model[modelfields[0]]">
                <td>{{key+1}}</td>
                <td v-for="field in modelfields">{{model[field]}}</td>
                <td>
                    <button v-on:click="editModel(model[modelfields[0]])" type="button" class="btn btn-outline-warning">Editar</button>
                </td>
                <td>
                    <button v-on:click="deleteModel(model[modelfields[0]])" type="button" class="btn btn-danger">Borrar</button>
                </td>
            </tr>
            </tbody>
        </table>
        <b-pagination
            v-model="currentPage"
            :total-rows.number="pagination.total"
            :per-page.number="pagination.perPage"
            aria-controls="my-table"
        ></b-pagination>

    </div>
</script>
<script>

    const Crud = {
        name: 'crud',
        template: '#crud-template',
        components:{
            // bModal : bModal,
        },
        props: {
            modelname: String,
            model : Object,
            fields: {
                type:Array,
                // default: Object.keys(model),
            },
        },
        mounted() {
            this.getModels();
        },
        watch:{
            currentPage: function() {
                this.getModels();
            }
        },
        data : function(){
            return {
                modalShow: false,
                modelfields: this.fields??Object.keys(this.model),
                currentPage: 1,
                pagination:{},
                filter:{},
                errors: {},
                models: [],
                activemodel:{},
                isNewRecord:true,
            }
        },
        methods: {
            normalizeErrors: function(errors){
                var allErrors = {};
                for(var i = 0 ; i < errors.length; i++ ){
                    allErrors[errors[i].field] = errors[i].message;
                }
                return allErrors;
            },
            // normalizeFilters(){
            //     var filters = {};
            //     for(var i in this.filter ){
            //         if(this.filter[i]) {
            //             filters['filter[' + i + ']'] = this.filter[i];
            //         }
            //     }
            //     return filters;
            // },
            getModels: function(){
                var self = this;
                self.errors = {};
                // var filters = self.normalizeFilters();
                axios.get('/apv1/'+self.modelname+'?page='+self.currentPage,{params:self.filter})
                    .then(function (response) {
                        // handle success
                        // console.log(response.data);
                        self.pagination.total = response.headers['x-pagination-total-count'];
                        self.pagination.totalPages = response.headers['x-pagination-page-count'];
                        self.pagination.perPage = response.headers['x-pagination-per-page'];
                        self.models = response.data;

                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            deleteModel: function(id){
                var self = this;
                axios.delete('/apv1/'+self.modelname+'/'+id,{})
                    .then(function (response) {
                        // handle success
                        self.getModels();
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            editModel: function (key) {
                var self = this;
                window.location.href = '/'+self.modelname+'/update?id='+key;
            },
            NewModel: function () {
                var self = this;
                window.location.href = '/'+self.modelname+'/create';
            }
            

        }
    }
</script>

