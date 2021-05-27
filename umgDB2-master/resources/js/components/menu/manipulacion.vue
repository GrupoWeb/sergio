<template>
    <div class="constainer-fluid">
        <el-row :gutter="20">
            <el-col :xs="24" :sm="24" :md="16" :lg="16" :xl="16"  :offset="0">
                <el-card shadow="always" >
                    <div slot="header">
                        <span>Manipulación de Datos</span>
                    </div>
                    <el-form :model="API.form" ref="form" label-width="120px" :inline="false" size="normal">
                        <el-form-item label="Base de datos:">        
                            <el-select v-model="API.form.base" value-key="" placeholder="" clearable filterable class="select" @change="sql">
                                <el-option v-for="item in  this.API.list.database 
        "
                                    :key="item.schema_name"
                                    :label="item.schema_name"
                                    :value="item.schema_name">
                                </el-option>
                            </el-select>
                        </el-form-item>
                        <el-form-item label="SQL" v-if="this.API.handler.area">        
                            <el-input type="textarea" :rows="10" v-model="API.form.sql" 
                                :maxlength="-1" :show-word-limit="false" :autosize="{ minRows: 2, maxRows: 4 }">
                            </el-input>
                        </el-form-item>
                        
                        
                        <el-form-item>
                            <el-button type="primary" @click="sentenciaSQL">Enviar</el-button>
                            
                        </el-form-item>
                    </el-form>
                    
                </el-card>
            </el-col>
            <el-col :xs="24" :sm="24" :md="8" :lg="8" :xl="8"  :offset="0">
                <el-card shadow="always" :body-style="{ padding: '20px' }">
                    <div slot="header">
                        <span>Tablas Disponibles</span>
                    </div>
     
                    <div v-if="this.API.handler.info">
                        <el-collapse v-model="activeNames" @change="handleChange(index.table_name)"  v-for="(index ,i ) in API.list.tables" :key="i" >
                        <el-collapse-item :title="index.table_name" :name="index.table_name" >
                                <ul class="list-group" v-for="(index ,i ) in API.list.column" :key="i">
                                    <li class="list-group-item d-flex justify-content-between align-items-center"> - {{ index.column_name }}</li>
                                </ul>
                        </el-collapse-item>
                        
                        </el-collapse>
                       

                    </div>
                    
                </el-card>
                
            </el-col>
        </el-row>
        
        
    </div>
</template>

<script>
export default {
    data () {
        return {
            nombre: "",
            activeNames: ['1'],
            API: {
                router: {
                    conection: "conection",
                    tables: "tables",
                    culmnas: "culmnas",
                    manipulacion: "manipulacion"
                },
                list: {
                    database: [],
                    tables: [],
                    column: [],
                },
                form:{
                    base: "",
                    sql: ""
                },
                handler:{
                    area: false,
                    info: false
                }
            }
        }
    },
    mounted() {
        this.getConection();
    },
    methods: {
        getConection () {
            axios.get(this.API.router.conection)
            .then(response => {
                this.API.list.database = response.data;
                console.log(response.data);
            })
        },
        handleChange(tabla){
            console.log("valor" ,tabla);
            this.getColumn(this.activeNames[1]);
        },
        sql() {
            this.API.handler.area = true;
            this.API.handler.info = true;
            this.getTables();
        },
        getTables() {
            axios.post(this.API.router.tables,{
                table_schema: this.API.form.base
            })
            .then(response => {
                this.API.list.tables = response.data;
                console.log(response.data)
            })
        },
        getColumn(tabla) {
            axios.post(this.API.router.culmnas,{
                table_schema: this.API.form.base,
                table_name: tabla
            })
            .then(response => {
                this.API.list.column = response.data;
                console.log(response.data)
            })
        },
        sentenciaSQL() {
            axios.post(this.API.router.manipulacion,{
                base: this.API.form.base,
                sql: this.API.form.sql
            })
            .then(response => {
                console.log(response)
                if(response){
                    this.$swal({
                        position: "top-end",
                        icon: "success",
                        title: "Sentencia ejecutada con exito!",
                        showConfirmButton: false,
                        timer: 2500,
                        });
                        this.API.form.base = ""
                        this.API.form.sql = ""
                        this.API.handler.area = false
                        this.API.handler.info = false

                }else{
                    this.$swal({
                    position: "top-end",
                    icon: "error",
                    title: "SQL mal formado",
                    showConfirmButton: false,
                    timer: 2500,
                    });
                }
             })
            .catch(err => {
                console.log(err)
                                this.$swal({
                position: "top-end",
                icon: "error",
                title: "SQL mal formado",
                showConfirmButton: false,
                timer: 2500,
                });
            })
        }
    },
}
</script>

<style lang="scss" scoped>

</style>