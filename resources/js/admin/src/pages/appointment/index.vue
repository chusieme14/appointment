<template>
    <div>
        <v-card
          elevation="1"
        >
          <v-card-title>
            For Approval
          </v-card-title>
          <v-card-text>
            <v-simple-table
            >
          <template v-slot:default>
            <thead>
              <tr>
                <th class="text-left">
                  Name
                </th>
                <th class="text-left">
                  Email
                </th>
                <th class="text-left">
                  Mobile number
                </th>
                <th class="text-left">
                  Date
                </th>
                <th class="text-left">
                  Person to visit
                </th>
                <th class="text-left">
                  Reason
                </th>
                <th class="text-center">
                  Department
                </th>
                <th class="text-center">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              <tr
                v-for="item in appointments"
                :key="item.id"
              >
                <td>{{ item.fname + ' ' + item.lname}}</td>
                <td>{{ item.email }}</td>
                <td>{{ item.mobile_number }}</td>
                <td>{{ item.appt_date }}</td>
                <td>{{ item.PTV }}</td>
                <td>{{ item.reason }}</td>
                <td class="text-center">{{ item.department.short_name }}</td>
                <td class="text-center">
                  <v-btn fab dark
                    x-small color="primary"
                  >
                    <v-icon dark>mdi-check</v-icon>
                  </v-btn>
                  <v-btn fab dark
                    x-small color="success"
                  >
                    <v-icon dark> mdi-pencil </v-icon>
                  </v-btn>
                  <v-btn fab dark
                    x-small color="error"
                  >
                    <v-icon dark> mdi-delete </v-icon>
                  </v-btn>
                </td>
              </tr>
            </tbody>
          </template>
        </v-simple-table>
          </v-card-text>
        </v-card>
    </div>
</template>
<script>
export default {
    data () {
      return {
        appointments: [],
        user:[],
        isfetching:true
      }
    },
    methods:{
      getAppointments(){
        this.isfetching = true
        axios.get(`/admin/appointment/${this.user.id}`).then(({data})=>{
          console.log(data,"appointment")
          this.appointments = data
          this.isfetching = false
        })
      },
      getAuthuser(){
        axios.get(`/auth/user`).then(({data})=>{
          console.log(data,"user")
          this.user = data
          this.getAppointments()
        })
      }
    },
    created(){
      this.getAuthuser()
    }
}
</script>