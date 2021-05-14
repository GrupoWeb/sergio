<template>
    <div >
        <el-card shadow="always" >
            <div slot="header">
                <span>Recuperación de datos</span>
            </div>
            <el-form :model="form" ref="form"  :inline="false">
                <el-row :gutter="20">
                    <el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12"  :offset="0">
                        <el-form-item label="Seleccionar Base de Datos">
                            
                            <el-select v-model="form.base" value-key="" placeholder="" clearable filterable class="select" @change="getTables">
                                <el-option v-for="item in  this.API.list.database 
"
                                    :key="item.schema_name"
                                    :label="item.schema_name"
                                    :value="item.schema_name">
                                </el-option>
                            </el-select>
                            
                        </el-form-item>
                    </el-col>
                    <el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12"  :offset="0">
                        <el-form-item label="Seleccionar Tabla">
                         <el-select v-model="form.tabla" value-key="" placeholder="" clearable filterable class="select" @change="getColumn">
                                <el-option v-for="item in  this.API.list.tables 
"
                                    :key="item.table_name"
                                    :label="item.table_name"
                                    :value="item.table_name">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                </el-row>
                <el-row :gutter="20">
                    <el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12"  :offset="0">
                        <el-form-item label="Seleccionar Columnas">
                        
                            <el-select v-model="form.columnas" value-key="" placeholder="" clearable multiple filterable class="select" >
                                <el-option v-for="item in  this.API.list.column 
"
                                    :key="item.column_name"
                                    :label="item.column_name"
                                    :value="item.column_name">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12"  :offset="0">
                        <el-form-item label="Seleccionar tipo de JOIN">
                            
                                                    
                            <el-select v-model="form.join" value-key="" placeholder="" clearable  filterable  class="select">
                                <el-option v-for="item in  this.API.list.join 
"
                                    :key="item.values"
                                    :label="item.name"
                                    :value="item.values">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                </el-row>
                
                <el-row :gutter="20">
                    <el-col :xs="24" :sm="24" :md="4" :lg="4" :xl="8"  :offset="0">
                        <el-form-item label="Tabla 1">
                            
                            <el-select v-model="form.joinT1" value-key="" placeholder="" clearable filterable class="select" @change="getColumnJoin">
                                <el-option v-for="item in  this.API.list.tables 
"
                                    :key="item.table_name"
                                    :label="item.table_name"
                                    :value="item.table_name">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :xs="24" :sm="24" :md="4" :lg="4" :xl="8"  :offset="0">
                        <el-form-item label="Columna 1">
                           
                             <el-select v-model="form.joinC1" value-key="" placeholder="" clearable  filterable class="select" >
                                <el-option v-for="item in  this.API.list.columnJoin 
"
                                    :key="item.column_name"
                                    :label="item.column_name"
                                    :value="item.column_name">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :xs="24" :sm="24" :md="4" :lg="4" :xl="8"  :offset="0">
                        <el-form-item label="Columna o Relación">
                            
                            <el-select v-model="form.joinR1" value-key="" placeholder="" clearable  filterable class="select" >
                                <el-option v-for="item in  this.API.list.column 
"
                                    :key="item.column_name"
                                    :label="item.column_name"
                                    :value="item.column_name">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                </el-row>

                <el-row :gutter="20">
                    <el-col :xs="24" :sm="24" :md="4" :lg="4" :xl="6"  :offset="0">
                        <el-form-item label="Tabla ">
                            
                            <el-select v-model="form.conT1" value-key="" placeholder="" clearable filterable class="select" @change="getColumnCon">
                                <el-option v-for="item in  this.API.list.tables 
"
                                    :key="item.table_name"
                                    :label="item.table_name"
                                    :value="item.table_name">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :xs="24" :sm="24" :md="4" :lg="4" :xl="6"  :offset="0">
                        <el-form-item label="Columna ">
                            
                            <el-select v-model="form.conC1" value-key="" placeholder="" clearable  filterable class="select" >
                                <el-option v-for="item in  this.API.list.columnCo 
"
                                    :key="item.column_name"
                                    :label="item.column_name"
                                    :value="item.column_name">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :xs="24" :sm="24" :md="4" :lg="4" :xl="6"  :offset="0">
                        <el-form-item label="Operador">
                            <el-select v-model="form.conR1" value-key="" placeholder="" clearable  filterable  class="select">
                                <el-option v-for="item in  this.API.list.op 
