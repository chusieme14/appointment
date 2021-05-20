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
                                        <v-label>Last name</v-label>
                                        <v-text-field
                                            placeholder="last name"
                                            solo
                                            dense
                                            color="success"
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md6>
                                        <v-label>First name</v-label>
                                        <v-text-field
                                            placeholder="first name"
                                            solo
                                            dense
                                            color="success"
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md6>
                                        <v-label>Email address</v-label>
                                        <v-text-field
                                            placeholder="email address"
                                            solo
                                            dense
                                            color="success"
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md6>
                                        <v-label>Mobile number</v-label>
                                        <v-text-field
                                            placeholder="mobile number"
                                            solo
                                            color="success"
                                            dense
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md6>
                                        <v-label>Appointment date</v-label>
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
                                            v-model="form.date"
                                            placeholder="Date"
                                            color="success"
                                            v-bind="attrs"
                                            @blur="date = parseDate(dateFormatted)"
                                            v-on="on"
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker
                                            v-model="form.date"
                                            no-title
                                            @input="menu1 = false"
                                        ></v-date-picker>
                                        </v-menu>
                                    </v-flex>
                                    <v-flex xs12 md6>
                                        <v-label>Person to visit</v-label>
                                        <v-text-field
                                            solo
                                            color="success"
                                            dense
                                        ></v-text-field>
                                    </v-flex>
                                    <v-flex xs12 md6>
                                        <v-label>Building</v-label>
                                        <v-autocomplete
                                            :items="departments"
                                            item-text="short_name"
                                            item-value="id"
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
                                        <v-label>Reason</v-label>
                                        <v-textarea
                                            solo
                                            name="input-7-4"
                                            height=70
                                        ></v-textarea>
                                    </v-flex>
                                </v-layout>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                
                                <v-btn
                                    color="primary"
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
            menu1:false
        }
    },
    methods:{
        getalldepartments(){
            axios.get('user/department/all').then(({data})=>{
                this.departments = data
            })
        }
    },
    created(){
        this.getalldepartments()
    }

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

</style>