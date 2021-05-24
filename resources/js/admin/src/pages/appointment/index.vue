<template>
    <div>
        <v-data-table
            :headers="headers"
            :items="appointments"
            class="elevation-1"
        ></v-data-table>
    </div>
</template>
<script>
export default {
    data () {
      return {
        headers: [
          { text: 'Name', value: 'fullname' },
          { text: 'Email', value: 'email' },
          { text: 'Mobile number', value: 'mobile_number' },
          { text: 'Date', value: 'appt_date' },
          { text: 'Department', value: 'department' },
          { text: 'Reason', value: 'reason' },
          { text: 'Visited', value: 'PTV' },
          { text: 'Action', value: 'action',sortable: false },
        ],
        appointments: [],
      }
    },
    methods:{
      getAppointments(){
        axios.get(``)
      }
    },
    created(){
      
    }
}
</script>