"
                                    :key="item.values"
                                    :label="item.name"
                                    :value="item.values">
                                </el-option>
                            </el-select>
                        </el-form-item>
                    </el-col>
                    <el-col :xs="24" :sm="24" :md="4" :lg="4" :xl="6"  :offset="0">
                        <el-form-item label="Valor">
                            <el-input v-model="form.valCon"  size="normal" clearable ></el-input>
                        </el-form-item>
                    </el-col>
                </el-row>
                <el-row :gutter="20">
                    <el-col :xs="24" :sm="24" :md="12" :lg="12" :xl="12"  :offset="0">
                        <el-form-item label="Sentencia SQL">
                            <br>
                            <br>
                        <div class="form-group border p-2">
                            <span class="text-primary" v-if="this.form.columnas != ''">SELECT</span>
                            <span class="text-info" v-for="selectColumn of this.form.columnas">{{selectColumn}},</span>
                            <br>
                            <span class="text-primary" v-if="this.form.tabla != ''">FROM</span> <span class="text-secondary">{{form.tabla}}</span>
                            <br>
                            <span class="text-primary">{{form.join}}</span>
                            <span class="text-info"> {{form.joinT1}}.{{form.joinC1}}</span>
                            <span class="text-primary"> =</span>
                            <span class="text-info"> {{form.tabla}}.{{form.joinR1}}</span>
                            <br>
                            <span class="text-primary">WHERE</span>
                            <span class="text-info"> {{form.conT1}}.{{form.conC1}}</span>
                            <span class="text-primary"> {{form.conR1}}</span>
                            <span class="text-info"> {{form.valCon}};</span>
                        </div>
                        </el-form-item>
                    </el-col>
                </el-row>


                <el-form-item>
                    <el-button type="primary" @click="onSubmit">Generar Consulta</el-button>
                   
                </el-form-item>
            </el-form>
            
                <div class="col-md-12 mt-5" v-if="this.API.list.result != ''">
                    <div class="card">
                        <div class="card-header">Resultado</div>
                        <div class="card-body">
                            <ul class="list-group" v-for="result of this.API.list.result">
                                <li class="list-group-item list-group-item-action"><pre>{{result}}</pre></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </el-card>
        
        
    </div>
</template>


<script>

export default {
    components: {
        
    },
    data(){
        return {
            form: {
                base:"",
                tabla:"",
                columnas: [],
                join: "",
                joinT1:"",
                joinC1:"",
                joinR1:"",
                conT1:"",
                conC1:"",
                conR1:"",
                valCon: ""

            },
            API:{
                router: {
                    conection: "conection",
                    tables: "tables",
                    culmnas: "culmnas",
                    ejecutarSQL:"ejecutarSQL"
                },
                list: {
                    database: [],
                    tables: [],
                    column: [],
                    join: [
                        {
                            name: 'INNER',
                            values: 'INNER JOIN'
                        },
                        {
                            name: 'LEFT',
                            values: 'LEFT JOIN'
                        },
                        {
                            name: 'RIGHT',
                            values: 'RIGHT JOIN '
                        },
                        {
                            name: 'FULL',
                            values: 'FULL OUTER JOIN'
                        },
                    ],
                    op: [
                        {
                            name: '<',
                            values: '<'
                        },
                        {
                            name: '>',
                            values: '>'
                        },
                        {
                            name: '=',
                            values: '='
                        },
                        {
                            name: '!=',
                            values: '!='
                        },
                    ],
                    columnJoin: [],
                    columnCo: [],
                    result: []
                }
            }
        }
    },
    mounted() {
         this.getConection();
    },
    methods: {
        onSubmit() {
            axios.post(this.API.router.ejecutarSQL,{
                database: this.form.base,
                columns: this.form.columnas,
                table: this.form.tabla,
                table2: this.form.joinT1,
                tipo_join: this.form.join,
                columns_table1: this.form.joinT1,
                columns2: this.form.joinC1,
                table3: this.form.conT1,
                columns3: this.form.conC1,
                operador: this.form.conR1,
                where: this.form.valCon
            }).then(response => {
                console.log(response.data)
                this.API.list.result = response.data;
            // this.$alert('This is a message', 'Title', {
            //     confirmButtonText: 'OK',
            //     callback: action => {
            //         this.$message({
            //         type: 'info',
            //         message: `action: ${ action }`
            //         });
            //     }
            //     });
            })
        },
        getConection () {
            axios.get(this.API.router.conection)
            .then(response => {
                this.API.list.database = response.data;
                console.log(response.data);
            })
        },
        getTables() {
            axios.post(this.API.router.tables,{
                table_schema: this.form.base
            })
            .then(response => {
                this.API.list.tables = response.data;
                console.log(response.data)
            })
        },
        getColumn() {
            axios.post(this.API.router.culmnas,{
                table_schema: this.form.base,
                table_name: this.form.tabla
            })
            .then(response => {
                this.API.list.column = response.data;
                console.log(response.data)
            })
        },
        getColumnJoin() {
            axios.post(this.API.router.culmnas,{
                table_schema: this.form.base,
                table_name: this.form.joinT1
            })
            .then(response => {
                this.API.list.columnJoin = response.data;
                console.log(response.data)
            })
        },
        getColumnCon() {
            axios.post(this.API.router.culmnas,{
                table_schema: this.form.base,
                table_name: this.form.conT1
            })
            .then(response => {
                this.API.list.columnCo = response.data;
                console.log(response.data)
            })
        },
    },
}
</script>

<style lang="css">
    .select {
        width: 100%;
    }
</style>