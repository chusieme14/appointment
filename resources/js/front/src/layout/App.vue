<template>
    <v-app>
        <v-container fluid class="inner-layer">
            <v-container grid-list-md>
                <v-layout wrap row>
                    <v-flex class="class-text" xs12 md7>
                        <h1>Book your slot and Save your time</h1>
                        <h4>Reduce waiting time.
                            Will able to avoid unnecessary interaction to others.
                            More flexibility and peace of mind.</h4>
                    </v-flex>
                    <v-flex class="class-form" xs12 md5>
                        <v-card
                            elevation="2"
                            loading="false"
                        >
                            <v-card-title>
                                <v-avatar
                                    color="grey lighten-2"
                                    size="60"
                                >
                                    <v-img
                                        max-height="150"
                                        max-width="250"
                                        src="https://picsum.photos/id/11/500/300"
                                    ></v-img>
                                </v-avatar>
                                <h3 class="ml-2">Book Appointment</h3></v-card-title>
                            <v-card-text>
                                <v-layout wrap row>
                                    <v-flex xs12 md6>
                                        <v-label>Last name <span>*</span></v-label> <br>
                                        <span style="color:red;">{{ errors.first('last name') }}</span>
                                        <v-text-field
                                            v-model="form.lname"
                                            v-validate="'required'" 
                                            name="last name"
                                            solo
                                            dense
                                            color="success"
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md6>
                                        <v-label>First name <span>*</span></v-label> <br>
                                        <span style="color:red;">{{ errors.first('first name') }}</span>
                                        <v-text-field
                                            v-model="form.fname"
                                            v-validate="'required'" 
                                            name="first name"
                                            solo
                                            dense
                                            color="success"
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md6>
                                        <v-label>Email address <span>*</span></v-label> <br>
                                        <span style="color:red;">{{ errors.first('email') }}</span>
                                        <v-text-field
                                            v-model="form.email"
                                            v-validate="'required|email'" 
                                            name="email"
                                            solo
                                            dense
                                            color="success"
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md6>
                                        <v-label>Mobile number <span>*</span></v-label> <br>
                                        <span style="color:red;">{{ errors.first('mobile number') }}</span>
                                        <v-text-field
                                            v-model="form.mobile_number"
                                            v-validate="'required'" 
                                            name="mobile number"
                                            solo
                                            color="success"
                                            dense
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md6>
                                        <v-label>Appointment date <span>*</span></v-label> <br>
                                        <span style="color:red;">{{ errors.first('appointment date') }}</span>
                                        <v-menu
                                        ref="menu1"
                                        v-model="menu1"
                                        :close-on-content-click="false"
                                        transition="scale-transition"
                                        offset-y
                                        min-width="auto"
                                        >
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-text-field
                                            solo
                                            dense
                                            readonly
                                            v-model="form.appt_date"
                                            v-validate="'required'" 
                                            name="appointment date"
                                            color="success"
                                            v-bind="attrs"
                                            @blur="date = parseDate(dateFormatted)"
                                            v-on="on"
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker
                                            v-model="form.appt_date"
                                            no-title
                                            @input="menu1 = false"
                                        ></v-date-picker>
                                        </v-menu>
                                    </v-flex>
                                    <v-flex xs12 md6>
                                        <v-label>Person to visit</v-label>
                                        <v-text-field
                                            v-model="form.PTV"
                                            solo
                                            color="success"
                                            dense
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md6>
                                        <v-label>Building <span>*</span></v-label> <br>
                                        <span style="color:red;">{{ errors.first('department/building') }}</span>
                                        <v-autocomplete
                                            :items="departments"
                                            item-text="short_name"
                                            item-value="id"
                                            v-validate="'required'" 
                                            name="department/building"
                                            v-model="form.department_id"
                                            solo
                                            single-line
                                            allow-overflow
                                            dense
                                        >
                                        </v-autocomplete>
                                        <!-- <v-text-field
                                            solo
                                            color="success"
                                            dense
                                        ></v-text-field> -->
                                    </v-flex>
                                    <v-flex xs12 md12>
                                        <v-label>Reason <span>*</span></v-label>  <br>
                                        <span style="color:red;">{{ errors.first('reason') }}</span>
                                        <v-textarea
                                            v-model="form.reason"
                                            v-validate="'required'" 
                                            name="reason"
                                            solo
                                            height=70
                                        ></v-textarea>
                                    </v-flex>
                                </v-layout>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                
                                <v-btn
                                    color="primary"
                                    @click="storeAppointment"
                                >
                                    Submit
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-container>
    </v-app>
</template>
<script>
export default {
    data(){
        return{
            form:{},
            departments:[
                {
                    id:0,
                    short_name:'CCIS'
                },
                {
                    id:1,
                    short_name:'CIT'
                },
                {
                    id:2,
                    short_name:'CAS'
                },
            ],
            menu1:false,
        }
    },
    methods:{
        getalldepartments(){
            axios.get('user/department/all').then(({data})=>{
                this.departments = data
            })
        },
        storeAppointment(){
            this.$validator.validateAll().then( result =>{
                if(result){
                    let payload = this.form
                    console.log(payload,"sjdhsjdhsjdh")
                    axios.post('user/appointment/store',{...payload}).then(({data})=>{
                    
                    })
                }
    
            })
        }
    },
    created(){
        this.getalldepartments()
    },

}
</script>
<style lang="scss" scoped>
.class-form{
    margin-top: 50px;
}
.class-text{
    display: flex;
    justify-content: center;
    flex-direction: column;
    text-align: center;
}
.inner-layer{
	position: absolute;
	height: 100%;
	width: 100%;
	background-color: rgba(0,40,50,0.6);
	// overflow: auto;
}
label span{
    color: red;
}
.class-error{
    color: red;
}
</style>